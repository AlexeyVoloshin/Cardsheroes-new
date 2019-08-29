<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroesPhoto extends Model
{
    protected $fillable
        = [
            'hero_id',
            'images',
        ];
    public function superhero()
    {
        //фотография принадлежит superhero
        return $this->belongsTo(Superhero::class, 'hero');
    }
}
