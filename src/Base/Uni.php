<?php

namespace Famio\Saber\Facades;

class Uni
{
    /**
     * 提取字符串中的数字
     * @param string $string
     * @return string
     */
    static function findNumFromString($string = '')
    {
        $string = trim($string);
        if (empty($string)) {
            return '';
        }
        $result = '';
        for ($i = 0; $i < strlen($string); $i++) {
            if (is_numeric($string[$i])) {
                $result .= $string[$i];
            }
        }
        return $result;
    }

    /**
     * 截取指定字符中间的内容
     * @param $begin
     * @param $end
     * @param $string
     * @return string
     */
    static function cutString($begin, $end, $string)
    {
        $b = mb_strpos($string, $begin) + mb_strlen($begin);
        $e = mb_strpos($string, $end) - $b;

        return mb_substr($string, $b, $e);
    }

    /**
     * 给json object string加双引号
     * @param $string
     * @return mixed
     */
    static function jsonStringify($string)
    {
        if (preg_match('/\w:/', $string)) {
            $string = preg_replace('/(\w+):/is', '"$1":', $string);
        }
        return $string;
    }

    /**
     * 去除字符串中的各种换行符和空格
     * @param $string
     * @return string|string[]|null
     */
    static function trim($string)
    {
        $string = preg_replace("/\n/", '', $string);
        $string = preg_replace("/\r/", '', $string);
        $string = preg_replace("/\t/", '', $string);
        $string = preg_replace("/ /", '', $string);
        $string = trim($string);
        return $string;
    }

    /**
     * 返回字符串中的中文
     * @param $string
     * @return string
     */
    static function findChineseFromString($string)
    {
        preg_match_all('/[\x{4e00}-\x{9fff}]+/u', $string, $chinese);
        $return = implode('', $chinese[0]);
        return $return;
    }

    /**
     * 字符串丢盐加密
     * @param $string
     * @param $salt
     * @return string
     */
    static function encryptString($string, $salt)
    {
        $base64_string = base64_encode($string);
        $base64_salt_string = $base64_string . $salt;
        $base64_second_string = base64_encode($base64_salt_string);
        $binary_string = self::stringToBinary($base64_second_string);
        $array = explode(' ', $binary_string);
        foreach ($array as &$v) {
            $v = strrev($v);
        }
        $result = join(' ', $array);
        $result = self::binaryToString($result);
        return $result;
    }

    /**
     * 字符串转二进制输出
     * @param $string
     * @return string
     */
    static function stringToBinary($string)
    {
        $array = preg_split('/(?<!^)(?!$)/u', $string);
        foreach ($array as &$v) {
            $temp = unpack('H*', $v);
            $v = base_convert($temp[1], 16, 2);
            unset($temp);
        }
        return join(' ', $array);
    }

    /**
     * 二进制字符串转字符串输出
     * @param $string
     * @return string
     */
    static function binaryToString($string)
    {
        $array = explode(' ', $string);
        foreach ($array as &$v) {
            $v = pack("H" . strlen(base_convert($v, 2, 16)), base_convert($v, 2, 16));
        }
        return join('', $array);
    }

    static function decryptString($string, $salt)
    {

    }
}