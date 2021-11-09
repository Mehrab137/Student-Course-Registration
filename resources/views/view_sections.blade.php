@extends('layout')

@section('content')

<div class="row">

    <div class="col-md-12 mt-2 text-center">
        <h4>Section List</h4>
    </div>

    <div class="col-md-12 mt-2">

        <div class="table-responsive">

            <table class="table table-bordered table-striped">
    
                <tr>
    
                    <th>#</th>
                    <th>Section Name</th>
                    <th>Starting Time</th>
                    <th>Ending Time</th>
                    <th>Days</th>
                    <th>Total Seats</th>
                    <th>Course Name</th>
                    <th>Action</th>
    
                </tr>

                @foreach ($sections as $section)

                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $section->section_name }}</td>
                    <td>{{ $section->start_time }}</td>
                    <td>{{ $section->end_time }}</td>
                    <td>{{ $section->days }}</td>
                    <td>{{ $section->total_seats }}</td>
                    <td>{{ $section->course->course_name}}</td>
                    <td><a href="{{ route('edit.section.view', $section->id) }}" class="btn btn-sm btn-warning">Edit</a></td>

                </tr>

                @endforeach

            </table>
    
        </div>

    </div>

</div>
                    
 @endsection