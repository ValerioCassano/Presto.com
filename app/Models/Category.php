<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory ;
    protected $fillable = ['name'];


    public function acceptedProducts()
    {
        return $this->hasMany(Product::class)->where('is_accepted', true);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }



}
