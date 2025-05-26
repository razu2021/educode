<?php

namespace App\Exports\ExportData;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\MaintenanceMode;
class MaintenanceModeExport implements FromCollection ,WithHeadings
{
      /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MaintenanceMode::all();
    }

    // inlcuded heading 

    // Correct headings method
    public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'Title',        // 3rd column heading
            'caption',  // 4th column heading
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
