@extends('layouts.admin')

@section('content') 
<br>
<a  class="btn btn-info btn-sm" style="float: right;" href="{{route('gym.index')}}" >Back</a>
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

<form action="/gym/{{ $gym->id }}" method='POST'>
@csrf
{{ method_field('PATCH')}}
  <fieldset >
    <div class="form-group">
      <label for="disabledTextInput">Name :</label>
      <input type="text" name="name" id="disabledTextInput" class="form-control"  value ="{{$gym->name}}">
    </div>

    <div class="form-group">
      <label for="disabledTextInput">Created At:</label>
      <input type="date" name="created_at" id="disabledTextInput" class="form-control"  value ="{{$gym->created_at}}">
      <br>
      <label style="color:red; ">This Gym create at :  {{$gym->created_at}}</label>
    </div>

    <div class="form-group">
    <label for="exampleFormControlFile1">Upload Cover Image :</label>
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" >
   </div>
 
    <button type="submit" class="btn btn-success">Add Gym Manager</button>
  </fieldset>
</form>
@endsection 