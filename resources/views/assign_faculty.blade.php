@extends('layout')

@section('content')

    <div class="form-group mt-3">

        <label class="form-label">Department:</label>

        <select name="department_id" class="form-select">

            <option value="" selected disabled>Select Department</option>

            @foreach ($departments as $department)
                
                <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? "selected" : "" }}>{{ $department->dept_name }}</option>

            @endforeach

        </select>

    </div>

    <div class="form-group mt-3">

        <label class="form-label">Faculty:</label>

        <select name="faculty_id" class="form-select" id="faculty">

            <option value="" selected disabled>Select Faculty</option>

        </select>

    </div>

    <div class="form-group mt-2">

        <label class="form-label">Course:</label>

        <select name="course_id" class="form-select" id="course">

            <option value="" selected disabled>Select Course</option>

        </select>

    </div>

    <div class="form-group mt-3">

        <label class="form-label">Section:</label>

        <select name="section_id" class="form-select" id="section">

            <option value="" selected disabled>Select Section</option>

        </select>

    </div>

@endsection

@push('js')
    
@endpush