@extends('layouts.app')

@section('content') 
<br>
<a  class="btn btn-info btn-sm" style="float: right;" href="{{route('citymanager.index')}}" >Back</a>
<br>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<br>
<form action="{{route('citymanager.store')}}" method='POST'>
@csrf
  <fieldset >
    <div class="form-group">
      <label for="disabledTextInput">Name :</label>
      <input type="text" name="name" id="disabledTextInput" class="form-control" placeholder="Enter your Name">
    </div>
    <div class="form-group">
      <label for="disabledTextInput">Email :</label>
      <input type="email" name="email" id="disabledTextInput" class="form-control" placeholder="Enter your Email">
    </div>
    <div class="form-group">
      <label for="disabledTextInput">Password :</label>
      <input type="password" name="password" id="disabledTextInput" class="form-control" placeholder="Enter your Password">
    </div>
    <div class="form-group">
      <label for="disabledTextInput">National Id:</label>
      <input type="text" name="National_id" id="disabledTextInput" class="form-control" placeholder="Enter your National Id ">
    </div>

    <div class="form-group">
    <label for="disabledTextInput"> Choose City:</label>
    <select  id="exampleFormControlSelect1" name="city_id">
    @foreach ($Cities as $Cities)
    <option value="{{$Cities->id}}">{{$Cities->name}}</option>
      @endforeach
    </select>
    </div>
  
    <div class="form-group">
    <label for="exampleFormControlFile1">Upload Image :</label>
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" >
   </div>
 
    <button type="submit" class="btn btn-success">Add City Manager</button>
  </fieldset>
</form>

@endsection 