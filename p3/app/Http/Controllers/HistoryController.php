<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bmi;
use App\Charts\BmiUserChart;

class HistoryController extends Controller
{
    public function history(Request $request, BmiUserChart $chart)
    {
        $userId = $request->user()->id;
        $bmis = Bmi::where('user_id', '=', $userId)->get();

        if (!$bmis) 
            return view('history')->with(['flashAlert' => 'No bmi records found.']);

        return view('history')->with([
            'bmis' => $bmis,
            'chart' => $chart->build()
        ]);
    }

    public function delete(Request $request)
    {
        $bmiId = $request->query('bmi_id');
        Bmi::where('id', '=', $bmiId)->delete();
        return redirect()->action([HistoryController::class, 'history'], ['request' => $request]);
    }
}