@extends('layouts.master')

@section('content') 
 
<a class="btn btn-info" href="{{route('gym.create')}}">Create New Gym </a> 
<br><br>
         <div class="container" style="width:100%">
            <table class="table table-bordered" id="table" >
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Created At</th>
                     <th>Actions</th>
                  </tr>
               </thead>
            </table>
         </div>
       <script>
         $(document).ready( function () {
               $('#table').DataTable({
               processing: true,
               serverSide: true, 
               deferRender: true,  
               ajax: 'http://127.0.0.1:8000/gym/get_gymdata',         
               columns: [
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'created_at', name: 'created_at' }, 
                                           
                        { data: "actions",
                            "render": function(data, type, row) {
                        return '<a  href="gym/'+row.id+'/edit" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>    <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>'
                               ;}
            }
                     ]
     
       
            });
         });
         </script>
 

@endsection 