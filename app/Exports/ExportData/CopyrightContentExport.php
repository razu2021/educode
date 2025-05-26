<?php

namespace App\Exports\ExportData;

use App\Models\CopyRight;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class CopyrightContentExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CopyRight::all();
    }


    public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'Receved by',  // 4th column heading
            'Design by',  // 4th column heading
            'Recever URL',  // 4th column heading
            'Designer URL',  // 4th column heading
            'Recever icon',  // 4th column heading
            'Designer icon',  // 4th column heading
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
