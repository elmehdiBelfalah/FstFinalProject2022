<section class="col-lg-8">
    <!-- Steps-->
    <div class="steps steps-light pt-2 pb-3 mb-5"><a class="step-item active" href="shop-cart.html">
            <div class="step-progress"><span class="step-count">1</span></div>
            <div class="step-label"><i class="ci-cart"></i>Cart</div>
        </a><a class="step-item active" href="checkout-details.html">
            <div class="step-progress"><span class="step-count">2</span></div>
            <div class="step-label"><i class="ci-user-circle"></i>Details</div>
        </a><a class="step-item active" href="checkout-shipping.html">
            <div class="step-progress"><span class="step-count">3</span></div>
            <div class="step-label"><i class="ci-card"></i>Payment</div>
        </a><a class="step-item active current" href="checkout-review.html">
            <div class="step-progress"><span class="step-count">4</span></div>
            <div class="step-label"><i class="ci-check-circle"></i>Review</div>
        </a></div>
    <!-- Order details-->
    <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Review your order</h2>
    @foreach ($order->products as $product)

        <!-- Item-->
        <div class="d-sm-flex justify-content-between my-4 pb-3 border-bottom">
            <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto me-sm-4"
                    href="{{url('products/'.$product->id)}}"><img src="{{url('img/shop/catalog/'.$product->id.'.jpg')}}" width="160" alt="Product"></a>
                <div class="pt-2">
                    <h3 class="product-title fs-base mb-2"><a href="{{'products/'.$product->id}}">{{$product->name}}</a>
                    {{-- <spa class="product-title fs-base mb-2"><a href="{{'products/'.$product->id}}">{{$product->name}}</a> --}}
                    </spa>
                    {{-- <div class="fs-sm"><span class="text-muted me-2">Size:</span>{{}}</div> --}}
                    {{-- <div class="fs-sm"><span class="text-muted me-2">Color:</span>Light blue</div> --}}
                    <div class="fs-lg text-accent pt-2">{{$product->price}}.<small>MAD</small></div>
                </div>
            </div>
            <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-end" style="max-width: 9rem;">
                {{-- <p class="mb-0"><span class="text-muted fs-sm">Quantity:</span><span>&nbsp;{{$product->piv}}</span></p> --}}
                {{-- <button class="btn btn-link px-0" type="button"><i class="ci-edit me-2"></i><span
                        class="fs-sm">Edit</span></button> --}}
            </div>
        </div>
    @endforeach

    <!-- Client details-->
    <div class="bg-secondary rounded-3 px-4 pt-4 pb-2">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="h6">Shipping to:</h4>
                <ul class="list-unstyled fs-sm">
                    <li><span class="text-muted">Client:&nbsp;</span>{{auth()->user()->name}}</li>
                    <li><span class="text-muted">Address:&nbsp;</span>{{$order->address}}</li>
                    <li><span class="text-muted">Phone:&nbsp;</span>{{auth()->user()->phone}}</li>
                </ul>
            </div>
            <div class="col-sm-6">
                <h4 class="h6">Payment method:</h4>
                <ul class="list-unstyled fs-sm">
                    <li><span class="text-muted">cash on delivery</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Navigation (desktop)-->
    <form action="{{ route('orders.reviewd') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $order->id }}">
        <div class="d-none d-lg-flex pt-4">
            <div class="w-50 pe-3"></div>
            <div class="w-50 ps-2"><button type="submit" class="btn btn-primary d-block w-100"
                    href="checkout-complete.html"><span class="d-none d-sm-inline">Complete order</span><span
                        class="d-inline d-sm-none">Complete</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></button>
            </div>
        </div>
    </form>
</section>
