<?php


namespace Demo\Core\Classes\Helpers;


use Illuminate\Database\Eloquent\JsonEncodingException;

class JSON
{
    /**
     * This method will convert json string to corresponding php object
     * @param $json - The json string
     * @param $assoc - Association true/false
     * @return $parsed - parsed json
     * @throws \JsonException - An exception if json is not valid
     */
    public static function parse(string $json, $assoc = true)
    {
        $parsed = json_decode($json, $assoc);
        $lastJsonError = json_last_error();
        switch ($lastJsonError) {
            case JSON_ERROR_NONE:
                break;
            case JSON_ERROR_DEPTH:
                throw new JsonEncodingException('Maximum stack depth exceeded', $lastJsonError);
                break;
            case JSON_ERROR_STATE_MISMATCH:
                throw new JsonEncodingException('Underflow or the modes mismatch', $lastJsonError);
                break;
            case JSON_ERROR_CTRL_CHAR:
                throw new JsonEncodingException('Unexpected control character found', $lastJsonError);
                break;
            case JSON_ERROR_SYNTAX:
                throw new JsonEncodingException('Syntax error, malformed JSON', $lastJsonError);
                break;
            case JSON_ERROR_UTF8:
                throw new JsonEncodingException('Malformed UTF-8 characters, possibly incorrectly encoded', $lastJsonError);
                break;
            default:
                throw new JsonEncodingException('Unknown error', $lastJsonError);
                break;
        }
        return $parsed;
    }

    /**
     * This method will convert php object to corresponding json string
     */
    public static function stringify($value): string
    {
        return json_encode($value);
    }
}