<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Language;
use App\Models\Content;
use App\Models\LearnedContent;
use App\Models\LearnedLanguage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class WebappController extends Controller
{
    public function index()
    {
        // 学習時間
        $cb = Carbon::today();
        $today = Record::whereDate('learned_date', $cb)->sum('learned_hour') ?? 0;
        $month = Record::whereMonth('learned_date', $cb)->sum('learned_hour') ?? 0;
        $total = Record::sum('learned_hour') ?? 0;

        // legends
        $lang_legends = Language::all();
        $content_legends = Content::all();

        // google charts
        //コンテンツ
        $contents_data = DB::table('learnedContents')->join('records','record_id', '=', 'records.id')->select('content')->selectRaw('SUM(records.learned_hour) AS hour')->groupBy('content_id')->orderBy('content_id')->join('contents', 'content_id', '=', 'contents.id')->get();
        //言語
        $languages_data = DB::table('learnedLanguages')->join('records','record_id', '=', 'records.id')->select('language')->selectRaw('SUM(records.learned_hour) AS hour')->groupBy('language_id')->orderBy('language_id')->join('languages', 'language_id', '=', 'languages.id')->get();

        //bar chart
        $bar_data = Record::selectRaw('DAY(learned_date) day, SUM(learned_hour) AS hour')->whereYear('learned_date', $cb)->whereMonth('learned_date', $cb)->groupby('learned_date')->get();

        return view('webapp.index', compact('today','month', 'total', 'lang_legends', 'content_legends' ,'contents_data', 'languages_data', 'bar_data'));
    }
}
