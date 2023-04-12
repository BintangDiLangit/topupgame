<?php

namespace App\Traits;

use DateTimeInterface;

trait FormatDates
{
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-m-Y H:i:s');
    }
}
