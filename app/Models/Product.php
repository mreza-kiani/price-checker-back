<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'url', 'price', 'unit', 'image_url', 'driver',
    ];

    public function users() {
        return $this->belongsToMany(User::class, 'product_user', 'product_id', 'user_id');
    }
}

