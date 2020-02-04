<?php


namespace Famio\Saber\Facades\Base;


class Time
{
    /**
     * 秒转换为分
     * @param int $s
     * @return string
     */
    static function secondsToMinutes($s = 0)
    {
        //计算分钟
        //算法：将秒数除以60，然后下舍入，既得到分钟数
        $h = floor($s / 60);
        //计算秒
        //算法：取得秒%60的余数，既得到秒数
        $s = $s % 60;
        //如果只有一位数，前面增加一个0
        $h = (strlen($h) == 1) ? '0' . $h : $h;
        $s = (strlen($s) == 1) ? '0' . $s : $s;
        return $h . ':' . $s;
    }
}