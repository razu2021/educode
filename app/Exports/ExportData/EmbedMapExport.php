<?php

namespace App\Exports\ExportData;

use App\Models\EmbedMap;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmbedMapExport implements FromCollection
{
       /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EmbedMap::all();
    }

    // inlcuded heading 

    // Correct headings method
    public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'address_line1',  // 4th column heading
            'address_line2',  // 4th column heading
            'city',  // 4th column heading
            'state',  // 4th column heading
            'postal_code',  // 4th column heading
            'country',  // 4th column heading
            'latitude',  // 4th column heading
            'longitude',  // 4th column heading
            'static_map',  // 4th column heading
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
