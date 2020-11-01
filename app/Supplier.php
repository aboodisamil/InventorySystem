<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['contact_person', 'phone', 'supplier'];

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'supplier_categories', 'supplier_id', 'category_id');
    }

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('supplier', 'like', "%$search%");
        });
    }

    public function scopeSelection($query)
    {
        return $query->select('id','supplier', 'contact_person', 'phone');

    }

}
