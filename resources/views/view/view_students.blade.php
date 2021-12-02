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

        <a href="{{ route('export.student.excel') }}" class="btn btn-sm btn-success">Export as Spreadsheet</a>

        <div class="table-responsive mt-3 shadow p-3 mb-5 bg-body rounded">

             <table id="student_table" class="table table-bordered table-striped">

                <thead>

                    <tr>

                        <th>#</th>
                        <th>Student Picture</th>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Date of Birth</th>
                        <th>Undergraduate Program</th>
                        <th style="width: 16%">Action</th>
    
                    </tr>

                </thead>

                  {{-- @foreach ($students as $student)
                
                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img style="object-fit: cover; width:100px; height:100px" src="{{ env("APP_URL") . Storage::url($student->student_profile_picture) }}">
                    </td>
                    <td>{{ $student->student_id }}</td>
                    <td>{{ $student->student_name }}</td>
                    <td>{{ $student->email_id }}</td>
                    <td>{{ $student->contact_number }}</td>
                    <td>{{ date_format(date_create($student->date_of_birth), "d/M/Y") }}</td>
                    <td>{{ $student->undergraduateProgram->UP_name }}</td>
                    <td><a href="{{ route('edit.student.view', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        
                        <form action="{{ route('delete.student') }}" method="POST" style="display: inline">
                            @csrf

                            <input type="hidden" name="student_id" value="{{ $student->id }}">

                            <button class="btn btn-sm btn-danger">Delete</button>

                        </form>

                    </td>

                </tr>

                  @endforeach --}}

                  <tbody>

                  </tbody>

                </table>
            
            </div>
        
        </div>

    </div>

@endsection

@push('js')

<script>

    $(document).ready( function () {

    $('#student_table').DataTable({

    processing: true,
    serverside: true,

    ajax: "{{ route('view.student.list') }}",

    columns: [

        { data: 'DT_RowIndex' , name: 'DT_RowIndex' },
        { data: 'student_profile_picture' , name: 'student_profile_picture' },
        { data: 'student_id' , name: 'student_id' },
        { data: 'student_name' , name: 'student_name'},
        { data: 'email_id' , name: 'email_id'},
        { data: 'contact_number' , name: 'contact_number'},
        { data: 'date_of_birth' , name: 'date_of_birth'},
        { data: 'program_name' , name: 'program_name'},
        { data: 'action' , name: 'action'},
                
        ]

        });

    });


</script>
    
@endpush