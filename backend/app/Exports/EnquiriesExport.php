<?php
/*****************************************************/
# Company Name      :
# Author            :
# Created Date      :
# Page/Class name   : EnquiriesExport
# Purpose           : Excel generate
/*****************************************************/

namespace App\Exports;

use App\Models\Enquiry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class EnquiriesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /*
        * Function name : headings
        * Purpose       : To add heading
        * Author        : 
        * Created Date  : 
        * Modified Date : 
        * Input Params  : 
        * Return Value  : 
    */
    public function headings(): array
    {
        return [
            trans('custom_admin.label_name'),
            trans('custom_admin.label_phone_number'),
            trans('custom_admin.label_email'),
            trans('custom_admin.label_about_project'),
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Enquiry::select('name','phone_number','email','message')->get();
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:Z1';   // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);
            },
        ];
    }

}
