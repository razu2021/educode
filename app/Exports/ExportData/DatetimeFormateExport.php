<?php

namespace App\Exports\ExportData;

use App\Models\DateTimeFormate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class DatetimeFormateExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return DateTimeFormate::all();
    }

    // heading 
    public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'Date Formate ',  // 4th column heading
            'Time Formate ',  // 4th column heading
            'Slug', 
            'careator', 
            'editor', 
            'status', 
            'public_status', 
            'careated_at', 
            'updated_at', 
            
        ];
    }
}
