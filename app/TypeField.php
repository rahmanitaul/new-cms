<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TypeField extends Model
{
    protected $table = 'type_field';
    protected $primaryKey = 'id';
    protected $fillable = [
        'type'
    ];
}