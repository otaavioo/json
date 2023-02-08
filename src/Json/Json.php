<?php

namespace Json;

class Json
{
    public const T_OBJECT = false;
    public const T_ARRAY = true;

    private $type;

    public function decode(string $json, $type = self::T_OBJECT)
    {
        if (empty($json)) {
            return null;
        }

        $this->type = $type;

        if (!in_array($this->type, [self::T_OBJECT, self::T_ARRAY], true)) {
            throw new \InvalidArgumentException("Invalid decode type: $this->type", 1000);
        }

        $jsonDecode = $this->decodeRecursive($json, $this->type);

        if ($this->hasError($jsonDecode)) {
            throw new \InvalidArgumentException("Invalid Json: $json", 1001);
        }

        return $jsonDecode;
    }

    public function encode($json): string
    {
        $jsonEncode = json_encode($json);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Json encode error: ' . json_last_error_msg());
        }

        return $jsonEncode;
    }

    public function hasError($json): bool
    {
        $isArrayOrObject = ($this->type === self::T_OBJECT) ? !is_object($json) : !is_array($json);
        return (json_last_error() !== JSON_ERROR_NONE) || is_null($json) || $isArrayOrObject;
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
        return (json_last_error() == JSON_ERROR_NONE) && !is_null($obj) && $json != $obj;
    }
}
