<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    use HasFactory;
    protected $fillable = ['manga_id', 'title_id', 'urutan', 'is_active'];

    public function manga()
    {
        return $this->belongsTo('App\Models\Manga', 'manga_id');
    }
}
