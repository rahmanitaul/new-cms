<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'icon',
        'link',
        'dropdown',
        'placement'
    ];

    public function getAll($table)
    {
        return DB::table($table)->get();
    }

    public function addData($table, $data)
    {
        return DB::table($table)->insert($data);
    }

    public function getDataById($table, $where)
    {
        return DB::table($table)->where($where)->first();;
    }

    public function updateData($table, $where, $data)
    {
        return DB::table($table)->where($where)->update($data);
    }

    public function deleteData($table, $where)
    {
        return DB::table($table)->where($where)->delete();
    }
}
