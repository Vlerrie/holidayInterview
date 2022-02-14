<?php


namespace App\ServiceProviders\kayaposoftIntegration;


class CountryHolidaysPerYear extends holidaysAPI
{
    private $year;
    private $country = 'za';

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    public function setCountry(string $countryCode)
    {
        $this->country = $countryCode;
    }

    public function getHolidays()
    {
        return $this->guzzle('GET', "?action=getHolidaysForYear&year=$this->year&country=$this->country&holidayType=public_holiday");
    }
}
