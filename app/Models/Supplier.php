<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'certification_name',
        'certification_image',
        'valid_time_period',
        'is_approved',
        'contact_number',
    ];

    protected $casts = [
        'is_approved' => 'boolean', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

   

}
