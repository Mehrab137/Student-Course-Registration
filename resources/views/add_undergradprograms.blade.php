@extends('layout')

@section('content')

<div class="row">

    <div class="col-md-12 mt-3">

        <h4>Add Undergraduate Program</h4>

    </div>

    @if(Session::has('alert_msg'))

        <div class="col-md-12">

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ Session::get('alert_msg') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

        </div>

    @endif

    <div class="col-md-12">

        <form method="POST" action="{{route('add.undergrad.submit')}}">

            @csrf

            <div class="form-group mt-3">
                <label class="form-label">Undergraduate Program Name:</label>
                <input type="text" name="UP_name" class="form-control" >
            </div>

            <div class="form-group mt-3">
                <label class="form-label"> Total Credits:</label>
                <input type="text" name="total_credits" class="form-control" >
            </div>

            <div class="form-group mt-3">
                
                <input type="submit" value="Add" class="btn btn-primary">

            </div>

        </form>

    </div>

</div>

@endsection

