 @extends('layouts.admin')

@section('content') 


   <form action="{{route('coaches.store')}}" method="POST">
       @csrf
       <p>{{$coach->name}}</p>
       <p>{{$coach->gender}}</p>
     
   </form>

 @endsection 