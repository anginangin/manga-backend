<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeColor extends Model
{
    protected $table = 'theme_colors';
    protected $guarded = [];

    use HasFactory;
}
