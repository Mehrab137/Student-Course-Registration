<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class StudentExport implements 
    FromCollection, 
    ShouldAutoSize, 
    WithHeadings, 
    WithMapping, 
    WithEvents

{
    use Exportable;

    public $serial;

    public function __construct()
    {

        $this->serial = 0;

    }

    public function collection()
    {
        
        return Student::with('undergraduateProgram')->get();

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
            'Undergraduate Program',

        ];
    }

    public function map($student):array
    {
        $this->serial++;

        return [

            $this->serial,
            $student->student_id,
            $student->student_name,
            $student->email_id,
            $student->contact_number,
            $student->address,
            $student->date_of_birth,
            $student->Undergraduateprogram->UP_name

        ];

    }

    public function registerEvents():array
    {
        return [

            Aftersheet::class => function(Aftersheet $event){

                $event->sheet->getStyle('A1:H1')->applyFromArray([
                    
                    'font' => [
                    
                        'bold' => true,
                        'italic' => true,
                        'size' => '16',

                    ],

                    'borders' => [
                       
                        'outline' => [
                       
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => 'FFFF0000'],
                       
                        ]
                    
                    ]
                    
                ]);

            },

        ];

    }
    
}
