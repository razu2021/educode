<?php

namespace App\Exports\ExportData;

use App\Models\CustomScript;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomscriptExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return CustomScript::all();
    }
        public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'Script Note ',  // 4th column heading
            'Script',  // 4th column heading
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
