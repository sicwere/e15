<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bmi;

class BmiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bmi = new Bmi();
        $bmi->user_id = 1;
        $bmi->bmi = 23.6;
        $bmi->weight = 155;
        $bmi->height = 68;
        $bmi->units = 'Standard';
        $bmi->save();

        $bmi = new Bmi();
        $bmi->user_id = 1;
        $bmi->bmi = 28.9;
        $bmi->weight = 190;
        $bmi->height = 68;
        $bmi->units = 'Standard';
        $bmi->save();

        $bmi = new Bmi();
        $bmi->user_id = 2;
        $bmi->bmi = 18.8;
        $bmi->weight = 75;
        $bmi->height = 2;
        $bmi->units = 'Metric';
        $bmi->save();

        $bmi = new Bmi();
        $bmi->user_id = 2;
        $bmi->bmi = 22.5;
        $bmi->weight = 90;
        $bmi->height = 2;
        $bmi->units = 'Metric';
        $bmi->save();
    }
}