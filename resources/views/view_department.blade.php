@extends('layout')

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
                    <td>
                        <a href="{{ route('edit.department.view', $department->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('delete.department') }}" method="POST" style="display: inline">
                            @csrf
                            <input type="hidden" name="department_id" value="{{ $department->id }}">

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