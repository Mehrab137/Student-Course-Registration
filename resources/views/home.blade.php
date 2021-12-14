@extends('layout')

@section('title', 'Home')

@section('content')
  
<style>
  
    body{

        background-image: linear-gradient(to bottom, #192025, #2e3538, #464b4d, #5f6263, #797a7a);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;

    }

    #h1{

        /* border: 1px solid; */
        border-radius: 10px;
        padding: 10px;
        box-shadow: 0px 5px 70px whitesmoke;
        margin: 0 auto;
        
    }

</style>
<div class="row mt-4">

    <div class="col-md-7 mt-5 text-center" id="h1">

        <h1 style="color:rgb(250, 240, 240)">ᴡᴇʟᴄᴏᴍᴇ <b style="color:whitesmoke"><i>{{ auth()->user()->name }}!</i></b></h1>
    </div>
    <div class="col-md-12 mt-5 text-center">

        <p style="font-size: 22px; color:gainsboro">Here you can <b>ADD</b>, <b>EDIT</b> or <b>DELETE</b>
            data <br> by selecting the <b>Dropdowns</b> in the Navigation Bar</p> 

    </div>
        
</div>

@endsection
