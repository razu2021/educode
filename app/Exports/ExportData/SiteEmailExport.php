<?php

namespace App\Exports\ExportData;

use App\Models\SiteEmail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class SiteEmailExport implements FromCollection , WithHeadings
{
      /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SiteEmail::all();
    }

    // inlcuded heading 

    // Correct headings method
    public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'email type',        // 3rd column heading
            'email',  // 4th column heading
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
