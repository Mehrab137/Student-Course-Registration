@extends('layout')

@section('title', 'View Sections')

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

    <div class="col-md-12 mt-2">

        <a href="{{ route('export.section.excel') }}" class="btn btn-sm btn-success">Export as Spreadsheet</a>

        <div class="table-responsive mt-3 shadow p-3 mb-5 bg-body rounded">

            <table id="section_table" class="table table-bordered table-striped">
    
                <thead>

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

                </thead>

                {{-- @foreach ($sections as $section)

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

        $('#section_table').DataTable({

        processing: true,
        serverside: true,

        ajax: "{{ route('view.section.list') }}",

        columns: [

            { data: 'DT_RowIndex' , name: 'DT_RowIndex' },
            { data: 'section_name' , name: 'section_name' },
            { data: 'start_time' , name: 'start_time' },
            { data: 'end_time' , name: 'end_time'},
            { data: 'days' , name: 'days'},
            { data: 'total_seats' , name: 'total_seats'},
            { data: 'course.course_name' , name: 'course.course_name'},
            { data: 'action' , name: 'action'},
                    
            ]

        });

        });

    </script>

@endpush