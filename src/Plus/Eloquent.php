<?php


namespace Chemex\Plus;

use Illuminate\Database\Eloquent\Model;

class Eloquent
{
    /**
     * 模型id换取name
     * @param Model $model
     * @param $id
     * @param $name
     * @return string
     */
    static function idToName(Model $model, $id, $name)
    {
        try {
            $model = $model->find($id);
            if (empty($model)) {
                return '未知';
            }
            return $model->$name;
        } catch (\Exception $exception) {
            return '未知';
        }
    }

    /**
     * 模型username换取name
     * @param Model $model
     * @param $username
     * @param $name
     * @return string
     */
    static function usernameToName(Model $model, $username, $name)
    {
        try {
            $model = $model->where('username', $username)->first();
            if (empty($model)) {
                return '未知';
            }
            return $model->$name;
        } catch (\Exception $exception) {
            return '未知';
        }
    }
}