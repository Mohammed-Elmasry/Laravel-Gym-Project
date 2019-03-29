@extends('layouts.app')


@if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif
 
 
   <form action="{{route('coaches.store')}}" method="POST">
       @csrf
       <div class="form-group">
           <label for="exampleInputEmail1">Name</label>
           <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
       </div>
       <div class="form-group">
           <label for="exampleInputPassword1">Gender</label>
           <textarea name="gender" class="form-control"></textarea>
       </div>

   <button type="submit" class="btn btn-primary">Submit</button>
   </form>


