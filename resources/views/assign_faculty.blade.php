@extends('layout')

@section('title', 'Assign Faculty')

@section('content')

<div class="row">

    <div class="col-md-12 mt-3" style="padding-left: 17%">

        <h4>Assign Faculties</h4>

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

    <div class="col-md-8 mt-2 shadow-sm p-3 mb-5 bg-body rounded" style="margin:0 auto">

        <form method="POST" action="{{ route('assign.faculty.submit') }}">

            @csrf

            <div class="form-group">

                <label class="form-label">Department:</label>
        
                <select name="department_id" class="form-control" id="dept_id">
        
                    <option value="" selected disabled>Select Department</option>
        
                    @foreach ($departments as $department)
                        
                        <option value="{{ $department->id }}" >{{ $department->dept_name }}</option>
        
                    @endforeach
        
                </select>
        
            </div>
        
            <div class="form-group mt-3">
        
                <label class="form-label">Faculty:</label>
        
                <select name="faculty_id" class="form-select" id="faculty_id">
        
                    <option value="" selected disabled>Select Faculty</option>
        
                </select>
        
            </div>
        
            <div class="form-group mt-2">
        
                <label class="form-label">Course:</label>
        
                <select name="course_id" class="form-select" id="crs_id">
        
                    <option value="" selected disabled>Select Course</option>
        
                </select>
        
            </div>
        
            <div class="form-group mt-2">
        
                <label class="form-label">Section:</label>
        
                <select name="section_id" class="form-select" id="section_id">
        
                    <option value="" selected disabled>Select Section</option>
        
                </select>
        
            </div>
        
            <div class="form-group mt-4">
                
                <input type="submit" value="Assign" class="btn btn-primary bg-dark text-white">

            </div>

        </form>

    </div>

</div>

@endsection

@push('js')
    <script>

        $(document).ready(function(){

            $('#dept_id').on('change', function(){

                var department_id = this.value;
                $('#crs_id').html('');

                $.ajax({

                    url: "{{ route('find.course') }}",
                    type: 'POST',
                    data: {

                        department_id: department_id,
                        _token: '{{ csrf_token() }}',

                    },
                    dataType: 'json',
                    success: function(result){

                        $('#crs_id').html('<option value="">Select Course</option>');
                        
                        $.each(result, function(key, value){

                            $('#crs_id').append('<option value="'+ value.id +'">'+ value.course_name +'</option>');
                            
                        });

                    }

                })

            })

        })

        $(document).ready(function(){

            $('#dept_id').on('change', function(){

                var department_id = this.value;
                $('#faculty_id').html('');

                $.ajax({

                    url: "{{ route('find.faculty') }}",
                    type: 'POST',
                    data: {

                        department_id: department_id,
                        _token: '{{ csrf_token() }}',

                    },
                    dataType: 'json',
                    success: function(result){

                        $('#faculty_id').html('<option value="">Select Faculty</option>');

                        $.each(result, function(key, value){

                            $('#faculty_id').append('<option value="'+ value.id +'">'+ value.faculty_name +'</option>');

                        });

                    }

                })

            })
       
        })

        $(document).ready(function(){

            $('#crs_id').on('change', function(){

                var course_id = this.value;
                $('#section_id').html('');

                $.ajax({

                    url: "{{ route('find.section') }}",
                    type: 'POST',
                    data: {

                        course_id: course_id,
                        _token: '{{ csrf_token() }}', 

                    },
                    dataType: 'json',
                    success: function(result){

                        $('#section_id').html('<option value="">Select Section</option>');

                        $.each(result, function(key, value){

                            $('#section_id').append('<option value="'+ value.id +'">'+ value.section_name +'</option>');

                        })                        

                    }

                })

            })

        })

    </script>
@endpush