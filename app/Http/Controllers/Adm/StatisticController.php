<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller 
{
    public function getFullStat() 
    {
        $stat = Statistic::selectRaw('name, COUNT(name) as count')->groupBy('name')->get();
        //dd($stat);

        return view('adm.fullstat', [
            'stat' => $stat,
        ]);
    }

    public function getPageStat(Request $request) 
    {
        $stat = Statistic::where('name', $request->route('page'))->orderBy('dt', 'DESC')->paginate(20);
        
        return view('adm.pagestat', [
            'stat' => $stat,
        ]);
    }

    public function delFullStat() 
    {
        Statistic::truncate();

        return ['url' => '/adm/fullstat'];
    }

    public function delPageStat(Request $request) 
    {
        Statistic::where('name', $request->route('page'))->delete();

        return ['url' => "/adm/fullstat/$request->route('page')"];
    }
}