@include('bootstrap_sections.headForOtherPage')
        @include('bootstrap_sections.top_bar')
        @include('bootstrap_sections.nav')
        <!-- Shop Detail Start -->
        <div class="container-fluid py-5">
            <div class="row px-xl-5">
                
                <div class="col-lg-5 pb-5">
                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner border">
    <img class="w-100 h-100" src="{{ asset('product/'.$details->image) }}" alt="">
                            
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-7 pb-5">
                    
                    <h3 class="font-weight-semi-bold mb-4">{{ $details->price }}</h3>
                    <p class="mb-4">{{ $details->text }}</p>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        
                        <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                    </div>
                    
                </div>
            </div>
            <!-- Footer End -->
            <!-- Back to Top -->
            <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>
            <!-- Contact Javascript File -->
            <script src="mail/jqBootstrapValidation.min.js"></script>
            <script src="mail/contact.js"></script>
            <!-- Template Javascript -->
            <script src="js/main.js"></script>
        </body>
    </html>