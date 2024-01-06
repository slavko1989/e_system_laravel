@props(['catDetails'])

    @foreach($catDetails->product as $product)
    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="card product-item border-0 mb-4 h-100"> <!-- Dodajemo h-100 kako bi svi bili iste visine -->
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                <img class="card-img-top img-fluid w-100" src="{{ asset('product/'.$product->image) }}" alt="">
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                <h6 class="text-truncate mb-3">{{ $product->title }}</h6>
                <div class="d-flex justify-content-center">
                    @if(!empty($product->new_price) && $product->new_price < $product->price)
                        <h6><del>{{ $product->price }}$</del></h6><h6 class="text-muted ml-2">{{ $product->new_price }}$</h6>
                        @elseif(!empty($product->price))
                        <h6>{{ $product->price }}$</h6>
                        @elseif(!empty($product->new_price))
                        <h6>{{ $product->new_price }}$</h6>
                        @endif
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
                <a href="{{ url('home/details/'. $product->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a><br>
                <form method="post" action="{{ url('users/cart',$product->id) }}">
                    @csrf
                    <input type="hidden" name="user_id">
                    <input type="hidden" name="product_id">
                    <input type="number" min="1" value="1" name="quantity" style="width: 80px;">
                    <input type="submit" name="submit" value="Add to cart" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
