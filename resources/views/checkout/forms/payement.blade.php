<section class="col-lg-8">
    <!-- Steps-->
    <div class="steps steps-light pt-2 pb-3 mb-5"><a class="step-item active" href="shop-cart.html">
            <div class="step-progress"><span class="step-count">1</span></div>
            <div class="step-label"><i class="ci-cart"></i>Cart</div>
        </a><a class="step-item active" href="checkout-details.html">
            <div class="step-progress"><span class="step-count">2</span></div>
            <div class="step-label"><i class="ci-user-circle"></i>Details</div>
        </a><a class="step-item active current" href="checkout-payment.html">
            <div class="step-progress"><span class="step-count">3</span></div>
            <div class="step-label"><i class="ci-card"></i>Payment</div>
        </a><a class="step-item" href="checkout-review.html">
            <div class="step-progress"><span class="step-count">4</span></div>
            <div class="step-label"><i class="ci-check-circle"></i>Review</div>
        </a></div>
    <!-- Payment methods accordion-->
    <h2 class="h6 pb-3 mb-2">Payment method</h2>
    <div class="accordion mb-2" id="payment-method">
        {{-- <div class="accordion-item">
        <h3 class="accordion-header"><a class="accordion-button" href="#card" data-bs-toggle="collapse"><i class="ci-card fs-lg me-2 mt-n1 align-middle"></i>Pay with Credit Card</a></h3>
        <div class="accordion-collapse collapse show" id="card" data-bs-parent="#payment-method">
          <div class="accordion-body">
            <p class="fs-sm">We accept following credit cards:&nbsp;&nbsp;<img class="d-inline-block align-middle" src="img/cards.png" width="187" alt="Cerdit Cards"></p>
            <div class="credit-card-wrapper"></div>
            <form class="credit-card-form row">
              <div class="mb-3 col-sm-6">
                <input class="form-control" type="text" name="number" placeholder="Card Number" required>
              </div>
              <div class="mb-3 col-sm-6">
                <input class="form-control" type="text" name="name" placeholder="Full Name" required>
              </div>
              <div class="mb-3 col-sm-3">
                <input class="form-control" type="text" name="expiry" placeholder="MM/YY" required>
              </div>
              <div class="mb-3 col-sm-3">
                <input class="form-control" type="text" name="cvc" placeholder="CVC" required>
              </div>
              <div class="col-sm-6">
                <button class="btn btn-outline-primary d-block w-100 mt-0" type="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h3 class="accordion-header"><a class="accordion-button collapsed" href="#paypal" data-bs-toggle="collapse"><i class="ci-paypal me-2 align-middle"></i>Pay with PayPal</a></h3>
        <div class="accordion-collapse collapse" id="paypal" data-bs-parent="#payment-method">
          <div class="accordion-body fs-sm">
            <p><span class='fw-medium'>PayPal</span> - the safer, easier way to pay</p>
            <form class="row needs-validation" method="post" novalidate>
              <div class="col-sm-6">
                <div class="mb-3">
                  <input class="form-control" type="email" placeholder="E-mail" required>
                  <div class="invalid-feedback">Please enter valid email address</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="mb-3">
                  <input class="form-control" type="password" placeholder="Password" required>
                  <div class="invalid-feedback">Please enter your password</div>
                </div>
              </div>
              <div class="col-12">
                <div class="d-flex flex-wrap justify-content-between align-items-center"><a class="nav-link-style" href="#">Forgot password?</a>
                  <button class="btn btn-primary" type="submit">Log In</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div> --}}
        {{-- <div class="accordion-item">
        <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points" data-bs-toggle="collapse"><i class="ci-gift me-2"></i>Redeem Reward Points</a></h3>
        <div class="accordion-collapse collapse" id="points" data-bs-parent="#payment-method">
          <div class="accordion-body">
           
          </div>
        </div>
      </div> --}}
        <p>You will pay at the time of delivery</p>
        <div class="form-check d-block">
            <input checked class="form-check-input" type="checkbox" id="use_points">
            <label class="form-check-label" for="use_points">accept</label>
        </div>
    </div>
    <!-- Navigation (desktop)-->
    <form action="{{ route('orders.payed') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$order->id}}">
    <div class="d-none d-lg-flex pt-4">
        <div class="w-50 pe-3"></div>
            <div class="w-50 ps-2"><button type="submit"  class="btn btn-primary d-block w-100"><span
                        class="d-none d-sm-inline">Review your order</span><span class="d-inline d-sm-none">Review
                        order</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></button></div>
                    </div>
                </form>
</section>
