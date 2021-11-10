@extends('layout')

@section('content')

 <br>
<h3>Add Undergraduate Program</h3><br>

<form action="{{route('add.undergrad.submit')}}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Name of the Program</label>
        <input type="text" name="UP_name" class="form-control" >
     </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Total Credits</label>
        <input type="number" name="total_credits" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>

@endsection