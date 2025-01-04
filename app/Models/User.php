<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;



class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password', 'role_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function supplier()
    {
        return $this->hasOne(Supplier::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

   
    


}


    



