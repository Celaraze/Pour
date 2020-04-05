<?php


namespace Chemex\Base;


class DateTime
{
    /**
     * 秒转换为分
     * @param int $s
     * @return string
     */
    static function secondsToMinutes($s = 0)
    {
        $h = floor($s / 60);
        $s = $s % 60;
        $h = (strlen($h) == 1) ? '0' . $h : $h;
        $s = (strlen($s) == 1) ? '0' . $s : $s;
        return $h . ':' . $s;
    }

    /**
     * 返回时间戳的当前月份
     * @param $date
     * @return false|string
     */
    static function dateToCurrentMonth($date)
    {
        return date('m', $date);
    }

    static function dateToCurrentWeek($date)
    {

    }
}