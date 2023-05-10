<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Predict;

class PredictController extends Controller
{
    public function project(Request $request)
    {
        $request->validate([
            'target' => 'required|numeric|min:1',
            'height' => 'required|numeric|min:1',
            'weight' => 'required|numeric|min:1',
            'months' => 'required|numeric|min:1',
            'units' => 'required'
        ]);
        
        $targetBmi = $request->input('target', 25); # 25 is highest BMI for normal category
        $height = $request->input('height', 0);
        $weight = $request->input('weight', null);
        $months = $request->input('months', 1);
        $units = $request->input('units', 'Standard');

        $currentBmi = $weight / ($height ** 2);
        if($units === 'Standard')
            $currentBmi *= 703;
        $currentBmi = round($currentBmi, 1);

        $targetWeight = 0;
        $perMonth = 0;
        $noLossMsg = null;

        if($targetBmi < $currentBmi) 
        {
            $currentHeight = $units === 'Standard' ? $height * 0.0254 : $height;
            $targetWeight = $targetBmi * ($currentHeight ** 2);
            if($units === 'Standard')
                $targetWeight *= 2.20462;
            $targetWeight = round($weight - $targetWeight, 1);
            $perMonth = round($targetWeight / $months, 1);
        }
        else {
            $noLossMsg = 'The target BMI is higher than your current BMI.';
        }

        return redirect('/predict')->with([
            'targetWeight' => $targetWeight,
            'perMonth' => $perMonth,
            'measure' => $units === 'Standard' ? 'lbs' : 'kgs',
            'height' => $height,
            'weight' => $weight,
            'target' => $targetBmi,
            'months' => $months,
            'units' => $units,
            'noLossMsg' => $noLossMsg
        ]);
    }

}