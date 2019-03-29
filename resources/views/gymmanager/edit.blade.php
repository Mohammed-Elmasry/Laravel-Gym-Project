@extends('layouts.admin')

@section('content') 
<br>
<a  class="btn btn-info btn-sm" style="float: right;" href="{{route('gymmanager.index')}}" >Back</a>
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
<form action="/gymmanager/{{$gymmanager->id}}" method='POST'>
@csrf
{{ method_field('PATCH')}}
  <fieldset >
    <div class="form-group">
      <label for="disabledTextInput">Name :</label>
      <input type="text" name="name" id="disabledTextInput" class="form-control" value ="{{$gymmanager->name}}">
    </div>
    <div class="form-group">
      <label for="disabledTextInput">Email :</label>
      <input type="email" name="email" id="disabledTextInput" class="form-control" value ="{{$gymmanager->email}}">
    </div>
    <div class="form-group">
      <label for="disabledTextInput">Password :</label>
      <input type="password" name="password" id="disabledTextInput" class="form-control" value ="{{$gymmanager->password}}">
    </div>
    <div class="form-group">
      <label for="disabledTextInput">National Id:</label>
      <input type="number" name="Nationalid"  class="form-control" value ="{{$gymmanager->National_id}}">
    </div>

    <div class="form-group">
    <label for="disabledTextInput"> Gender:</label>
    <select  id="exampleFormControlSelect1" name="gender">
    <option>male</option>
    <option>female</option>
    </select>
    </div>

    <div class="form-group">
    <label for="disabledTextInput"> Choose Gym:</label>
    <select  id="exampleFormControlSelect1" name="gym_id">
    @foreach ($Gyms as $Gym)
    <option value="{{$Gym->id}}">{{$Gym->name}}</option>
      @endforeach
    </select>
    </div>

    <div class="form-group">
    <label for="exampleFormControlFile1">Upload Image :</label>
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" >
   </div>
 
    <button type="submit" class="btn btn-success">Edit Gym Manager</button>
  </fieldset>
</form>

@endsection 