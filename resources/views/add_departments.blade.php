@extends('layout')

@section('content')

<div class="row">

    <div class="col-md-12 mt-3" style="padding-left: 17%">

        <h4>Add Departments</h4>

    </div>

    @if ($errors->any())
        <div class="col-md-12 mt-2">
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

        <div class="col-md-12">

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ Session::get('alert_msg') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

        </div>

    @endif

    <div class="col-md-8 mt-4 shadow-sm p-3 mb-5 bg-body rounded" style="margin:0 auto">

        <form method="POST" action="{{route('add.dept.submit')}}">

            @csrf

            <div class="form-group mt-2">
                <label class="form-label">Department Name:</label>
                <input type="text" name="dept_name" class="form-control" >
            </div>

            <div class="form-group mt-3">
                
                <input type="submit" value="Add" class="btn btn-primary bg-dark text-white">

            </div>

        </form>

    </div>

</div>

<div class="mt-3">

    <p style="padding-left:16%;font-size:20px">Click <a href="{{ route('view.import.department') }}">HERE</a> to Upload Department Spreadsheet</p>

</div>

@endsection