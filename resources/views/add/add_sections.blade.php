@extends('layout')

@section('title', 'Add Section')

@section('content')


<div class="row">

    <div class="col-md-12 mt-2" style="padding-left: 17%">

        <h4>Add Sections</h4>

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

        <form method="POST" action="{{ route('add.section.submit') }}">

            @csrf

            <div class="form-group">
                <label class="form-label">Section Name:</label>
                <input type="text" name="section_name" class="form-control"  value="{{ old('section_name') }}">
            </div>

            <div class="form-group mt-2">
                <label class="form-label">Start time:</label>
                <input type="time" name="start_time" class="form-control" value="{{ old('start_time') }}">
            </div>

            <div class="form-group mt-2">
                <label class="form-label">End time:</label>
                <input type="time" name="end_time" class="form-control" value="{{ old('end_time') }}">
            </div>

            <div class="form-group mt-2">
                <label class="form-label">Days:</label>
                <input type="text" name="days" class="form-control" placeholder="e.g. Sunday,Thursday" value="{{ old('days') }}">
            </div>

            <div class="form-group mt-2">
                <label class="form-label">Total Seats:</label>
                <input type="number" name="total_seats" class="form-control" value="{{ old('total_seats') }}">
            </div>

            <div class="form-group mt-2">

                <label class="form-label">Course:</label>

                <select name="course_id" class="form-select">

                    <option value="" selected disabled>Select Course</option>

                    @foreach ($courses as $course)
                        
                        <option value="{{ $course->id }}"{{ old('course_id') == $course->id ? "selected" : "" }}>{{ $course->course_name }}</option>

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

