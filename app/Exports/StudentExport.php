<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StudentExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping, WithStyles 
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::all();
    }

    public function headings():array
    {
        return [

            '#',
            'Student ID',
            'Student Name',
            'Email',
            'Contact',
            'Address',
            'Date OF Birth',
            'Program ID',

        ];
    }

    public function map($student):array
    {

        return [

            $student->id,
            $student->student_id,
            $student->student_name,
            $student->email_id,
            $student->contact_number,
            $student->address,
            $student->date_of_birth,
            $student->program_id

        ];

    }

    public function styles(Worksheet $sheets)
    {

        // return [

        //     1  => ['font' => ['bold' => true]],
        //     1  => ['font' => ['italic' => true]],
        //     1  => ['font' => ['size' => 16]],

        // ];

        $sheets->getStyle('1')->getFont()->setBold(true);
        $sheets->getStyle('1')->getFont()->setItalic(true);
        $sheets->getStyle('1')->getFont()->setSize("16");
        $sheets->getStyle('1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
        $sheets->getStyle('1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF0000');
    }
}
