<?php

namespace App\Exports\ExportData;

use App\Models\Siteinformation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class SiteinformationExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siteinformation::all();
    }



    public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'Name',  // 4th column heading
            'title',  // 4th column heading
            'Slogan',  // 4th column heading
            'Description',  // 4th column heading
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
