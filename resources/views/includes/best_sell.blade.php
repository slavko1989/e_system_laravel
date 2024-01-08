<div class="text-center mb-4">
    <h2 class="section-title px-5"><span class="px-2">Best Selling Products</span></h2>

    <div class="row px-xl-5 pb-3"  style="width: 100%;height: auto;">
        @foreach($best_selling as $best)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card">
                <img class="card-img-top" src="{{ asset('product/'.$best->product->image) }}" alt=""  style="width: 200px;height: 200px;">
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3" >
                    <h6 class="text-truncate mb-3">{{ $best->product->title }}<br> On stock: <span style="font-weight: bolder;">{{ $best->product->quantity }}</span></h6>
                    <div class="d-flex justify-content-center">
                        @if(!empty($best->product->new_price) && $best->product->new_price < $best->product->price)
                        <h6><del>{{ $best->product->price }}$</del></h6><h6 class="text-muted ml-2">{{ $best->product->new_price }}$</h6>
                        @elseif(!empty($best->product->price))
                        <h6>{{ $best->product->price }}$</h6>
                        @elseif(!empty($best->product->new_price))
                        <h6>{{ $best->product->new_price }}$</h6>
                        @endif
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{ url('home/details/'. $product->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a><br>

        </div>
            </div>
        </div>
        @endforeach
    </div>

</div>