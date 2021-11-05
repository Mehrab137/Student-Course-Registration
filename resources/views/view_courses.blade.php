@extends('layout')

@section('content')
 
<div class="row">

    <div class="col-md-12 mt-2 text-center">
        <h4>Course List</h4>
    </div>

    <div class="col-md-12 mt-2">

        <div class="table-responsive">

            <table class="table table-bordered table-striped">
    
                <tr>
    
                    <th>#</th>
                    <th>Course Name</th>
                    <th>Course Credit</th>
                    <th>Department Name</th>
    
                </tr>
    
                @foreach ($courses as $course)
                    
                    {{-- MANUAL WAY

                    @php
                        $department = App\Models\Department::find($course->department_id);
                    @endphp --}}

                    <tr>
    
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->course_credit }}</td>
                        <td>{{ $course->department->dept_name }}</td>

                        {{-- MANUAL WAY
                        <td>{{ $department->dept_name }}</td> --}}
                        
                    </tr>
    
                @endforeach
    
            </table>
    
        </div>

    </div>

</div>

@endsection