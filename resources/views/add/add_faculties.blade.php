@extends('layout')

@section('content')

<div class="row">

    <div class="col-md-12 mt-3" style="padding-left: 17%">

        <h4>Add Faculties</h4>

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

    <div class="col-md-8 mt-2 shadow-sm p-3 mb-5 bg-body rounded" style="margin: 0 auto;">

        <form method="POST" action="{{ route('add.faculty.submit') }}">

            @csrf

            <div class="form-group">
                <label class="form-label">Faculty Name:</label>
                <input type="text" name="faculty_name" class="form-control" value="{{ old('faculty_name') }}" >
            </div>

            <div class="form-group mt-3">
                <label class="form-label">Email:</label>
                <input type="text" name="email_id" class="form-control" value="{{ old('email_id') }}" >
            </div>

            <div class="form-group mt-3">
                <label class="form-label">Contact number:</label>
                <input type="number" name="contact_number" class="form-control" value="{{ old('contact_number') }}" >
            </div>

            <div class="form-group mt-3">
                <label class="form-label">Address:</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}" >
            </div>

            <div class="form-group mt-3">

                <label class="form-label">Department:</label>

                <select name="department_id" class="form-select">

                    <option value="" selected disabled>Select Department</option>

                    @foreach ($departments as $department)
                        
                        <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? "selected" : "" }}>{{ $department->dept_name }}</option>

                    @endforeach

                </select>

            </div>

            <div class="form-group mt-4">
                
                <input type="submit" value="Add" class="btn bg-dark text-white">

            </div>

        </form>

    </div>

</div>

{{-- <div class="mt-3">

    <p style="font-size: 20px; padding-left:16%">Click <a href="{{ route('view.import.course') }}">HERE</a> to upload Course Spreadsheet</p>

</div> --}}

@endsection