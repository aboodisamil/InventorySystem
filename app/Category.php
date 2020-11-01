<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'status'];

    public function scopeWhereSearch($query, $request)
    {
        return $query->when($request, function ($q) use ($request) {

            return $q->where('name', 'like', "%$request%");
        });
    }



    public function suppliers()
    {
        return $this->hasMany('App\Supplier', 'supplier_categories', 'category_id', 'supplier_id');

    }


    public function stores()
    {
        return $this->hasMany('App\Store');
    }

    public function scopeSelection($query)
    {
        return $query->select('id', 'name')->where('status' , "1")->get();
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
