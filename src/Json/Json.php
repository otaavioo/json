<?php

namespace Json;

class Json
{
    public const T_OBJECT = false;
    public const T_ARRAY = true;

    private $type;

    public function decode($json, $type = self::T_OBJECT)
    {
        if (empty($json)) {
            return null;
        }

        if (is_array($json) && self::T_ARRAY === $type) {
            return $json;
        }

        if (is_object($json) && self::T_OBJECT === $type) {
            return $json;
        }

        if (is_array($json) || is_object($json)) {
            $json = $this->encode($json);
        }

        $this->type = $type;

        if (!in_array($this->type, [self::T_OBJECT, self::T_ARRAY], true)) {
            throw new \InvalidArgumentException(sprintf('Invalid decode type: %s', $this->type), 1000);
        }

        $jsonDecode = $this->decodeRecursive($json, $this->type);

        if ($this->hasError($jsonDecode)) {
            throw new \InvalidArgumentException(sprintf('Invalid Json: %s', $json), 1001);
        }

        return $jsonDecode;
    }

    public function encode($json): string
    {
        $jsonEncode = json_encode($json);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new \Exception('Json encode error: ' . json_last_error_msg());
        }

        return $jsonEncode;
    }

    public function hasError($json): bool
    {
        $isArrayOrObject = (self::T_OBJECT === $this->type) ? !is_object($json) : !is_array($json);

        return (JSON_ERROR_NONE !== json_last_error()) || is_null($json) || $isArrayOrObject;
    }

    private function decodeRecursive($json)
    {
        $decodedJson = json_decode($json, $this->type);

        if (is_string($decodedJson)) {
            return $this->decodeRecursive($decodedJson, $this->type);
        }

        return $decodedJson;
    }

    public function isValid(string $json): bool
    {
        $obj = json_decode($json);

        return (JSON_ERROR_NONE === json_last_error()) && !is_null($obj) && $json != $obj;
    }
}
