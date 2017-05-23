<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'age',
    ];

    public function scopeIsAdmin(Builder $query)
    {
        return $query->whereName('admin');
    }

    public function getAgeAttribute()
    {
        return 'secret';
    }

    public function setPermissionsAttribute($value)
    {
        $this->attributes['permissions'] = bindec(strtr($value, 'rwx-', '1110'));
    }
}
