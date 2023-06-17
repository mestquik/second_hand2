<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review_ratings';
    protected $fillable = [
        'product_id',
        'user_id',
        'comment',
        'star_rating',
        'status',
    ];



public function user(){

    return $this->belongsTo(User::class,'user_id','id');
    }
}
