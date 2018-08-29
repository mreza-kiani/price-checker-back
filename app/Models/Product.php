<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property string url
 * @property string name
 * @property int price
 * @property string unit
 * @property string image_url
 * @property int driver
 */
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

