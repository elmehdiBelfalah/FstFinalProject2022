@include('template.header')


<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i
                                class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="#">Shop</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Grid right sidebar</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Shop</h1>
        </div>
    </div>
</div>

<div class="container pb-5 mb-2 mb-md-4">

    <div class="row">
        <!-- Content  -->
        <section class="col-lg-8">
            <div class="py-sm-2">
                <div
                    class="d-sm-flex justify-content-between align-items-center bg-secondary overflow-hidden mb-4 rounded-3">
                    <div class="py-4 my-2 my-md-0 py-md-5 px-4 ms-md-3 text-center text-sm-start">
                        <h4 class="fs-lg fw-light mb-2">Converse All Star</h4>
                        <h3 class="mb-4">Make Your Day Comfortable</h3><a class="btn btn-primary btn-shadow btn-sm"
                            href="#">Shop Now</a>
                    </div><img class="d-block ms-auto" src="img/shop/catalog/banner.jpg" alt="Shop Converse">
                </div>
            </div>
            <!-- Toolbar-->
            {{-- <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
          <div class="d-flex flex-wrap">
            <div class="d-flex align-items-center flex-nowrap me-3 me-sm-4 pb-3">
              <label class="text-light fs-sm opacity-75 text-nowrap me-2 d-none d-sm-block" for="sorting">Sort by:</label>
              <select class="form-select" id="sorting">
                <option>Popularity</option>
                <option>Low - Hight Price</option>
                <option>High - Low Price</option>
                <option>Average Rating</option>
                <option>A - Z Order</option>
                <option>Z - A Order</option>
              </select><span class="fs-sm text-light opacity-75 text-nowrap ms-2 d-none d-md-block">of 287 products</span>
            </div>
          </div>
          <div class="d-flex pb-3"><a class="nav-link-style nav-link-light me-3" href="#"><i class="ci-arrow-left"></i></a><span class="fs-md text-light">1 / 5</span><a class="nav-link-style nav-link-light ms-3" href="#"><i class="ci-arrow-right"></i></a></div>
          {{-- <div class="d-none d-sm-flex pb-3"><a class="btn btn-icon nav-link-style bg-light text-dark disabled opacity-100 me-2" href="#"><i class="ci-view-grid"></i></a><a class="btn btn-icon nav-link-style nav-link-light" href="shop-list-rs.html"><i class="ci-view-list"></i></a></div> --}}
            {{-- </div> --}}
            <!-- Products grid-->
            <div class="row mx-n2">
                <!-- Product-->
                @foreach ($products as $product)

                    <div class="col-md-4 col-sm-6 px-2 mb-4">
                        <div class="card product-card">
                            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a
                                class="card-img-top d-block overflow-hidden"
                                href="{{ url('products/' . $product->id) }}"><img
                                    src="{{ asset('img/shop/catalog/' . $product->id . '.jpg') }}" alt="Product"></a>
                            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1"
                                    href="{{ url('products/' . $product->id) }}">{{ $product->name }}</a>
                                <h3 class="product-title fs-sm"><a
                                        href="{{ url('products/' . $product->id) }}">{{ $product->category->name }}</a>
                                </h3>
                                <div class="d-flex justify-content-between">
                                    <div class="product-price"><span class="text-accent">$154.<small>00</small></span>
                                    </div>
                                    <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star-filled active"></i><i
                                            class="star-rating-icon ci-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card-body-hidden">
                                {{-- <div class="text-center pb-2">
                  <div class="form-check form-option form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size1" id="s-75">
                    <label class="form-option-label" for="s-75">7.5</label>
                  </div>
                  <div class="form-check form-option form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size1" id="s-80" checked>
                    <label class="form-option-label" for="s-80">8</label>
                  </div>
                  <div class="form-check form-option form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size1" id="s-85">
                    <label class="form-option-label" for="s-85">8.5</label>
                  </div>
                  <div class="form-check form-option form-check-inline mb-2">
                    <input class="form-check-input" type="radio" name="size1" id="s-90">
                    <label class="form-option-label" for="s-90">9</label>
                  </div>
                </div> --}}
                <form method="post" action="{{ route('cart.add') }}">
                  <input type="hidden" name="id" value="{{$product->id}}">
                             
                  {{ csrf_field() }}
                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="submit"><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                </form>
                                <div class="text-center"><a class="nav-link-style fs-ms"
                                        href="{{ url('products/' . $product->id) }}"><i
                                            class="ci-eye align-middle me-1"></i>Quick view</a></div>
                            </div>
                        </div>
                        <hr class="d-sm-none">
                    </div>
                @endforeach


            </div>
            <!-- Banner-->
            {{-- <div class="py-sm-2">
          <div class="d-sm-flex justify-content-between align-items-center bg-secondary overflow-hidden mb-4 rounded-3">
            <div class="py-4 my-2 my-md-0 py-md-5 px-4 ms-md-3 text-center text-sm-start">
              <h4 class="fs-lg fw-light mb-2">Converse All Star</h4>
              <h3 class="mb-4">Make Your Day Comfortable</h3><a class="btn btn-primary btn-shadow btn-sm" href="#">Shop Now</a>
            </div><img class="d-block ms-auto" src="img/shop/catalog/banner.jpg" alt="Shop Converse">
          </div>
        </div> --}}
            <!-- Products grid-->
            <div class="row mx-n2">
                <!-- Product-->

            </div>

            <hr class="my-3">
            <!-- Pagination-->
            @if ($products->lastPage() > 1)
                <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
                    <ul class="pagination ml-auto mx-auto">
                        <li class="{{ $products->currentPage() == 1 ? ' disabled' : '' }} page-item">
                            <a class=" page-link " href="{{ $products->url(1) }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                            <li class="{{ $products->currentPage() == $i ? ' active' : '' }} page-item">
                                <a class=" page-link " href="{{ $products->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li
                            class="{{ $products->currentPage() == $products->lastPage() ? ' disabled' : '' }} page-item">
                            <a href="{{ $products->url($products->currentPage() + 1) }}" class="page-link"
                                aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            @endif
            {{-- <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#"><i class="ci-arrow-left me-2"></i>Prev</a></li>
          </ul>
          <ul class="pagination">
            <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
            <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span></li>
            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">5</a></li>
          </ul>
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#" aria-label="Next">Next<i class="ci-arrow-right ms-2"></i></a></li>
          </ul> --}}
            </nav>
            {{-- {{$products->links()}} --}}

        </section>
        <!-- Sidebar-->
        <aside class="col-lg-4">
            <!-- Sidebar-->
            <div class="offcanvas offcanvas-collapse offcanvas-end bg-white w-100 rounded-3 shadow-lg ms-lg-auto py-1"
                id="shop-sidebar" style="max-width: 22rem;">
                <div class="offcanvas-header align-items-center shadow-sm">
                    <h2 class="h5 mb-0">Filters</h2>
                    <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body py-grid-gutter px-lg-grid-gutter">
                    <!-- Categories-->
                    {{-- <div class="widget widget-categories mb-4 pb-4 border-bottom">
              <h3 class="widget-title">Categories</h3>
              <div  id="shop-categories">
                <!-- Shoes-->
               
                <!-- Accessories-->
                <div class="">
                  <h3 class="accordion-header"><a class="accordion-button " href="#accessories" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="accessories">Accessories</a></h3>
                 
                </div>
              </div>
            </div> --}}
                    <!-- Price range-->
                    <form action="">
                        <div class="widget mb-4 pb-4 border-bottom">
                            <h3 class="widget-title">Price</h3>
                            {{-- <div class="range-slider" data-start-min="250" data-start-max="680" data-min="0" data-max="1000" data-step="1">
                <div class="range-slider-ui"></div>
                <div class="d-flex pb-1">
                  <div class="w-50 pe-2 me-2">
                    <div class="input-group input-group-sm"><span class="input-group-text">$</span>
                      <input class="form-control range-slider-value-min" type="text">
                    </div>
                  </div>
                  <div class="w-50 ps-2">
                    <div class="input-group input-group-sm"><span class="input-group-text">$</span>
                      <input class="form-control range-slider-value-max" type="text">
                    </div>
                  </div>
                </div>
              </div> --}}
                            <div class="d-flex pb-1">
                                <div class="w-50 pe-2 me-2">
                                    <div class="input-group input-group-sm"><span class="input-group-text">MAD</span>
                                        <input class="form-control range-slider-value-min"
                                            value="{{ request()->input('min_price', old('min_price')) }}"
                                            name="min_price" type="text">
                                    </div>
                                </div>
                                <div class="w-50 ps-2">
                                    <div class="input-group input-group-sm"><span class="input-group-text">MAD</span>
                                        <input class="form-control range-slider-value-max"
                                            value="{{ request()->input('max_price', old('max_price')) }}"
                                            name="max_price" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Filter by Brand-->
                        <div class="widget widget-filter mb-4 pb-4 border-bottom">
                            <h3 class="widget-title">Category</h3>

                            <ul class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 11rem;"
                                data-simplebar data-simplebar-auto-hide="false">


                                @foreach ($categories as $category)
                                    <li class="widget-filter-item d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <input
                                                {{ in_array($category->id, request()->input('categories', old('categories') ??[])) ? 'checked':'  '}}
                                                class="form-check-input" name="categories[]"
                                                value="{{ $category->id }}" type="checkbox" id="wrangler">
                                            <label class="form-check-label widget-filter-item-text"
                                                for="wrangler">{{ $category->name }}</label>
                                        </div><span class="fs-xs text-muted">{{ $category->products->count() }}</span>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- Filter by category -->
                        <div class="widget widget-filter mb-4 pb-4 border-bottom">
                            <h3 class="widget-title">Brand</h3>

                            <ul class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 11rem;"
                                data-simplebar data-simplebar-auto-hide="false">


                                @foreach ($brands as $brand)
                                    <li class="widget-filter-item d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <input 
                                            {{ in_array($brand->id, request()->input('brands', old('brands')??[])) ? 'checked':''}}
                                            class="form-check-input" type="checkbox" name="brands[]"
                                                value="{{ $brand->id }}" id="wrangler">
                                            <label class="form-check-label widget-filter-item-text"
                                                for="wrangler">{{ $brand->name }}</label>
                                        </div><span class="fs-xs text-muted">{{ $brand->products->count() }}</span>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- Filter by Size-->

                        <!-- Filter by Color-->
                        {{-- <div class="widget">
              <h3 class="widget-title">Color</h3>
              <div class="d-flex flex-wrap">
                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                  <input class="form-check-input" type="checkbox" id="color-blue-gray">
                  <label class="form-option-label rounded-circle" for="color-blue-gray"><span class="form-option-color rounded-circle" style="background-color: #b3c8db;"></span></label>
                  <label class="d-block fs-xs text-muted mt-n1" for="color-blue-gray">Blue-gray</label>
                </div>
                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                  <input class="form-check-input" type="checkbox" id="color-burgundy">
                  <label class="form-option-label rounded-circle" for="color-burgundy"><span class="form-option-color rounded-circle" style="background-color: #ca7295;"></span></label>
                  <label class="d-block fs-xs text-muted mt-n1" for="color-burgundy">Burgundy</label>
                </div>
                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                  <input class="form-check-input" type="checkbox" id="color-teal">
                  <label class="form-option-label rounded-circle" for="color-teal"><span class="form-option-color rounded-circle" style="background-color: #91c2c3;"></span></label>
                  <label class="d-block fs-xs text-muted mt-n1" for="color-teal">Teal</label>
                </div>
                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                  <input class="form-check-input" type="checkbox" id="color-brown">
                  <label class="form-option-label rounded-circle" for="color-brown"><span class="form-option-color rounded-circle" style="background-color: #9a8480;"></span></label>
                  <label class="d-block fs-xs text-muted mt-n1" for="color-brown">Brown</label>
                </div>
                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                  <input class="form-check-input" type="checkbox" id="color-coral-red">
                  <label class="form-option-label rounded-circle" for="color-coral-red"><span class="form-option-color rounded-circle" style="background-color: #ff7072;"></span></label>
                  <label class="d-block fs-xs text-muted mt-n1" for="color-coral-red">Coral red</label>
                </div>
                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                  <input class="form-check-input" type="checkbox" id="color-navy">
                  <label class="form-option-label rounded-circle" for="color-navy"><span class="form-option-color rounded-circle" style="background-color: #696dc8;"></span></label>
                  <label class="d-block fs-xs text-muted mt-n1" for="color-navy">Navy</label>
                </div>
                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                  <input class="form-check-input" type="checkbox" id="color-charcoal">
                  <label class="form-option-label rounded-circle" for="color-charcoal"><span class="form-option-color rounded-circle" style="background-color: #4e4d4d;"></span></label>
                  <label class="d-block fs-xs text-muted mt-n1" for="color-charcoal">Charcoal</label>
                </div>
                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">
                  <input class="form-check-input" type="checkbox" id="color-sky-blue">
                  <label class="form-option-label rounded-circle" for="color-sky-blue"><span class="form-option-color rounded-circle" style="background-color: #8bcdf5;"></span></label>
                  <label class="d-block fs-xs text-muted mt-n1" for="color-sky-blue">Sky blue</label>
                </div>
              </div>
            </div> --}}
                        <button class="text-center mx-auto float-right btn btn-primary" type="submit">Search</button>
                </div>

                </form>
            </div>
        </aside>
    </div>
</div>
</main>

@include('template.footer')
