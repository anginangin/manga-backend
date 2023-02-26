<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    protected $table = 'manga';
    protected $guarded = [];
    use HasFactory;

    public function chapters()
    {
        return $this->hasMany('App\Models\Chapter', 'manga_id');
    }

    public function slider(){
        return $this->hasOne('App\Models\Slider', 'manga_id');
    }

    public function trending(){
        return $this->hasOne('App\Models\Trending', 'manga_id');
    }

    public function recommend(){
        return $this->hasOne('App\Models\Recommend', 'manga_id');
    }
}
