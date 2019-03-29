@extends('layouts.admin')

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
<form action="/citymanager/{{$citymanager->id}}" method='POST'>
@csrf
{{ method_field('PATCH')}}
  <fieldset >
    <div class="form-group">
      <label for="disabledTextInput">Name :</label>
      <input type="text" name="name" id="disabledTextInput" class="form-control" value ="{{$citymanager->name}}">
    </div>
    <div class="form-group">
      <label for="disabledTextInput">Email :</label>
      <input type="email" name="email" id="disabledTextInput" class="form-control" value ="{{$citymanager->email}}">
    </div>
    <div class="form-group">
      <label for="disabledTextInput">Password :</label>
      <input type="password" name="password" id="disabledTextInput" class="form-control" value ="{{$citymanager->password}}">
    </div>
    <div class="form-group">
      <label for="disabledTextInput">National Id:</label>
      <input type="number" name="Nationalid"  class="form-control" value ="{{$citymanager->National_id}}">
    </div>

    <div class="form-group">
    <label for="disabledTextInput"> Gender:</label>
    <select  id="exampleFormControlSelect1" name="gender">
    <option>male</option>
    <option>female</option>
    </select>
    </div>

    <div class="form-group">
    <label for="disabledTextInput"> Choose City:</label>
    <select  id="exampleFormControlSelect1" name="city_id">
    @foreach ($Cities as $City)
    <option value="{{$City->id}}">{{$City->name}}</option>
      @endforeach
    </select>
    </div>

    <div class="form-group">
    <label for="exampleFormControlFile1">Upload Image :</label>
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" >
   </div>
 
    <button type="submit" class="btn btn-success">Edit City Manager</button>
  </fieldset>
</form>

@endsection 