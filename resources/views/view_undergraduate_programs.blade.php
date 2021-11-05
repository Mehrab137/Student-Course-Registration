@extends('layout')

@section('content')

<div class="row">

    <div class="col-md-12 mt-2 text-center">
        <h4>Undergraduate Programs List</h4>
    </div>

    <div class="col-md-12 mt-2">

        <div class="table-responsive">

            <table class="table table-bordered table-striped">
    
                <tr>
    
                    <th>#</th>
                    <th>Course Name</th>
                    <th>Course Credit</th>
    
                </tr>

                @foreach ($undergraduateprograms as $undergraduateprogram)

                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $undergraduateprogram->UP_name }}</td>
                    <td>{{ $undergraduateprogram->total_credits }}</td>

                </tr>

                @endforeach

            </table>
    
        </div>

    </div>

</div>
                    
 @endsection