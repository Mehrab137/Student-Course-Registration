@extends('layout')

@section('content')


<div class="row">

    <div class="col-md-12 mt-2">

        <h4>Add Students</h4>

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

        <form method="POST" action="{{ route('add.student.submit') }}">

            @csrf

            <div class="form-group mt-3">
                <label class="form-label">Student ID:</label>
                <input type="number" name="student_id" class="form-control" >
            </div>

            <div class="form-group mt-3">
                <label class="form-label">Student Name:</label>
                <input type="text" name="student_name" class="form-control" >
            </div>

            <div class="form-group mt-3">
                <label class="form-label">Email:</label>
                <input type="text" name="email_id" class="form-control" >
            </div>

            <div class="form-group mt-3">
                <label class="form-label">Contact Number:</label>
                <input type="number" name="contact_number" class="form-control" >
            </div>

            <div class="form-group mt-3">
                <label class="form-label">Address:</label>
                <input type="text" name="address" class="form-control" >
            </div>

            <div class="form-group mt-3">
                <label class="form-label">Date of Birth:</label>
                <input type="date" name="date_of_birth" class="form-control" >
            </div>

            <div class="form-group mt-3">

                <label class="form-label">Undergraduate Program:</label>

                <select name="program_id" class="form-select">

                    <option value="" selected disabled>Select Program</option>

                    @foreach ($programs as $program)
                        
                        <option value="{{ $program->id }}">{{ $program->UP_name }}</option>

                    @endforeach

                </select>

            </div>

            <div class="form-group mt-3">
                
                <input type="submit" value="Submit" class="btn btn-primary">

            </div>

        </form>

    </div>

</div>


@endsection





{{-- @extends('layout')

@section('content')

 <br>
<h2>Fill up the fields below</h2><br>

<form action="{{route('add.student.submit')}}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Student ID</label>
        <input type="number" name="student_id" class="form-control" >
     </div>
     <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Name of the Student</label>
        <input type="text" name="student_name" class="form-control" >
     </div>
     <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Email</label>
        <input type="text" name="email_id" class="form-control" >
     </div>
     <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Contact number</label>
        <input type="number" name="contact_number" class="form-control" >
     </div>
     <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Address</label>
        <input type="text" name="address" class="form-control" >
     </div>
     <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Date of Birth</label>
        <input type="date" name="date_of_birth" class="form-control" >
     </div>
    
     <button type="submit" class="btn btn-primary">Add</button>
</form>

@endsection --}}