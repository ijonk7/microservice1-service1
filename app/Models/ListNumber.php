<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListNumber extends Model
{
    protected $table = 'list_number';
    protected $fillable = ['id','value','created_at','updated_at'];
}
