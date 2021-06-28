<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailPage extends Model
{
    protected $table = 'detail_page';
    protected $primaryKey = 'id';
    protected $fillable = [
        'page_id',
        'meta',
        'type',
        'method',
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

    public function getDetailPage($id)
    {
        return DB::table('detail_page')
        ->join('page', 'page.id', '=', 'detail_page.page_id')
        ->select('detail_page.*')
        ->orderby('page.id', 'asc')
        ->get();
    }
}
