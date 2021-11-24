<?php

namespace App\Imports;

use App\Models\Department;
use Maatwebsite\Excel\Concerns\ToModel;

class DepartmentImport implements ToModel
{
    public function model(array $row)
    {
        return new Department([

            'dept_name' => $row[0],
        
        ]);
    }
}
