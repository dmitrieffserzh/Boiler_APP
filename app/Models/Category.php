<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    use NodeTrait;

    public $fillable = [
        'parent_id',
        'title',
        'slug',
        'created_at',
        'updated_at'
    ];

    public $dates = [
        'created_at',
        'updated_at'
    ];

    public function getRouteKeyName() {
        return 'slug';
    }


    // RELATIONS
    public function posts() {
        return $this->hasMany(News::class, 'category_id');
    }

    public function parent() {
        return $this->hasOne( self::class, 'id', 'parent_id');
    }

    public function children() {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

}