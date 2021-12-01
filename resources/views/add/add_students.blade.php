@extends('layout')

@section('content')


<div class="row">

    <div class="col-md-12 mt-3" style="padding-left: 17%">

        <h4>Add Students</h4>

    </div>
    
    @if ($errors->any())
        <div class="col-md-10" style="padding-left: 17%">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @if(Session::has('alert_msg'))

        <div class="col-md-10" style="padding-left: 17%">

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ Session::get('alert_msg') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

        </div>

    @endif

    <div class="col-md-8 shadow-sm p-3 mb-5 bg-body rounded" style="margin:0 auto">

        <form method="POST" action="{{ route('add.student.submit') }}" enctype="multipart/form-data">

            @csrf

            <div class="form-group mt-2">
                <label class="form-label">Student Name:</label>
                <input type="text" name="student_name" class="form-control" value="{{ old('student_name') }}">
            </div>

            <div class="form-group mt-2">
                <label class="form-label">Email:</label>
                <input type="text" name="email_id" class="form-control" value="{{ old('email_id') }}">
            </div>

            <div class="form-group mt-2">
                <label class="form-label">Contact Number:</label>
                <input type="number" name="contact_number" class="form-control" value="{{ old('contact_number') }}">
            </div>

            <div class="form-group mt-2">
                <label class="form-label">Address:</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
            </div>

            <div class="form-group mt-2">
                <label class="form-label">Date of Birth:</label>
                <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
            </div>

            <div class="form-group mt-2">
                <label class="form-label">Profile Picture</label>
                <input type="file" name="student_profile_picture" class="form-control" value="{{ old('student_profile_picture') }}" alt="pro_pic"> 
            </div>

            <div class="form-group mt-2">

                <label class="form-label">Undergraduate Program:</label>

                <select name="program_id" class="form-select">

                    <option value="" selected disabled>Select Program</option>

                    @foreach ($programs as $program)
                        
                        <option value="{{ $program->id }}"{{ old('program_id') == $program->id ? "selected" : "" }}>{{ $program->UP_name }}</option>

                    @endforeach

                </select>

            </div>

            <div class="form-group mt-3">
                
                <input type="submit" value="Add" class="btn btn-primary bg-dark text-white">

            </div>

        </form>

    </div>

</div>


@endsection



