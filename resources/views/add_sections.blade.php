@extends('layout')

@section('content')


<div class="row">

    <div class="col-md-12 mt-2">

        <h4>Add Sections</h4>

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

        <form method="POST" action="{{ route('add.section.submit') }}">

            @csrf

            <div class="form-group mt-2">
                <label class="form-label">Section Name:</label>
                <input type="text" name="section_name" class="form-control" >
            </div>

            <div class="form-group mt-2">
                <label class="form-label">Start time:</label>
                <input type="time" name="start_time" class="form-control" >
            </div>

            <div class="form-group mt-2">
                <label class="form-label">End time:</label>
                <input type="time" name="end_time" class="form-control" >
            </div>

            <div class="form-group mt-2">
                <label class="form-label">Days:</label>
                <input type="text" name="days" class="form-control" >
            </div>

            <div class="form-group mt-2">
                <label class="form-label">Total Seats:</label>
                <input type="number" name="total_seats" class="form-control" >
            </div>

            <div class="form-group mt-2">

                <label class="form-label">Course:</label>

                <select name="course_id" class="form-select">

                    <option value="" selected disabled>Select Course</option>

                    @foreach ($courses as $course)
                        
                        <option value="{{ $course->id }}">{{ $course->course_name }}</option>

                    @endforeach

                </select>

            </div>

            <div class="form-group mt-3">
                
                <input type="submit" value="Add" class="btn btn-primary">

            </div>

        </form>

    </div>

</div>


@endsection

