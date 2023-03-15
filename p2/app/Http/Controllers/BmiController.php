<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BmiController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'height' => 'required|numeric|min:1',
            'weight' => 'required|numeric|min:1',
            'units' => 'required'
        ]);
     
        $ranges = [ 'underweight' => 18.5, 'normal' => 24.9, 'overweight' => 29.9];
        $height = $request->input('height', 0);
        $weight = $request->input('weight', null);
        $units = $request->input('units', 'Standard');
        $categories = $request->input('categories', false);
        $bmi = null;
        $category = null;

        $bmi = $weight / ($height ** 2);
        if($units === 'Standard')
            $bmi *= 703;
        $bmi = round($bmi, 1);
        
        if($categories) {
            foreach($ranges as $key => $value) {
                if($bmi < $value) {
                    $category = $key;
                    break;
                }
            }
        }

        return redirect('/')->with([
            'bmi' => $bmi,
            'category' => $category,
            'height' => $height,
            'weight' => $weight,
            'units' => $units,
            'categories' => $categories
        ]);
    }
}