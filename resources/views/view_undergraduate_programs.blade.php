@extends('layout')

@section('content')

<div class="row">

    <div class="col-md-12 mt-2 text-center">
        <h4>Undergraduate Programs List</h4>
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
                    <th>Course Name</th>
                    <th>Course Credit</th>
                    <th>Action</th>
    
                </tr>

                @foreach ($undergraduateprograms as $undergraduateprogram)

                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $undergraduateprogram->UP_name }}</td>
                    <td>{{ $undergraduateprogram->total_credits }}</td>
                    <td>
                        <a href="{{ route('edit.undergrad.view', $undergraduateprogram->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        
                        <form action="{{ route('delete.undergrad')}}" method="POST" style="display:inline">

                            @csrf
                            <input type="hidden" name="undergrad_id" value="{{ $undergraduateprogram->id }}">

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