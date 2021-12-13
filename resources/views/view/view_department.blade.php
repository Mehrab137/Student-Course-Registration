@extends('layout')

@section('title', 'View Departments')

@section('content')

<div class="row">

    <div class="col-md-12 mt-2 text-center">
        <h4>Department List</h4>
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

            <table id="department_table" class="table table-bordered table-striped">
                
                <thead>

                    <tr>
    
                        <th>#</th>
                        <th>Department Name</th>
                        <th>Action</th>
        
                    </tr>

                </thead>

                

                {{-- @foreach ($departments as $department)

                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $department->dept_name }}</td>
                    <td>
                        <a href="{{ route('edit.department.view', $department->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('delete.department') }}" method="POST" style="display: inline">
                            @csrf
                            <input type="hidden" name="department_id" value="{{ $department->id }}">

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

$('#department_table').DataTable({
   
   processing: true,
   serverside: true,
   
   ajax: "{{ route('view.department.list') }}",

   columns: [

    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
    { data: 'dept_name' , name: 'dept_name' },
    { data:'action' , name: 'action'},
            
   ]
});
});


</script>
    
@endpush