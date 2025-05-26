<?php

namespace App\Exports\ExportData;

use App\Models\SiteAdminMail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class SiteAdminmailExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SiteAdminMail::all();
    }

    // heaings --------------
    public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'mail user',  // 4th column heading
            'mail ',  // 4th column heading
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
