@extends('layout')

@section('content')
 
<div class="row">

    <div class="col-md-12 mt-2 text-center">
        <h4>Student List</h4>
    </div>

    <div class="col-md-12 mt-4">

        <table class="table table-bordered">

            <tr>

                <th>#</th>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Date of Birth</th>
                <th>Undergraduate Program</th>
                <th>Action</th>

            </tr>

            @foreach ($students as $student)
                
                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->student_id }}</td>
                    <td>{{ $student->student_name }}</td>
                    <td>{{ $student->email_id }}</td>
                    <td>{{ $student->contact_number }}</td>
                    <td>{{ $student->date_of_birth }}</td>
                    <td>{{ $student->undergraduateProgram->UP_name }}</td>
                    <td><a href="{{ route('edit.student.view', $student->id) }}" class="btn btn-sm btn-warning">Edit</a></td>
                    
                </tr>

            @endforeach

        </table>

    </div>

</div>

@endsection