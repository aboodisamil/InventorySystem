<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    protected $fillable = ['product_name', 'category_id', 'num_of_box'
        , 'num_of_package_in_box', 'num_of_Piece_in_package', 'price_by_piece', 'price_by_package', 'manufacturer', 'unit_id'];

    public function unit()
    {
        return $this->belongsTo('App\Unit');

    }

    public function scopeWhereSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('product_name', 'like', "%$search%");
        });
    }

    public function stores()
    {
        return $this->belongsToMany('App\Store', 'store_products');

    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getQrcodeAttribute($val)
    {
        return asset($val);
    }

    public function scopeSelection($q)
    {
        return $q->select('id' , 'product_name')->get();
    }

}
