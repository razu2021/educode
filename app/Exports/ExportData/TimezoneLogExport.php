<?php

namespace App\Exports\ExportData;

use App\Models\TimeZoneLog;
use Maatwebsite\Excel\Concerns\FromCollection;


class TimezoneLogExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return  TimeZoneLog::all();

    }
}
