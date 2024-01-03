@extends('admin.bootstrap_sections.head')
@section('title','Admin Dashboard')
@section('links')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>

@endsection

@include('admin.bootstrap_sections.top_container')
@include('admin.bootstrap_sections.sidebar')
@include('admin.bootstrap_sections.dashboard')



 <div class="container">
  <form method="post" action="{{ url('/users/role') }}">
  @csrf
  <input type="text" name="role_name" placeholder="New role">
  <input type="submit" value="ADD">
</form>
  <h2>Listing all role</h2>
              
  <table class="table">
    <thead>
      <tr>
        <th>Role name</th>
        <th>Actions</th>

      </tr>
    </thead>
    <tbody>
      @foreach($role as $roles)
      <tr>
        <td>{{ $roles->role_name }}</td>
        <td>
          <a href="edit_role/{{ $roles->id }}"><span class="glyphicon glyphicon-pencil"></span></a> | 
          <a href="role/{{ $roles->id }}"><span class="glyphicon glyphicon-remove"></span></a>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>




  




  
@include('admin.bootstrap_sections.footer')
