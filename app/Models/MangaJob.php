<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MangaJob extends Model
{
    protected $table = 'mangajob';
    protected $fillable = ['url_manga'];

    use HasFactory;
}
