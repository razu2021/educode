<?php

namespace App\Exports\ExportData;

use App\Models\SiteAddress;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class SiteAddressExport implements FromCollection , WithHeadings
{
         /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SiteAddress::all();
    }

    // inlcuded heading 

    // Correct headings method
    public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'address',  // 4th column heading
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
