<?php

namespace App\Http\Services;

use Carbon\Carbon;

class AdminService
{
    public function GetTimeStampFromDate(String $date)
    {
        return Carbon::createFromFormat('Y-m-d\TH:i',$date)->getPreciseTimestamp(3);
    }
}
