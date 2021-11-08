@extends('layout')

@section('content')

 <br>
<h2>Edit Department</h2><br>

@if(Session::has('alert_msg'))

        <div class="col-md-12">

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ Session::get('alert_msg') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

        </div>

    @endif

<form action="{{ route('edit.department.submit', $department->id) }}" method="POST" autocomplete="off">
    @csrf

    <div class="mb-3">
        <label class="form-label">Department Name:</label>
        <input type="text" name="dept_name" value="{{ $department->dept_name }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Confirm</button>
</form>

@endsection