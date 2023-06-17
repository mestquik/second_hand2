<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = [
        'user_id',
        'slug',
        'category_id',
        'product_name',
        'product_image',
        'product_thumbnail',
        'product_desc',
        'product_short_text',
        'product_price',
        'product_quantity',
        'size',
        'color',
        'status'


    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }






    public function getUser(){
        return $this->hasOne(User::class,'id','user_id');
    }


    public function review()
    {
        return $this->hasMany(Review::class,'product_id','review_id');
    }





    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'product_name'
            ]
        ];
    }

}




















