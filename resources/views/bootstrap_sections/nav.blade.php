
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            @auth
                            <a href="/" class="nav-item nav-link active">Welcome {{ auth()->user()->name }}</a>
                            
                            <a href="/" class="nav-item nav-link active">Home</a>

                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="{{ url('user/profile') }}" class="dropdown-item">Your account</a>


                                    
                                        
                                        @if(Auth::user()->role_id === 1)
                                    <a href="{{url ('admin/index') }}" class="dropdown-item">Admin panel</a>
                                        @else

                                    @endif

                                    <a href="{{url ('users/logout') }}" class="dropdown-item">logout</a>
                                    <a href="{{ url('users/order') }}" class="dropdown-item">Order</a>
                                </div>
                            </div>
                        </div>
                        
                        @else

                        <a href="/" class="nav-item nav-link active">Home</a>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                        <div class="navbar-nav ml-auto py-0">
                            <a href="{{ url('/login') }}" class="nav-item nav-link">Login</a>
                            <a href="{{ url('/register') }}" class="nav-item nav-link">Register</a>
                        </div>
                        @endauth
                    </div>
                </nav>