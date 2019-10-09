<?php

namespace Famio\Saber\Common;

class Uni
{
    /**
     * 提取字符串中的数字
     * @param $str
     * @return string
     */
    static function findNum($str = '')
    {
        $str = trim($str);
        if (empty($str)) {
            return '';
        }
        $result = '';
        for ($i = 0; $i < strlen($str); $i++) {
            if (is_numeric($str[$i])) {
                $result .= $str[$i];
            }
        }
        return $result;
    }

    /**
     * 截取指定字符中间的内容
     * @param $begin
     * @param $end
     * @param $str
     * @return string
     */
    static function cut($begin, $end, $str)
    {
        $b = mb_strpos($str, $begin) + mb_strlen($begin);
        $e = mb_strpos($str, $end) - $b;

        return mb_substr($str, $b, $e);
    }

    /**
     * 给json object string加双引号
     * @param $str
     * @return mixed
     */
    static function jsonStringify($str)
    {
        if (preg_match('/\w:/', $str)) {
            $str = preg_replace('/(\w+):/is', '"$1":', $str);
        }
        return $str;
    }

    /**
     * 去除字符串中的各种换行符和空格
     * @param $string
     * @return string|string[]|null
     */
    static function clearTrim($string)
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
    static function findChinese($string)
    {
        preg_match_all('/[\x{4e00}-\x{9fff}]+/u', $string, $chinese);
        $return = implode('', $chinese[0]);
        return $return;
    }
}