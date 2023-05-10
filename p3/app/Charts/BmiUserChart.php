<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Bmi;
use Illuminate\Support\Facades\Auth;

class BmiUserChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $userId = Auth::id();
        $records = Bmi::where('user_id', '=', $userId)->get();
        $bmis = $records->pluck('bmi')->toArray();
        return $this->chart->lineChart()
            ->setTitle('BMI')
            ->addData('BMIs', $bmis);
        }
}