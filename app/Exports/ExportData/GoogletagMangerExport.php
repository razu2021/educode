<?php

namespace App\Exports\ExportData;

use App\Models\GoogleTagManager;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class GoogletagMangerExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return GoogleTagManager::all();
    }
    public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'tag id',  // 4th column heading
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
