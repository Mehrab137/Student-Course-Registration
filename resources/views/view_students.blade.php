@extends('layout')

@section('content')
 
<div class="row">

    <div class="col-md-12 mt-2 text-center">
        <h4>Student List</h4>
    </div>

    @if(Session::has('alert_msg'))

        <div class="col-md-12">

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ Session::get('alert_msg') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

        </div>

    @endif

    <div class="col-md-12 mt-2">

        <div class="table-responsive">

             <table class="table table-bordered table-striped">

                  <tr>

                        <th>#</th>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Date of Birth</th>
                        <th>Undergraduate Program</th>
                        <th style="width: 12%;">Action</th>

                  </tr>

                  @foreach ($students as $student)
                
                  <tr>

                     <td>{{ $loop->iteration }}</td>
                     <td>{{ $student->student_id }}</td>
                     <td>{{ $student->student_name }}</td>
                     <td>{{ $student->email_id }}</td>
                     <td>{{ $student->contact_number }}</td>
                     <td>{{ date_format(date_create($student->date_of_birth), "d-M-Y") }}</td>
                     <td>{{ $student->undergraduateProgram->UP_name }}</td>
                     <td><a href="{{ route('edit.student.view', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                         
                         <form action="{{ route('delete.student') }}" method="POST" style="display: inline">
                            @csrf

                            <input type="hidden" name="student_id" value="{{ $student->id }}">

                            <button class="btn btn-sm btn-danger">Delete</button>

                        </form>

                     </td>

                  </tr>

                  @endforeach

            </table>

         </div>

    </div>

</div>

@endsection