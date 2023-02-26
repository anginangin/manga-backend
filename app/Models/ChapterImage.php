<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterImage extends Model
{
    protected $table = 'manga_chapter_image';
    protected $guarded = [];
    use HasFactory;
}
