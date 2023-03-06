<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use Carbon\Carbon;

class WebappController extends Controller
{
    public function index()
    {
        // 学習時間
        $cb = Carbon::today();
        $today = Record::whereDate('learned_date', $cb)->sum('learned_hour') ?? 0;
        $month = Record::whereMonth('learned_date', $cb)->sum('learned_hour') ?? 0;
        $total = Record::sum('learned_hour') ?? 0;

        return view('webapp.index', compact('today','month', 'total'));
    }
}
