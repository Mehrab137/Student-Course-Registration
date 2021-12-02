@extends('layout')

@section('content')
 
<div class="row">

    <div class="col-md-12 mt-3 text-center">
        <h4>Course List</h4>
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

        <div class="table-responsive shadow p-3 mb-5 bg-body rounded">

            <table id="course_table" class="table table-bordered table-striped">
    
                <thead>

                    <tr>
    
                        <th>#</th>
                        <th>Course Name</th>
                        <th>Course Credit</th>
                        <th>Department Name</th>
                        <th>Action</th>
        
                    </tr>

                </thead>
                
    
                {{-- @foreach ($courses as $course)
                    
                    MANUAL WAY

                    @php
                        $department = App\Models\Department::find($course->department_id);
                    @endphp

                    <tr>
    
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->course_credit }}</td>
                        <td>{{ $course->department->dept_name }}</td>
                        <td>
                            <a href="{{ route('edit.course.view', $course->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form method="POST" action="{{ route('delete.course') }}" style="display: inline;">

                                @csrf
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <button class="btn btn-sm btn-danger">Delete</button>
                            
                            </form>

                        </td>

                        MANUAL WAY
                        <td>{{ $department->dept_name }}</td>
                        
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

        $('#course_table').DataTable({
        
        processing: true,
        serverside: true,
        
        ajax: "{{ route('view.course.list') }}",

        columns: [

            { data: 'DT_RowIndex' , name: 'DT_RowIndex' },
            { data: 'course_name' , name: 'course_name' },
            { data: 'course_credit' , name: 'course_credit' },
            { data: 'department.dept_name' , name: 'department.dept_name'},
            { data: 'action' , name: 'action'},
                    
            ]

         });

        });

    </script>

@endpush