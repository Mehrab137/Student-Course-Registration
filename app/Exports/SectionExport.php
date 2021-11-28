<?php

namespace App\Exports;

use App\Models\Section;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

use Maatwebsite\Excel\Concerns\FromCollection;

class SectionExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping, WithEvents
{
    use Exportable; 

    public $serial;

    public function __construct()
    {

        $this->serial = 0;

    }

    public function collection()
    {
        
        return Section::with('course')->get();
    
    }

    public function headings():array
    {

        return [

            '#',
            'Section Name',
            'Starting time',
            'Ending time',
            'Days',
            'Number of Seats',
            'Course Name'
            
        ];

    }

    public function map($section):array
    {

        $this->serial++;

        return [

            $this->serial,
            $section->section_name,
            $section->start_time,
            $section->end_time,
            $section->days,
            $section->total_seats,
            $section->Course->course_name

        ];

    }

    public function registerEvents():array
    {
        return [

            Aftersheet::class => function(Aftersheet $event){

                $event->sheet->getStyle('A1:G1')->applyFromArray([
                    
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
