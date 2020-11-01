<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNameAttribute($val)
    {
        return ucfirst($val);


    }

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });
    }

    public function scopeWhenRoleSearch($query, $role)
    {
        return $query->whereHas('roles' , function ($q) use ($role){
            return $q->where('id','like' , "%$role%");
        });
    }


    public function scopeWhereUserNot($query, $role)
    {
            return $query->whereHas('roles' ,function ($q) use ($role){
                return $q->whereNotIn('name',(array)$role);
            });

    }
}
