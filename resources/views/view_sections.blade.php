@extends('layout')

@section('content')

<div class="row">

    <div class="col-md-12 mt-2 text-center">
        <h4>Section List</h4>
    </div>

    @if(Session::has('alert_msg'))

        <div class="col-md-12">

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ Session::get('alert_msg') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

        </div>

    @endif

    <div class="col-md-12 mt-3">

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
                    <td>
                        @php
                            $time=date_create($section->start_time);
                            echo date_format($time,"h:i A");
                        @endphp
                    </td>
                    <td>
                        {{ date_format(date_create($section->end_time), "h:i A") }}
                    </td>
                    <td>{{ $section->days }}</td>
                    <td>{{ $section->total_seats }}</td>
                    <td>{{ $section->course->course_name }}</td>
                    <td>
                        <a href="{{ route('edit.section.view', $section->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    
                        <form action="{{ route('delete.section') }}" method="POST" style="display: inline">
                            @csrf

                            <input type="hidden" name="section_id" value="{{ $section->id }}">

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