<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;


class Category extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'image',
        'thumbnail',
        'name',
        'slug',
        'content',
        'cat_ust',
        'status',
    ];

    public function product()
    {
        return $this->hasMany(Product::class,'category_id');
    }

    public function category()
    {
        return $this->hasMany(Category::class)->withCount('product');
    }
    public function child()
    {
        return $this->hasMany(Category::class,'cat_ust','id')->withCount('product');
    }


    public function products(){
        return $this->hasManyThrough(
            Product::class,
            Category::class,
            "cat_ust",
            "category_id",
            "id",
            "id"
        );
    }
    public function parent()
    {
        return $this->hasOne(Category::class,'id','cat_ust');
    }



    public function sluggable(): array
{
    return [
        'slug' => [
            'source' => 'name',
            'onUpdate' => true,
        ]
    ];
}

}
