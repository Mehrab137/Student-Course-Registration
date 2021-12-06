@extends('layout')

@section('content')

    <div class="form-group mt-3">

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

        <select class="form-select" id="faculty_id">

            <option value="" selected disabled>Select Faculty</option>

        </select>

    </div>

    <div class="form-group mt-2">

        <label class="form-label">Course:</label>

        <select class="form-select" id="course_id">

            <option value="" selected disabled>Select Course</option>

        </select>

    </div>

    <div class="form-group mt-3">

        <label class="form-label">Section:</label>

        <select name="section_id" class="form-select" id="section_id">

            <option value="" selected disabled>Select Section</option>

        </select>

    </div>

@endsection

@push('js')
    <script>

        $(document).ready(function(){

            $('#dept_id').on('change', function(){

                var department_id = this.value;
                $('#course_id').html('');
                $('#faculty_id').html('');

                $.ajax({

                    url: "{{ route('assign.faculty.submit') }}",
                    type: 'POST',
                    data: {

                        department_id: department_id,
                        _token: '{{ csrf_token() }}',

                    },
                    dataType: 'json',
                    success: function(result){

                        $('#course_id').html('<option value="">Select Course</option>');
                        
                        $.each(result, function(key, value){

                            $('#course_id').append('<option value="'+ value.id +'">'+ value.course_name +'</option>');
                            

                        });

                        $('#faculty_id').html('<option value="">Select Faculty</option>');

                        $.each(result, function(key, value){

                            $('#faculty_id').append('<option value="'+ value.id +'">'+ value.faculty_name +'</option>');

                        });

                    }

                })

            })

        })

    </script>
@endpush