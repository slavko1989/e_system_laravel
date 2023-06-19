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

<table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Products</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Price</th>
                            <th>Payment</th>
                            <th>Delivery</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach($order as $orders)

                        <tr>

                            <td>1</td>
                            <td>{{ $orders->title }}</td>
                            <td>{{ $orders->name }}</td>
                            <td>{{ $orders->quantity }}</td>
                            
                  </tr>
                     @endforeach
                    </tbody>
                </table>
             

</div>


@include('admin.bootstrap_sections.footer')
