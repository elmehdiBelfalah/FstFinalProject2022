@include('template.header')

<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
            <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Home</a></li>
            <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
            </li>
            <li class="breadcrumb-item text-nowrap active" aria-current="page">Profile info</li>
            <li class="breadcrumb-item text-nowrap active" aria-current="page">Profile info</li>
          </ol>
        </nav>
      </div>
        <h1 class="h3 text-light mb-0">Profile info</h1>
      </div>
    </div>
  </div>
  <div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
      <!-- Sidebar-->
      <aside class="col-lg-4 pt-4 pt-lg-0 pe-xl-5">
        <div class="bg-white rounded-3 shadow-lg pt-1 mb-5 mb-lg-0">
          <div class="d-md-flex justify-content-between align-items-center text-center text-md-start p-4">
            <div class="d-md-flex align-items-center">
              <div class="img-thumbnail rounded-circle position-relative flex-shrink-0 mx-auto mb-2 mx-md-0 mb-md-0" style="width: 6.375rem;"><span class="badge bg-warning position-absolute end-0 mt-n2" data-bs-toggle="tooltip" title="Reward points"></span><img class="rounded-circle" src="{{asset('img/shop/account/avatar.jpg')}}" alt="Susan Gardner"></div>
              <div class="ps-md-3">
                <h3 class="fs-base mb-0">{{$user->name}}</h3><span class="text-accent fs-sm">{{$user->email}}</span>
              </div>
            </div><a class="btn btn-primary d-lg-none mb-2 mt-3 mt-md-0" href="#account-menu" data-bs-toggle="collapse" aria-expanded="false"><i class="ci-menu me-2"></i>Account menu</a>
          </div>
          <div class="d-lg-block collapse" id="account-menu">
            <div class="bg-secondary px-4 py-3">
              <h3 class="fs-sm mb-0 text-muted">Dashboard</h3>
            </div>
            <ul class="list-unstyled mb-0">
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('user/orders/'.$user->id)}}"><i class="ci-bag opacity-60 me-2"></i>Orders<span class="fs-sm text-muted ms-auto">{{$user->orders->count()}}</span></a></li>
              {{-- <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="account-wishlist.html"><i class="ci-heart opacity-60 me-2"></i>Wishlist<span class="fs-sm text-muted ms-auto">3</span></a></li>
              <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="account-tickets.html"><i class="ci-help opacity-60 me-2"></i>Support tickets<span class="fs-sm text-muted ms-auto">1</span></a></li> --}}
            </ul>
            <div class="bg-secondary px-4 py-3">
              <h3 class="fs-sm mb-0 text-muted">Account settings</h3>
            </div>
            <ul class="list-unstyled mb-0">
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active" href="{{url('users/'.$user->id)}}"><i class="ci-user opacity-60 me-2"></i>Profile info</a></li>
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 " href="{{url('users/password/'.$user->id)}}"><i class="ci-locked opacity-60 me-2"></i>Password</a></li>
              {{-- <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="account-address.html"><i class="ci-location opacity-60 me-2"></i>Addresses</a></li> --}}
              {{-- <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="account-payment.html"><i class="ci-card opacity-60 me-2"></i>Payment methods</a></li> --}}
              <li class="d-lg-none border-top mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('logout')}}"><i class="ci-sign-out opacity-60 me-2"></i>Sign out</a></li>
            </ul>
          </div>
        </div>
      </aside>
      <!-- Content  -->
      <section class="col-lg-8">
        <!-- Toolbar-->
        <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
          <h6 class="fs-base text-light mb-0">Update you profile details below:</h6><a class="btn btn-primary btn-sm" href="{{url('logout')}}"><i class="ci-sign-out me-2"></i>Sign out</a>
        </div>
        @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="container my-3">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{$error}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endforeach
                @endif
        <!-- Profile form-->
        <form action="{{route('users.update' , $user)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="bg-secondary rounded-3 p-4 mb-4">
            <div class="d-flex align-items-center"><img class="rounded" src="{{asset('img/shop/account/avatar.jpg')}}" width="90" alt="Susan Gardner">
              <div class="ps-3">
            
                {{-- <button class="btn btn-light btn-shadow btn-sm mb-2" type="button"><i class="ci-loading me-2"></i>Change avatar</button> --}}
                <div class="p mb-0 fs-ms   text-muted">{{$user->name}}</div>
                <div class="p mb-0 fs-ms   text-muted">{{$user->email}}</div>
              </div>
            </div>
          </div>
          <div class="row gx-4 gy-3">
            <div class="col-sm-6">
              <label class="form-label" for="account-fn"> Name</label>
              <input class="form-control" type="text"  name="name" id="account-fn" value="{{$user->name}}">
            </div>
              {{-- <div class="col-sm-6">
                <label class="form-label" for="account-ln">Last Name</label>
                <input class="form-control" name="name" type="text" id="account-ln" value="{{$user->name}}">
              </div> --}}
            <div class="col-sm-6">
              <label class="form-label" for="account-email">Email Address</label>
              <input class="form-control"  name="email" type="email" id="account-email" value="{{$user->email}}" disabled>
            </div>
            <div class="col-sm-6">
              <label class="form-label" for="account-phone">Phone Number</label>
              <input class="form-control"  name="phone" type="tel" id="account-phone" value="{{$user->phone }}" required>
            </div>
            {{-- <div class="col-sm-6">
              <label class="form-label" for="account-pass">New Password</label>
              <div class="password-toggle">
                <input class="form-control" name="password"  type="password" id="account-pass">
                <label class="password-toggle-btn" aria-label="Show/hide password">
                  <input class="password-toggle-check"   type="checkbox"><span class="password-toggle-indicator"></span>
                </label>
              </div>
            </div>
            <div class="col-sm-6">
              <label class="form-label" for="account-confirm-pass">Confirm Password</label>
              <div class="password-toggle">
                <input class="form-control" name="password_confirmation"  type="password" id="account-confirm-pass">
                <label class="password-toggle-btn" aria-label="Show/hide password">
                  <input class="password-toggle-check"   type="checkbox"><span class="password-toggle-indicator"></span>
                </label>
              </div>
            </div> --}}
            <div class="col-12">
              <hr class="mt-2 mb-3">
              <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div class="form-check">
                  {{-- <input class="form-check-input" type="checkbox" id="subscribe_me" checked>
                  <label class="form-check-label" for="subscribe_me">Subscribe me to Newsletter</label>--}}
                </div> 
                <button class="btn btn-primary mt-3 mt-sm-0" type="submit">Update profile</button>
              
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>
@include('template.footer')
