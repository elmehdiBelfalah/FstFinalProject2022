@php
$cartProducts = Cart::content() ;
$total = Cart::subtotal();
if(isset($order) && count($cartProducts) == 0)
{
$cartProducts = $order->products ;
$total =  $order->total;


}
@endphp



@include('template.header')
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i
                                class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Shop</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Checkout</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        @if (!isset($order))
            @include('checkout.forms.details')

        @else
            @switch($order->status)
                @case(1)
                @include('checkout.forms.payement')

                @break
                @case(2)
                @include('checkout.forms.review')
                @break

                @case(3)
                @include('checkout.forms.complete')

                @break

            @endswitch
        @endif

        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
            <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
                <div class="py-2 px-xl-2">
                    <div class="widget mb-3">
                        <h2 class="widget-title text-center">Order summary</h2>
                        @foreach ($cartProducts as $product)

                            <div class="d-flex align-items-center py-2 border-bottom"><a class="d-block flex-shrink-0"
                                    href="shop-single-v1.html"><img
                                        src="{{ url('img/shop/catalog/' . $product->id . '.jpg') }}" width="64"
                                        alt="Product"></a>
                                <div class="ps-2">
                                    <h6 class="widget-product-title"><a href="shop-single-v1.html">Cotton Polo Regular
                                            Fit</a></h6>
                                    <div class="widget-product-meta"><span
                                            class="text-accent me-2">{{ $product->price }}.<small>00</small></span><span
                                            class="text-muted">x
                                            {{ $product->qty }}</span></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <ul class="list-unstyled fs-sm pb-2 border-bottom">
                        <li class="d-flex justify-content-between align-items-center"><span
                                class="me-2">Subtotal:</span><span class="text-end">{{ floor($total) }}
                                <small>MAD </small></span></li>
                        <li class="d-flex justify-content-between align-items-center"><span
                                class="me-2">Shipping:</span><span class="text-end">20 MAD </span></li>
                        <li class="d-flex justify-content-between align-items-center"><span
                                class="me-2">Taxes:</span><span class="text-end">_</span></small></span></li>
                        <li class="d-flex justify-content-between align-items-center"><span
                                class="me-2">Discount:</span><span class="text-end">—</span></li>
                    </ul>
                    <h3 class="fw-normal text-center my-4">{{ floor($total) }} <small>MAD</small></h3>
                    {{-- <form class="needs-validation" method="post" novalidate>
                        <div class="mb-3">
                            <input class="form-control" type="text" placeholder="Promo code" required>
                            <div class="invalid-feedback">Please provide promo code.</div>
                        </div>
                        <button class="btn btn-outline-primary d-block w-100" type="submit">Apply promo code</button>
                    </form> --}}
                </div>
            </div>
        </aside>
    </div>
    <!-- Navigation (mobile)-->
    <div class="row d-lg-none">
        <div class="col-lg-8">
            <div class="d-flex pt-4 mt-3">
                <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="shop-cart.html"><i
                            class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to
                            Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
                <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100" href="checkout-shipping.html"><span
                            class="d-none d-sm-inline">Proceed to Shipping</span><span
                            class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a></div>
            </div>
        </div>
    </div>
</div>
@include('template.footer')
