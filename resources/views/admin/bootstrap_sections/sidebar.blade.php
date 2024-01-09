<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      @auth
      <img style="width: 80px;border-radius: 8px;" src="{{ auth()->user()->profile_photo_url }}" alt="">    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome,  <strong>{{ ucfirst(auth()->user()->name) }}</strong></span><br>
    <a href="{{url ('logout') }}" class="nav-item nav-link active">logout</a></b>
    </h5>
    @else
        <h5><b><i class="fa fa-dashboard"></i>You dont have permissions</h5>
    @endauth

    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5><a href="{{ url('admin/index') }}">Dashboard</a></h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="/categorys/create" class="w3-bar-item w3-button w3-padding"><span class="glyphicon glyphicon-list-alt"></span> Category</a>
    <a href="/brands/create" class="w3-bar-item w3-button w3-padding"><span class="glyphicon glyphicon-list-alt"></span> Brand</a>
    <a href="/genders/create" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i></i>Gender</a>
    <a href="/orders/all_orders" class="w3-bar-item w3-button w3-padding"><span class="glyphicon glyphicon-shopping-cart"></span> Orders</a>
    <a href="/users/all_users" class="w3-bar-item w3-button w3-padding"><span class="glyphicon glyphicon-user"></span> Users</a>
    <a href="/products/create" class="w3-bar-item w3-button w3-padding"><i class="fa fa-leanpub"></i> Products</a>
    <a href="/products/create" class="w3-bar-item w3-button w3-padding"><span class="glyphicon glyphicon-envelope"></span> Notifications</a>
    <a href="/users/role" class="w3-bar-item w3-button w3-padding"><span class="glyphicon glyphicon-user"></span> Role Users</a> 
    <a href="/subs/subs" class="w3-bar-item w3-button w3-padding"><span class="glyphicon glyphicon-user"></span> Subscribers</a>
    <a href="/users/comments" class="w3-bar-item w3-button w3-padding"><span class="glyphicon glyphicon-user"></span> Comments</a>
    <br><br>
  </div>
</nav>