@extends('layout')

@section('content')

<div class="row">

    <div class="col-md-12 mt-2 text-center">
        <h4>Department List</h4>
    </div>

    <div class="col-md-12 mt-2">

        <div class="table-responsive">

            <table class="table table-bordered table-striped">
    
                <tr>
    
                    <th>#</th>
                    <th>Department Name</th>
                    <th>Action</th>
    
                </tr>

                @foreach ($departments as $department)

                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $department->dept_name }}</td>
                    <td><a href="{{ route('edit.department.view', $department->id) }}" class="btn btn-sm btn-warning">Edit</a></td>

                </tr>

                @endforeach

            </table>
    
        </div>

    </div>

</div>

@endsection