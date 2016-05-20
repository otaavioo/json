<?php
namespace Json;

class Json
{
    /*const T_OBJECT = 0;
    const T_ARRAY = 1;

    const MYSQL_TEXT = 'text';
    const MYSQL_TEXT_SIZE = 65535;*/

    public function isJson($json)
    {
        $obj = json_decode($json);
        return (json_last_error() == JSON_ERROR_NONE) && !is_null($obj);
    }

    /*public static function decode($json, $type = self::T_OBJECT)
    {
        if ($type === self::T_OBJECT) {
            return json_decode($json);
        }

        return json_decode($json, self::T_ARRAY);
    }*/

    /*public static function encode($json, $mysqlField = self::MYSQL_TEXT)
    {
        $jsonEncode = json_encode($json);

        if (self::isValid($jsonEncode, $mysqlField)) {
            return json_encode($json);
        }

        if (!empty($error = self::jsonLastErrorMsg())) {
            return (new Message(Message::JSON_ENCODE_ERROR, $error))->toArray();
        }

        return (new Message(Message::JSON_ENCODE_ERROR, 'Too large size - '.self::MYSQL_TEXT_SIZE.' caracteres'))->toArray();
    }*/

    /*********************
     * PRIVATE FUNCTIONS *
     *********************/
    /**
     * Valida o tamanho máximo da string json para campo text do mysql
     * @access private
     * @param  string $json Json_encode
     * @param  string $mysqlField Constantes da classe prefixadas em MYSQL_
     * @return boolean
     */
    /*private static function isValid($jsonEncode, $mysqlField)
    {
        if ($mysqlField === self::MYSQL_TEXT) {
            return strlen($jsonEncode) <= self::MYSQL_TEXT_SIZE;
        }

        return true;
    }*/

    /*private static function jsonLastErrorMsg()
    {
        $error = json_last_error_msg();
        if ($error === 'No error') {
            return '';
        }

        return $error;
    }*/
}
