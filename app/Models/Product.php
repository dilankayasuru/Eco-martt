<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'name',
        'category',
        'description',
        'price',
        'quantity',
        'image',
        'product_certification',
        'product_certification_image',
    ];

    // In Product.php
    public function supplier()
    {
        return $this->belongsTo(User::class, 'supplier_id'); // Assuming 'supplier_id' is the foreign key in the products table
    }



}
