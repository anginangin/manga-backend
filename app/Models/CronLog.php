<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CronLog extends Model
{
    protected $table = 'cron_log';
    protected $guarded = [];

    use HasFactory;
}
