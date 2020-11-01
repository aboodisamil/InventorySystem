<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    protected $fillable = ['store_id', 'customer_id', 'user_id', 'dateTime', 'notes', 'total_price', 'status'];

    public function imports()
    {
        return $this->belongsToMany('App\Import', 'export_imports', 'export_id', 'import_id')->withPivot('price', 'spent_quantity', 'quantity');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    public function getStatusAttribute($val)
    {
        if ($val == '2')
            return 'قيد التنفيذ';
        elseif ($val == '1')
            return 'مكتمل';
        else
            return 'غير مكتمل';
    }

    public function getDate()
    {
        return  Carbon::parse($this->dateTime)->format('m/d/y');
    }

}
