<?php


namespace Chemex\Base;


class Time
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
}