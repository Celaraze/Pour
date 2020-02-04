<?php


namespace Famio\Saber\Facades\Laravel;


use Illuminate\Support\Facades\DB;

class Eloquent
{
    static function subtotal($table_name, $title)
    {
        return DB::table($table_name)
            ->select(DB::raw("$title,count(*) as counts"))
            ->groupBy($title)
            ->get();
    }
}