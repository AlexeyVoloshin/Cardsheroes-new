<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Superhero extends Model
{
    protected $fillable
        = [
            'nickname',
            'real_name',
            'original_description',
            'superpower',
            'catch_phrase',
        ];
    public function photo()
    {
        return $this->hasOne(HeroesPhoto::class, 'hero_id');
    }
    public function photos()
    {
        return $this->hasMany(HeroesPhoto::class, 'hero_id');
    }
}
