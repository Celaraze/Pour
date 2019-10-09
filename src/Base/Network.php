<?php

namespace Famio\Saber\Facades;


class Network
{
    /**
     * Request headers转为数组
     * @param $headers
     * @return array
     * TODO 需要增加排除项
     */
    static function gatewayHeadersToArray($headers)
    {
        $array = $headers->all();
        $result = [];
        $keys = array_keys($array);
        for ($i = 0; $i < count($keys); $i++) {
            if ($keys[$i] != 'host') {
                $result = array_merge($result, [$keys[$i] => $array[$keys[$i]]]);
            }
        }
        return $result;
    }
}