<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
//use App\Models\CronLog;
use App\Models\Manga;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $manga = Manga::count();
        $member = User::where('role', 0)->count();
        $chapter = Chapter::count();
        
        return view('pages.dashboard', compact('manga', 'member', 'chapter'));
    }
}
