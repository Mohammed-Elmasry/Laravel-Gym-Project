@extends('layouts.master')

@section('content') 
<br>
<a class="btn btn-info" href="{{route('citymanager.create')}}">Add New City Manger</a>
<br><br>
         <div class="container" style="width:100%">
            <table class="table table-bordered" id="table" >
               <thead>
                  <tr>
                     <th>Name</th>
                     <th>Email</th>
                     <th>National Id</th>
                     <th>Gender</th>
                     <th>Actions</th>
                     <th>ban/revoke</th>
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
               ajax: 'http://127.0.0.1:8000/citymanager/get_citymanagerdata',         
               columns: [
                        { data: 'name', name: 'name' }, 
                        { data: 'email', name: 'email' },  
                        { data: 'National_id', name: 'National_id' },   
                        { data: 'gender', name: 'gender' },                       
                        { data: "actions",
                            "render": function(data, type, row) {
                            return '<a  href="citymanager/'+row.id+'/edit" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>    <form method="POST" action="citymanager/'+row.id+'">@csrf   {{ method_field('DELETE')}}<button type="submit" onclick="return myFunction();" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></button></form>'                                
                               ;}     
                        },
                        { data: "ban/revoke",
                            "render": function(data, type, row) {
                            return '<a  href="#" class="btn btn-warning btn-sm">Ban</a> '                                
                               ;}     
                        }
                     ]
                  });
              });
                     //confirm deleting 
                     function myFunction(){
                     var agree = confirm("Are you sure you want to delete this City manager?");
                        if(agree == true){
                           return true
                           }
                           else{
                           return false;
                           }
                     }

         </script>


@endsection 