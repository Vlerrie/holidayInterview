<?php

namespace App\Http\Controllers;

use App\Models\Holiday;

class HolidaysController extends Controller
{
    public function index($year = null)
    {
        if (!isset($year)) {
            $year = date('Y');
        }

        $holidays = Holiday::where('date', 'like', $year . '%')->get();
        $availableYears = Holiday::selectRaw('LEFT(date, 4) as year')
            ->distinct('year')
            ->get()
            ->pluck('year')
            ->toArray();

        return view('index', [
            'selectedYear' => $year,
            'availableYears' => $availableYears,
            'holidays' => $holidays
        ]);
    }
}
