<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['unit' , 'status'];

    public function scopeSelection($query)
    {
        return $query->select('id', 'unit' ,'status')->where('status','1')->get();
    }
}
