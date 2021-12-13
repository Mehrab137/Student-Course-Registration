@extends('layout')

@section('title', 'View Programs')

@section('content')

<div class="row">

    <div class="col-md-12 mt-2 text-center">
        <h4>Undergraduate Programs List</h4>
    </div>

    <div class="col-md-12 mt-3">

        <div class="table-responsive shadow p-3 mb-5 bg-body rounded">

            <table id="undergraduate_program_table" class="table table-bordered table-hover table-striped">
                
                <thead>

                    <tr>
    
                        <th>#</th>
                        <th>Undergraduate Program</th>
                        <th>Total Credit</th>
                        <th>Action</th>
        
                    </tr>

                </thead>
                

                {{-- @foreach ($undergraduateprograms as $undergraduateprogram)

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

                @endforeach --}}
                <tbody>

                </tbody>

            </table>
    
        </div>

    </div>

</div>
                    
 @endsection

 @push('js')

 <script>

    $(document).ready( function () {

        $('#undergraduate_program_table').DataTable({
           
           processing: true,
           serverside: true,
           
           ajax: "{{ route('view.undergrad.list') }}",

           columns: [

            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'UP_name' , name: 'UP_name' },
            { data: 'total_credits' , name: 'total_credits' },
            { data:'action' , name: 'action'},
                    
           ]
        });
    });

 </script>
     
 @endpush