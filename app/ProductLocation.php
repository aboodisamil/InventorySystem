<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductLocation extends Model
{
    protected $table='product_locations';
    protected $fillable = ['section', 'subsection', 'shelf', 'category_id', 'store_id'];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function store()
    {
        return $this->belongsTo('App\Category');
    }


}
