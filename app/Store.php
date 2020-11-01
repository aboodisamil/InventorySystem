<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Store extends Model
{
    protected $fillable = ['name', 'address', 'rental_date',
        'duration_of_the_rental', 'rental_salary', 'status',
        'category_id'];


    public function categories()
    {
        return $this->belongsToMany('App\Category', 'store_categories');

    }

    public function setRentalDateAttribute($value)
    {
        $this->attributes['rental_date'] = (new Carbon($value))->format('y/m/d');
    }


    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });
    }

    public function scopeWhenStatusSearch($query, $status)
    {
        return $query->when($status, function ($q) use ($status) {
            return $q->where('status', 'like', "%$status%");
        });
    }


    public function scopeSelection($query)
    {
        return $query->select('id', 'name')->get();

    }

}
