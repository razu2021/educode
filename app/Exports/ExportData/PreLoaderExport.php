<?php

namespace App\Exports\ExportData;

use App\Models\Preloader;
use Maatwebsite\Excel\Concerns\FromCollection;

class PreLoaderExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Preloader::all();
    }



    public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'text',  // 4th column heading
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
