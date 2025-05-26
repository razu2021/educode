<?php

namespace App\Exports\ExportData;

use App\Models\SiteScoial;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class SitesocialExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SiteScoial::all();
    }



    public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'title',  // 4th column heading
            'icon',  // 4th column heading
            'url',  // 4th column heading
            'order',  // 4th column heading
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
