<?php

namespace App\Exports\ExportData;

use App\Mail\SendEmail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class SendmailExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SendEmail::all();
    }

        public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'Mail to',  // 4th column heading
            'Mail Subject',  // 4th column heading
            'Mail Body',  // 4th column heading
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
