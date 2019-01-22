<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class News extends Model {

    public $fillable = [
        'title',
        'content',
        'author_id',
        'category_id',
        'published',
        'created_at',
        'updated_at'
    ];

    public $dates = [
        'created_at',
        'updated_at'
    ];


    // RELATIONS
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }
}