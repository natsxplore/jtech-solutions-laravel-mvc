<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\Models\IDSeries;

class IDGenerator
{
    public static function generate($code)
    {
        return DB::transaction(function () use ($code) {
            $series = IDSeries::where('code', $code)
                                ->lockForUpdate()
                                ->first();

            if (!$series) {
                $series = IDSeries::create([
                    'code' => $code,
                    'series_value' => 0,
                ]);
            }

            $series->increment('series_value');

            $year = date('Y');
            $paddedNumber = str_pad($series->series_value, 10, '0', STR_PAD_LEFT);

            return "{$code}-{$year}-{$paddedNumber}";
        });
    }

    public static function format($code, $number, $year = null)
    {
        $year = $year ?? date('Y');
        return "{$code}-{$year}-" . str_pad($number, 10, '0', STR_PAD_LEFT);
    }
}
