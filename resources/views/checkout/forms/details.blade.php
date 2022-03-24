@php
$cartProducts = Cart::content();

$countries = array("Morocco", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan");
$cities = array("Casablanca" , "Rabat"  , "Tanger" , "Fes" ,"Aarach");

@endphp
<section class="col-lg-8">
    <!-- Steps-->
    <div class="steps steps-light pt-2 pb-3 mb-5"><a class="step-item active" href="shop-cart.html">
            <div class="step-progress"><span class="step-count">1</span></div>
            <div class="step-label"><i class="ci-cart"></i>Cart</div>
        </a><a class="step-item active current" href="checkout-details.html">
            <div class="step-progress"><span class="step-count">2</span></div>
            <div class="step-label"><i class="ci-user-circle"></i>Details</div>
        </a><a class="step-item" href="checkout-payment.html">
            <div class="step-progress"><span class="step-count">3</span></div>
            <div class="step-label"><i class="ci-card"></i>Payment</div>
        </a><a class="step-item" href="checkout-review.html">
            <div class="step-progress"><span class="step-count">4</span></div>
            <div class="step-label"><i class="ci-check-circle"></i>Review</div>
        </a></div>
    <!-- Autor info-->
    <div class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-3 mb-grid-gutter">
        <div class="d-flex align-items-center">
            <div class="img-thumbnail rounded-circle position-relative flex-shrink-0"><span
                    class="badge bg-warning position-absolute end-0 mt-n2" data-bs-toggle="tooltip"
                    title="Reward points"></span><img class="rounded-circle"
                    src="{{ asset('img/shop/account/avatar.jpg') }}" width="90" alt="Susan Gardner"></div>
            <div class="ps-3">
                <h3 class="fs-base mb-0">{{ Auth::user()->name }}</h3><span
                    class="text-accent fs-sm">{{ Auth::user()->email }}</span>
            </div>
        </div>
        {{-- <a class="btn btn-light btn-sm btn-shadow mt-3 mt-sm-0" href="account-profile.html"><i class="ci-edit me-2"></i>Edit profile</a> --}}
    </div>
    <!-- Shipping address-->
    <form action="{{ route('orders.store') }}" method="post">

        @csrf
        {{-- <input class="form-control" name="total" value="{{Cart::subtotal()}}"   type="text" id="checkout-address-1"> --}}


        <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Shipping address</h2>
        {{-- @foreach ($cartProducts as $product)

            <input type="hidden" name="products[]" value="{{ $product->id }}">
        @endforeach --}}
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="form-label" for="checkout-address-1">Address </label>
                    <input class="form-control" required name="address"   type="text" id="checkout-address-1">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="form-label" name="country" for="checkout-country">Country</label>
                    <select class="form-select" required name="country" id="checkout-country">
                      @foreach ($countries as $country)
                      <option value="{{$country}}">{{$country}}</option>
                      @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="form-label" for="checkout-city">City</label>
                    <select class="form-select" required name="city" id="checkout-city">
                        @foreach ($cities as $city)
                        <option value="{{$city}}">{{$city}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="form-label" for="checkout-zip">ZIP Code</label>
                    <input class="form-control" required     name="zip" type="text" id="checkout-zip">
                </div>
            </div>
        </div>
        <div class="row">
    {{-- <div class="col-sm-6">
        <div class="mb-3">
          <label class="form-label" for="checkout-address-2">Address 2</label>
          <input class="form-control" type="text" id="checkout-address-2">
        </div>
      </div> --}}
    </div>
    <h6 class="mb-3 py-3 border-bottom">Billing address</h6>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" checked id="same-address">
        <label class="form-check-label" for="same-address">Same as shipping address</label>
    </div>
    <!-- Navigation (desktop)-->
    <div class="d-none d-lg-flex pt-4 mt-3">
        <div class="w-50 pe-3"></div>
        <div class="w-50 ps-2"><button class="btn btn-primary d-block w-100" type="submit"><span
                    class="d-none d-sm-inline">Proceed to Shipping</span><span class="d-inline d-sm-none">Next</span><i
                    class="ci-arrow-right mt-sm-0 ms-1"></i></button>
        </div>
    </div>
</form>

</section>
