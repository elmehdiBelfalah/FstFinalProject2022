<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    // public $timestamps = false;

    public function brand()
    {
        return $this->hasOne(Brands::class);

    }

    public function category()
    {
        return $this->hasOne(Category::class , 'id',  'category_id');

    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
