<?php

namespace App\Console\Commands;

use App\Models\Holiday;
use App\ServiceProviders\kayaposoftIntegration\CountryHolidaysPerYear;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GetYearlyHolidays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'holidays:get {year?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets the holidays for specified year from https://kayaposoft.com';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $year = $this->argument('year');
        if (!isset($year)) {
            $year = date('Y');
        }

        $holidayAPI = new CountryHolidaysPerYear($year);
        $holidays = collect($holidayAPI->getHolidays())
            ->map(function ($h) {
                return [
                    'date' => Carbon::create($h->date->year, $h->date->month, $h->date->day)->toDateString(),
                    'name' => $h->name[0]->text,
                    'type' => $h->holidayType
                ];
            });

        foreach ($holidays as $holiday) {
            Holiday::updateOrCreate([
                'date' => $holiday['date'],
            ],
                [
                    'name' => $holiday['name'],
                    'type' => $holiday['type']
                ]);
        }
        echo "Holidays for $year has been updated";
    }
}
