<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * App\Category
 *
 * @mixin \Eloquent
 */
class Category extends Model
{
    protected $fillable = ['name', 'slug', 'parent_id', 'published'];

    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug(mb_substr($this->name, 0, 40).'-'.\Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    public function children(){
        return $this->hasMany(self::class, 'parent_id');
    }
}
