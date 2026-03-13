<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\IDSeries;

class IDSeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $codes = ['USR', 'TEN', 'STR', 'WHS', 'SUB'];

        foreach ($codes as $code) {
            IDSeries::firstOrCreate(
                ['code' => $code],
                ['series_value' => 0]
            );
        }
    }
}
