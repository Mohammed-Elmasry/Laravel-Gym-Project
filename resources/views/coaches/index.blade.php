
<!-- <a href="" class="btn btn-success">Create Post</a> -->
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Gender</th>
    </tr>
  </thead>
  <tbody>
    @foreach($coaches as $coach)
    <tr>
      <th scope="row">{{$coach->id}}</th>
      <td>{{$coach->name}}</td>
      <td>{{$coach->gender}}</td>

      
  
    </tr>
    @endforeach

  </tbody>
</table>
