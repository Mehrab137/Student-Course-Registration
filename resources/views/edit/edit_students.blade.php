@extends('layout')

@section('content')


<div class="row">

    <div class="col-md-12 mt-2">

        <h4>Edit Students</h4>

    </div>

    @if(Session::has('alert_msg'))

        <div class="col-md-12">

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ Session::get('alert_msg') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

        </div>

    @endif

    <div class="col-md-12">

        <form method="POST" action="{{ route('edit.student.submit', $student->id) }}" enctype="multipart/form-data">

            @csrf

            <div class="form-group mt-3">
                <label class="form-label">Student ID:</label>
                <input type="number" name="student_id" value="{{ $student->student_id }}" class="form-control" >
            </div>

            <div class="form-group mt-3">
                <label class="form-label">Student Name:</label>
                <input type="text" name="student_name" value="{{ $student->student_name }}" class="form-control" >
            </div>

            <div class="form-group mt-3">
                <label class="form-label">Email:</label>
                <input type="text" name="email_id" value="{{ $student->email_id }}" class="form-control" >
            </div>

            <div class="form-group mt-3">
                <label class="form-label">Contact Number:</label>
                <input type="number" name="contact_number" value="{{ $student->contact_number }}" class="form-control" >
            </div>

            <div class="form-group mt-3">
                <label class="form-label">Address:</label>
                <input type="text" name="address" value="{{ $student->address }}" class="form-control" >
            </div>

            <div class="form-group mt-3">
                <label class="form-label">Date of Birth:</label>
                <input type="date" name="date_of_birth" value="{{ $student->date_of_birth }}" class="form-control" >
            </div>

            <div class="form-group mt-2">
                <label class="form-label">Profile Picture</label>
                <input type="file" name="student_profile_picture" class="form-control" value="{{ $student->student_profile_picture }}"> 
            </div>

            <div class="form-group mt-3">

                <label class="form-label">Undergraduate Program:</label>

                <select name="program_id" class="form-select">

                    <option value="" selected disabled>Select Program</option>

                    @foreach ($programs as $program)
                        
                        <option value="{{ $program->id }}"{{ $program->id == $student->undergraduateProgram->id ? "selected" : "" }}>{{ $program->UP_name }}</option>

                    @endforeach

                </select>

            </div>

            <div class="form-group mt-3">
                
                <input type="submit" value="Confirm" class="btn btn-primary">

            </div>

        </form>

    </div>

</div>

{{-- {{Form::hidden('_method','PUT')}} --}}

@endsection


