@include('template.header')

<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i
                                class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Orders history</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">My orders</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0 pe-xl-5">
            <div class="bg-white rounded-3 shadow-lg pt-1 mb-5 mb-lg-0">
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
                <div class="d-lg-block collapse" id="account-menu">
                    <div class="bg-secondary px-4 py-3">
                        <h3 class="fs-sm mb-0 text-muted">Dashboard</h3>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="border-bottom mb-0"><a
                                class="nav-link-style d-flex align-items-center px-4 py-3 active"
                                href="{{url('user/orders/'.$user->id)}}"><i class="ci-bag opacity-60 me-2"></i>Orders<span
                                    class="fs-sm text-muted ms-auto">{{$user->orders->count()}}</span></a></li>
                        {{-- <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                                href="account-wishlist.html"><i class="ci-heart opacity-60 me-2"></i>Wishlist<span
                                    class="fs-sm text-muted ms-auto">3</span></a></li>
                        <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                                href="account-tickets.html"><i class="ci-help opacity-60 me-2"></i>Support tickets<span
                                    class="fs-sm text-muted ms-auto">1</span></a></li> --}}
                    </ul>
                    <div class="bg-secondary px-4 py-3">
                        <h3 class="fs-sm mb-0 text-muted">Account settings</h3>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                                href="{{url('users/'.$user->id)}}"><i class="ci-user opacity-60 me-2"></i>Profile info</a></li>
                        {{-- <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                                href="account-address.html"><i class="ci-location opacity-60 me-2"></i>Addresses</a>
                        </li>
                        <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3"
                                href="account-payment.html"><i class="ci-card opacity-60 me-2"></i>Payment methods</a>
                        </li> --}}
                        <li class="d-lg-none border-top mb-0"><a
                                class="nav-link-style d-flex align-items-center px-4 py-3" href="account-signin.html"><i
                                    class="ci-sign-out opacity-60 me-2"></i>Sign out</a></li>
                    </ul>
                </div>
            </div>
        </aside>
        <!-- Content  -->
        <section class="col-lg-8">
            <!-- Toolbar-->
            <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
                <div class="d-flex align-items-center">
                    {{-- <label class="d-none d-lg-block fs-sm text-light text-nowrap opacity-75 me-2" for="order-sort">Sort
                        orders:</label>
                    <label class="d-lg-none fs-sm text-nowrap opacity-75 me-2" for="order-sort">Sort orders:</label>
                    <select class="form-select" id="order-sort">
                        <option>All</option>
                        <option>Delivered</option>
                        <option>In Progress</option>
                        <option>Delayed</option>
                        <option>Canceled</option>
                    </select> --}}
                </div>
                <a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="account-signin.html"><i
                        class="ci-sign-out me-2"></i>Sign out</a>
            </div>
            <!-- Orders list-->
            <div class="table-responsive fs-md mb-4">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Date Purchased</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>check</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->orders()->paginate(10) as $order)
                        <tr>
                                <a  href="{{url('orders/'.$order->id)}}">
                                <td class="py-3"><a class="nav-link-style " href="{{url('orders/'.$order->id)}}"
                                        data-bs-toggle="modal">{{ $order->id }}</a></td>
                                <td class="py-3">{{ $order->created_at->diffForHumans() }}</td>
                                <td class="py-3">
                                    

@switch($order->status)
    @case(1)
    <span class="badge bg-warning m-0">
        {{'created'}}
    </span>
        @break
    @case(2)
    <span class="badge bg-info m-0">
    {{'payed'}}
</span>

        @break
   
    @case(3)
    <span class="badge bg-success m-0">
    {{'completed'}}
</span>
        
        @break
    @default
        
@endswitch
                               
                                </td>
                                <td class="py-3">{{ $order->total }}</td>
                                <td class="py-3"><a  href="{{url('orders/'.$order->id)}}""><i class="ci-eye"></i></a></td>
                            </a>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- Pagination-->
            {{-- <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#"><i class="ci-arrow-left me-2"></i>Prev</a></li>
                </ul>
                <ul class="pagination">
                    <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
                    <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span
                                class="visually-hidden">(current)</span></span></li>
                    <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
                    <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                    <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
                    <li class="page-item d-none d-sm-block"><a class="page-link" href="#">5</a></li>
                </ul>
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#" aria-label="Next">Next<i
                                class="ci-arrow-right ms-2"></i></a></li>
                </ul>
            </nav> --}}
        </section>
    </div>
</div>
@include('template.footer')
