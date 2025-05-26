<?php

namespace App\Exports\ExportData;

use App\Models\PaymentGateway;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class PaymentGetwaycredentialExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PaymentGateway::all();
    }


    public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'Gateway type',  // 4th column heading
            'Gateway Name',  // 4th column heading
            'api key',  // 4th column heading
            'api secret',  // 4th column heading
            'client id',  // 4th column heading
            'client secret',  // 4th column heading
            'webhook secret',  // 4th column heading
            'marchant id',  // 4th column heading
            'user name',  // 4th column heading
            'password',  // 4th column heading
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
