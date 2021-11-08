@extends('layout')

@section('content')

 <br>
<h2>Fill up the field below</h2><br>

<form action="{{route('add.dept.submit')}}" method="POST" autocomplete="off">
    @csrf

    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Name of the Department</label>
        <input type="text" name="dept_name" class="form-control" >
     </div>

    <button type="submit" class="btn btn-primary">Add</button>
</form>

@endsection