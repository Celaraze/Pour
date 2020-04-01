<?php


namespace Carafe\Facades\Plus;


class LaravelAdmin
{
    /**
     * Eloquent集合转为规范的laravel-admin的select组件所需要的数组格式
     * @param $collection
     * @param $id
     * @param $value
     * @return array
     */
    static function collectionToArray($collection, $id, $value)
    {
        $array = json_decode(json_encode($collection), 1);
        $data = array();
        for ($i = 0; $i < count($array); $i++) {
            $data[$i]['id'] = $array[$i][$id];
            $data[$i]['text'] = $array[$i][$value];
        }
        return $data;
    }
}