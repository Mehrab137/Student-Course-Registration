@extends('layout')

@section('title', 'View Faculties')

@section('content')
 
<div class="row">

    <div class="col-md-12 mt-3 text-center">
        <h4>Faculty List</h4>
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
                        <th>Faculty Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Department Name</th>
                        <th>Action</th>
        
                    </tr>

                </thead>

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
        
        ajax: "{{ route('view.faculty.list') }}",

        columns: [

            { data: 'DT_RowIndex' , name: 'DT_RowIndex' },
            { data: 'faculty_name' , name: 'faculty_name' },
            { data: 'email_id' , name: 'email_id' },
            { data: 'contact_number' , name: 'contact_number' },
            { data: 'address' , name: 'address' },
            { data: 'department.dept_name' , name: 'department.dept_name'},
            { data: 'action' , name: 'action'},
                    
            ]

         });

        });

    </script>

@endpush