@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<form method="post" action="{{ url('users/order')}}">
    @csrf
    <div class="form-group">
        <label for="name">Country</label>
        <input type="text" name="country"  class="form-control" placeholder="Country">
    </div>
    <div class="form-group">
        <label for="name">City</label>
        <input type="text" name="city" placeholder="City" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Street</label>
        <input type="text" name="street" placeholder="Street" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Delivery options</label>
        <select name="delivery_status" class="form-control">
            <option>Choose delivery options</option>
            <option>Courier service</option>
            <option>Person pickup</option>
        </select>
    </div>
    <div class="form-group">
        <label for="name">Payment options</label>
        <select name="payment_status" class="form-control">
            <option>Payment options</option>
            <option>Pay on delivery</option>
            <option>Paypall</option>
            <option>Master card</option>
        </select>
    </div>
    <input type="hidden" name="status" value="0">
    <input type="hidden" name="user_id">
    <input type="hidden" name="order_qty">
    <input type="hidden" name="product_id" >
    <input type="hidden" name="cart_id" >
    <input type="submit" name="submit" value="Confirm order"
    class=
    "btn btn-block btn-primary my-3 py-3">
</form>

</div>
</div>
</div>
</div>
</div>
<!-- Cart End -->