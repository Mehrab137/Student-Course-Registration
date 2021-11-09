@extends('layout')

@section('content')

<div class="row">

    <div class="col-md-12 mt-3">

        <h4>Edit Courses</h4>

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

        <form method="POST" action="{{ route('edit.course.submit', $course->id) }}">

            @csrf

            <div class="form-group mt-3">
                <label class="form-label">Course Name:</label>
                <input type="text" name="course_name" value="{{ $course->course_name }}" class="form-control" >
            </div>

            <div class="form-group mt-3">
                <label class="form-label">Credits:</label>
                <input type="text" name="course_credit" value="{{ $course->course_credit }}" class="form-control" >
            </div>

            <div class="form-group mt-3">

                <label class="form-label">Department:</label>

                <select name="department_id" class="form-select">

                    <option value="" selected disabled>Select Department</option>

                    @foreach ($departments as $department)
                        
                        <option value="{{ $department->id }}" {{ $department->id == $course->department->id ? "selected" : "" }} >{{ $department->dept_name }}</option>

                    @endforeach

                </select>

            </div>

            <div class="form-group mt-3">
                
                <input type="submit" value="Confirm" class="btn btn-primary">

            </div>

        </form>

    </div>

</div>

@endsection