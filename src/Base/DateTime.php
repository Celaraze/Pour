<?php


namespace Pour\Base;


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
     * 当前的时间范围 日,周,月,季,年
     * @param $date
     * @param string $type
     * @param int $shift
     * @return array
     */
    static function currentDateTimeRange($date, $type, $shift = 0)
    {
        switch ($type) {
            case 'week':
                if ($shift != 0) {
                    $date = date('Y-m-d', strtotime("$shift week"));
                }
                $last_day = date("Y-m-d 23:59:59", strtotime("$date Sunday"));
                $first_day = date("Y-m-d 00:00:00", strtotime("$last_day -6 days"));
                break;
            case 'month':
                if ($shift != 0) {
                    $date = date('Y-m-d', strtotime("$shift months"));
                }
                $first_day = date("Y-m-01 00:00:00", strtotime($date));
                $last_day = date("Y-m-d 23:59:59", strtotime("$first_day +1 month -1 day"));
                break;
            case 'quarter':
                $season = ceil(date('n', strtotime($date)) / 3);
                $first_day = date('Y-m-01 00:00:00', mktime(0, 0, 0, ($season - 1) * 3 + 1, 1, date('Y')));
                $last_day = date('Y-m-t 23:29:29', mktime(0, 0, 0, $season * 3, 1, date('Y')));
                break;
            case 'first-half-of-the-year':
                $first_day = date("Y-01-01 00:00:00", strtotime($date));
                $last_day = date("Y-06-30 23:59:59", strtotime($date));
                break;
            case 'second-half-of-the-year':
                $first_day = date("Y-07-01 00:00:00", strtotime($date));
                $last_day = date("Y-12-31 23:59:59", strtotime($date));
                break;
            case 'year':
                $first_day = date("Y-01-01 00:00:00", strtotime($date));
                $last_day = date("Y-12-31 23:59:59", strtotime($date));
                break;
            default:
                $first_day = date('Y-m-d 00:00:00', strtotime("$shift day"));
                $last_day = date("Y-m-d 23:59:59", strtotime("$shift day"));
        }
        return [
            'first_day' => $first_day,
            'last_day' => $last_day
        ];
    }
}