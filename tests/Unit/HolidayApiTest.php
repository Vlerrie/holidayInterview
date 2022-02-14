<?php

namespace Tests\Unit;

use App\ServiceProviders\kayaposoftIntegration\CountryHolidaysPerYear;
use PHPUnit\Framework\TestCase;

class HolidayApiTest extends TestCase
{
    /**
     * Test setting and getting of valid year
     *
     * @return void
     */
    public function testValidYear()
    {
        $holidayAPI = new CountryHolidaysPerYear(date('Y'));

        $this->assertEquals(date('Y'), $holidayAPI->getYear());
    }

    /**
     * testing expected failure on invalid year
     *
     * @return void
     */
    public function testStringYear()
    {
        $this->expectError();
        $holidayAPI = new CountryHolidaysPerYear('alsdkfj');
    }

    /**
     * Setting and getting country codes work
     *
     * @return void
     */
    public function testSetCountry()
    {
        $holidayAPI = new CountryHolidaysPerYear(date('Y'));
        $holidayAPI->setCountry('us');

        $this->assertEquals('us', $holidayAPI->getCountry());
    }

    public function testRestRequestStatus()
    {
        $holidayAPI = new CountryHolidaysPerYear(date('Y'));
        $holidayAPI->getHolidays();
        $this->assertEquals(200, $holidayAPI->requestStatus);
    }
}
