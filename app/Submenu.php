<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Submenu extends Model
{
    protected $table = 'submenu';
    protected $primaryKey = 'id';
    protected $fillable = [
        'menu_id',
        'title',
        'link',
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

    public function getSubMenu()
    {
        return DB::table('submenu')
        ->join('menu', 'submenu.menu_id', '=', 'menu.id')
        ->select('submenu.*', 'menu.title as menu_title')
        ->get();

    }

    public function getSubMenu_Id($id)
    {
        return DB::table('submenu')
        ->join('menu', 'submenu.menu_id', '=', 'menu.id')
        ->select('submenu.*', 'menu.title as menu_title')
        ->where('submenu.menu_id', '=', $id)
        ->get();

    }

}
