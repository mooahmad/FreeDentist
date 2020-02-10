<?php
/**
 * Created by PhpStorm.
 * User: ahmad
 * Date: 1/15/2020
 * Time: 11:38 AM
 */

namespace App\App\Domain\Helpers;


use Carbon\Carbon;

class Dates
{
    public function generateDateRange($start_date, $end_date)
    {
        $dates = [];
        $start = Carbon::createFromDate($start_date);
        $end = Carbon::createFromDate($end_date);
        for ($date = $start; $date->lte($end); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }
        return $dates;
    }

    public function getDay($value)
    {
        return Carbon::parse($value)->format('l');
    }
}