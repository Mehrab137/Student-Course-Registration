@extends('layout')

@section('title', 'Faculty Schedule')

@section('content')
    
<div class="row">

    <div class="col-md-12 mt-3">

        <h4>Sunday</h4>
        <div class="col-md-12">

            <ul>
                @foreach ($faculty as $fac)
                   
                <li>
                    {{ $fac->department->dept_name }} - {{ $fac->course_id }} - a - {{ $fac->section_id }}) - <strong>{{ $fac->faculty_name }}</strong>
                </li>

                @endforeach
            </ul>

        </div>

        <h4>Monday</h4>
        <div class="col-md-12">

            <ul>
                
                <li>
                    Course Name - Section - (Start time - End time) - Faculty
                </li>

            </ul>

        </div>

        <h4>Tuesday</h4>
        <div class="col-md-12">

            <ul>
                <li>
                    Course Name - Section - (Start time - End time) - Faculty
                </li>
            </ul>

        </div>

        <h4>Wednesday</h4>
        <div class="col-md-12">

            <ul>
                <li>
                    Course Name - Section - (Start time - End time) - Faculty
                </li>
            </ul>

        </div>

        <h4>Thursday</h4>
        <div class="col-md-12">

            <ul>
                <li>
                    Course Name - Section - (Start time - End time) - Faculty
                </li>
            </ul>

        </div>

    </div>

</div>

@endsection