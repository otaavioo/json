<?php
namespace Json;

class Json
{
    const T_OBJECT = false;
    const T_ARRAY = true;

    public function decode($json, $type = self::T_OBJECT)
    {
        if (!$this->isJson($json)) {
            throw new \InvalidArgumentException("Invalid Json: $json", 100);
        }

        if (!in_array($type, [self::T_OBJECT, self::T_ARRAY], true)) {
            throw new \InvalidArgumentException("Invalid decode type: $type", 101);
        }

        return json_decode($json, $type);
    }

    public function encode($json)
    {
        $jsonEncode = json_encode($json);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Json encode error: ' . json_last_error_msg());
        }

        return $jsonEncode;
    }

    public function isJson($json)
    {
        $obj = json_decode($json);
        return (json_last_error() == JSON_ERROR_NONE) && !is_null($obj) && is_object($obj);
    }
}
