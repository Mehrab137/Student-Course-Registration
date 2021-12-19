@extends('layout')

@section('title', 'Add Program')

@section('content')

<style>

    body{

        background-image: linear-gradient(to top, #989898, #b1b1b1, #cacaca, #e4e4e4, #ffffff);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;

    }

</style>

<div class="row">

    <div class="col-md-12 mt-3" style="padding-left: 17%">

        <h4>Add Undergraduate Program</h4>

    </div>

    @if ($errors->any())
        <div class="col-md-10" style="padding-left: 17%">
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

        <div class="col-md-10" style="padding-left: 17%">

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ Session::get('alert_msg') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

        </div>

    @endif

    <div class="col-md-8 mt-3 shadow-lg p-3 mb-5 bg-white rounded bg-transparent" style="margin:0 auto">

        <form method="POST" action="{{route('add.undergrad.submit')}}">

            @csrf

            <div class="form-group">
                <label class="form-label">Undergraduate Program Name:</label>
                <input type="text" name="UP_name" class="form-control shadow-sm p-2 mb-3 bg-white rounded" >
            </div>

            <div class="form-group mt-3">
                <label class="form-label"> Total Credits:</label>
                <input type="text" name="total_credits" class="form-control shadow-sm p-2 mb-5 bg-white rounded" >
            </div>

            <div class="form-group mt-3">
                
                <input type="submit" value="Add" class="btn btn-primary bg-dark text-white">

            </div>

        </form>

    </div>

</div>

@endsection

