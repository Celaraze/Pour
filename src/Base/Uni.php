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
     * 比较两个数组中的差异值，返回$arrayA比$arrayB中多的值
     * @param $arrayA
     * @param $arrayB
     * @return array
     */
    static function diffTwoArray($arrayA, $arrayB)
    {
        $result = array();
        foreach ($arrayA as $a) {
            if (!in_array($a, $arrayB)) {
                array_push($result, $a);
            }
        }
        $result = array_unique($result);
        return $result;
    }
}