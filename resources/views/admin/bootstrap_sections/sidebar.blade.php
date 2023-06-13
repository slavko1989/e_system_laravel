<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      @auth
      <img style="width: 80px;border-radius: 8px;" src="{{ asset('users_img/'.auth()->user()->profile) }}" alt="">    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome,  <strong>{{ auth()->user()->name }}</strong></span><br>
    <a href="{{url ('users/logout') }}" class="nav-item nav-link active">logout</a></b>
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
    
    <a href="/categorys/create" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>Category</a>
    <a href="/brands/create" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>Brand</a>
    <a href="/genders/create" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>Gender</a>
    <a href="/orders/create" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Orders</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
    <a href="/products/create" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  Products</a>
    <br><br>
  </div>
</nav>