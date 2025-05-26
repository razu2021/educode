<?php

namespace App\Exports\ExportData;

use App\Models\SitePhone;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class SitePhoneExport implements FromCollection,WithHeadings
{
      /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SitePhone::all();
    }

    // inlcuded heading 

    // Correct headings method
    public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'phone type',        // 3rd column heading
            'phone',  // 4th column heading
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
