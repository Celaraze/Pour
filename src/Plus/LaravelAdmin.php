<?php


namespace Pour\Plus;


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

    /**
     * Eloquent集合转为规范的laravel-admin的listbox组件所需要的数组格式
     * @param $collection
     * @param $key
     * @param $value
     * @return array
     */
    static function collectionToArrayForListBox($collection, $key, $value)
    {
        $array = array();
        for ($i = 0; $i < count($collection); $i++) {
            $array[$collection[$i][$key]] = $collection[$i][$value];
        }
        return $array;
    }

    /**
     * 返回是/否
     * @return array
     */
    static function yesOrNo()
    {
        return [0 => '否', 1 => '是'];
    }

    /**
     * 返回switch组件的是/否
     * @return array
     */
    static function switchYesOrNo()
    {
        return [
            'on' => ['value' => 1, 'text' => '是', 'color' => 'primary'],
            'off' => ['value' => 0, 'text' => '否', 'color' => 'default'],
        ];
    }
}