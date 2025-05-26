<?php

namespace App\Exports\ExportData;

use App\Models\IconMangement;
use Maatwebsite\Excel\Concerns\FromCollection;

class IconmanagementExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return IconMangement::all();
    }

    public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'icon name',  // 4th column heading
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
