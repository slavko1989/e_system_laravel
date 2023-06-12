<!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Seacrh by categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Categories <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                @foreach($cats as $category)
                                <a href="{{ url('home/show_by_cat/'.$category->id) }}" class="dropdown-item">{{ $category->cat_name }}</a>
                                @endforeach
                                
                            </div>
                        </div>
                         <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Brands <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                @foreach($brands as $brand)
                                <a href="{{ url('home/show_by_brands/'.$brand->id) }}" class="dropdown-item">{{ $brand->brand_name }}</a>
                                @endforeach                                
                            </div>
                        </div>
                         <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Genders <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                @foreach($genders as $gender)
                                <a href="{{ url('home/show_by_genders/'.$gender->id) }}" class="dropdown-item">{{ $gender->gender_name }}</a>
                                @endforeach
                               
                            </div>
                        </div>
                      
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">