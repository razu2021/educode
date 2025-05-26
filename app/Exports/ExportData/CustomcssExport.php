<?php

namespace App\Exports\ExportData;

use App\Models\CustomCss;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class CustomcssExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CustomCss::all();
    }

    public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'Css Note',  // 4th column heading
            'Css',  // 4th column heading
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
