<?php

namespace App\Exports\ExportData;

use App\Models\AuthCredentials;
use Maatwebsite\Excel\Concerns\FromCollection;

class AuthcredentialsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AuthCredentials::all();
    }

    // -------  heding settup 
    public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'Name',  // 4th column heading
            'client Id',  // 4th column heading
            'client Secret',  // 4th column heading
            'Redirect URL ',  // 4th column heading
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
