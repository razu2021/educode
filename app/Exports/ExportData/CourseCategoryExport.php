<?php

namespace App\Exports\ExportData;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\CourseCategory;
use Maatwebsite\Excel\Concerns\WithHeadings;
class CourseCategoryExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CourseCategory::get();
    }


    public function headings(): array
    {
        return [
            'ID',           // 1st column heading
            'Name',         // 2nd column heading
            'Title',        // 3rd column heading
            'Description',  // 4th column heading
            'Slug',         // 5th column heading
        ];
    }
}
