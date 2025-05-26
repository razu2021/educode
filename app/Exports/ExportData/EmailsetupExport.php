<?php

namespace App\Exports\ExportData;

use App\Models\EmailSetup;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class EmailsetupExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EmailSetup::all();
    }



    public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'Host',  // 4th column heading
            'Port',  // 4th column heading
            'User Name',  // 4th column heading
            'Password',  // 4th column heading
            'mail Form',  // 4th column heading
            'mail form  name',  // 4th column heading
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
