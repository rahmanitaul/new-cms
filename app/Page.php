<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Page extends Model
{
    protected $table = 'page';
    protected $primaryKey = 'id';
    protected $fillable = [
        'menu_id',
        'submenu_id',
        'meta_fields',
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

    public function getPage1()
    {
        return DB::table('page')
        ->join('menu', 'menu.id', '=', 'page.menu_id')
        ->select('page.*', 'menu.title as menu_title')
        ->orderby('page.id', 'asc')
        ->get();
    }

    public function getPage2()
    {
        return DB::table('page')
        ->join('menu', 'menu.id', '=', 'page.menu_id')
        ->join('submenu', 'submenu.id', '=', 'page.submenu_id')
        ->select('page.*', 'menu.title as menu_title', 'submenu.title as submenu_title')
        ->orderby('page.id', 'asc')
        ->get();
    }
}
