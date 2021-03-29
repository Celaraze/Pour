<?php

namespace Pour\Base;

use Exception;

class Uni
{
    /**
     * 提取字符串中的数字
     * @param string $string
     * @return string
     */
    static function getNumFromString($string = '')
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
    static function getChineseFromString($string)
    {
        preg_match_all('/[\x{4e00}-\x{9fff}]+/u', $string, $chinese);
        return implode('', $chinese[0]);
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

    /**
     * 生成随机RGB颜色
     * @param $min
     * @param $max
     * @param int $stringify
     * @return mixed
     */
    static function randomRGB($min, $max, $stringify = 0)
    {
        $r = rand($min, $max);
        $g = rand($min, $max);
        $b = rand($min, $max);
        if ($stringify) {
            return "$r,$g,$b";
        } else {
            return ['r' => $r, 'g' => $g, 'b' => $b];
        }
    }

    /**
     * 生成随即数字字符串
     * @param int $length
     * @return string
     */
    static function randomNumberString($length = 6)
    {
        $result = '';
        for ($i = 0; $i < $length; $i++) {
            $result .= rand(0, 9);
        }
        return $result;
    }

    /**
     * 通用的接口返回构造数组
     * @param $info
     * @return array
     */
    static function returnResult($info)
    {
        $return = array();
        if (!$info instanceof Exception) {
            $return['code'] = $info[0];
            $return['message'] = $info[1];
            $return['data'] = $info[2];
        } else {
            $return['code'] = $info->getCode();
            $return['message'] = $info->getLine() . ':' . $info->getMessage();
            $return['data'] = [];
        }
        return $return;
    }

    /**
     * 通用的接口返回构造数组（新版）
     * @param $code
     * @param $message
     * @param $data
     * @param bool $array
     * @return array
     */
    static function returnJson($code, $message, $data, $array = false)
    {
        $return = [];
        $return['code'] = $code;
        if ($data instanceof Exception) {
            $return['code'] = 500;
            $message = $data->getLine() . ' : ' . $data->getMessage();
            $data = [];
        }
        $return['message'] = $message;
        $return['data'] = $data;

        if ($array) {
            return $return;
        }

        return response()->json($return);
    }

    /**
     * 返回性别选择
     * @param bool $hasKeys
     * @return string[]
     */
    static function genders($hasKeys = false)
    {
        if ($hasKeys) {
            return ['男' => '男', '女' => '女', '无' => '无'];
        } else {
            return ['男', '女', '无'];
        }
    }

    /**
     * 返回HTTP请求方法
     * @param bool $hasKeys
     * @return string[]
     */
    static function httpMethods($hasKeys = false)
    {
        if ($hasKeys) {
            return [
                'GET' => 'GET',
                'POST' => 'POST',
                'PUT' => 'PUT',
                'DELETE' => 'DELETE',
                'OPTION' => 'OPTION'
            ];
        } else {
            return ['GET', 'POST', 'PUT', 'DELETE', 'OPTION'];
        }
    }

    /**
     * 返回是或否
     * @param bool $hasKeys
     * @return string[]
     */
    static function yesOrNo($hasKeys = false)
    {
        if ($hasKeys) {
            return [
                '是' => '是',
                '否' => '否',
            ];
        } else {
            return ['是', '否'];
        }
    }

    /**
     * 返回时间周期
     * @param $hasKeys
     * @return string[]
     */
    static function dateCycles($hasKeys)
    {
        if ($hasKeys) {
            return [
                '天' => '天',
                '周' => '周',
                '月' => '月',
                '季' => '季',
                '年' => '年'
            ];
        } else {
            return ['天', '周', '月', '季', '年'];
        }
    }
}