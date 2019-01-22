<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

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

    public function getParentsAttribute(){
        $parents = collect([]);
        $parent = $this->parent;

        while(!is_null($parent)) {
            $parents->push($parent);
            $parent = $parent->parent;
        }

        return $parents;
    }

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
        return $this->hasMany(self::class, 'parent_id');
    }

}