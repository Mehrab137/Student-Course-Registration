<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\StudentExport;
use App\Exports\SectionExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportStudent()
    {

        return (new StudentExport)->download('students.xlsx');

    }

    public function exportSection()
    {

        return (new SectionExport)->download('sections.xlsx');

    }
}
