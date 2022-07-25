<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            <ul class="list-unstyled">
                <li>{{ session('success') }}</li>
            </ul>
        </div>
    @endif

</div>
                    
<form action="{{ url('/coupon_apply') }}" method="post">
    @csrf
    <input type="hidden" name="token" value="{{$token}}">

    <div class="form-check">
        <input class="form-check-input" type="radio" name="product" value="product_a-10">
        <label class="form-check-label" for="flexRadioDefault1">
            Product A ($10)
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="product" value="product_b-99"  checked>
        <label class="form-check-label" for="flexRadioDefault2">
                Product B ($99)
        </label>
    </div>

    <input type="submit" class="btn-primary" name="submit" value="Purchase">
</form>