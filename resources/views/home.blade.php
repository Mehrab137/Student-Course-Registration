@extends('layout')

@section('content')
  
<style>
  
    body{

        background: #283048;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to bottom, #859398, #283048);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to bottom, #859398, #283048); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
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
