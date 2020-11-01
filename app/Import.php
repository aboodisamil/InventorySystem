<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    protected $fillable = [
        'product_id', 'num_of_box', 'quantity', 'category_id'
        , 'num_of_package_in_box', 'num_of_Piece_in_package', 'price_by_piece', 'price_by_package', 'manufacturer'
    ];


    public function scopeSelection($query)
    {
        return $query->select(
            'product_id', 'num_of_box', 'quantity'
            , 'num_of_package_in_box', 'num_of_Piece_in_package', 'price_by_piece', 'price_by_package', 'manufacturer'
        )->get();
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }


    public function category()
    {

        return $this->belongsTo('App\Category');
    }



}
