@extends('layout')

@section('content')
 
<div class="row">

    <div class="col col-md-12 mt-4">

        <h4>Upload Department Spreadsheet</h4>

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

    <div class="col col-md-12 mt-4">

        <form action="{{ route('submit.import.department') }}" method="POST" enctype="multipart/form-data">
            @csrf
                
                <div class="form-group">
        
                    <input type="file" name="department_file" >
        
                    <button type="submit" class="btn btn-success">Import</button>
        
                </div>
        
            </form>

    </div>



</div>


@endsection