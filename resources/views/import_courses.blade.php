@extends('layout')

@section('content')

<div class="row">

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

    <div class="col-md-6 mt-5 shadow p-3 mb-5 bg-body rounded" style="margin: 0 auto;">

        <div class="card">

            <div class="card-header" style="font-size: 20px">

              Upload Course Spreadsheet

            </div>

            <div class="card-body mt-2">

                <form action="{{ route('submit.import.course') }}" method="POST" enctype="multipart/form-data">
                    @csrf
        
                    <input type="file" name="course_file">

                    <div class="mt-3">

                        <button type="submit" class="btn btn-sm btn-success">Import</button>

                    </div>
        
                </form>

            </div>

        </div>

    </div>
    
</div>

@endsection