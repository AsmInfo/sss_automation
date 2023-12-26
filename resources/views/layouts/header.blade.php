 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top">
  @auth('web')
  <div class="flex-row-reverse ">
    <div>
    {{ Auth::user()->name }}

    <a href="{{ route('logout') }}"  class="text-black font-bold">Logout</a>
    </div>
  </div>
  @endauth
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="/assets/img/logo.png" alt="">
      </a>
     
      

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
		  <li class="dropdown"><a class="nav-link scrollto" href="services.html"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                @foreach($categories as $category)
                    
                            {{-- @if($category->subcategories->count()>0) --}}
              <li><a href="{{ route('subcategory', ['slug' => $category->slug]) }}">{{$category->name}}</a></li>
              {{-- <li><a href="services.html#navigation">Navigation Graphics</a></li>
			  <li><a href="services.html#bas">BAS Symbol Library</a></li>
              <li><a href="services.html#hvac">3D HVAC Design & 3D Room System</a></li>
              <li><a href="services.html#system">System Graphics</a></li>
			  <li><a href="services.html#video">Video & Motion Graphics</a></li> --}}
                {{-- @endif --}}
              @endforeach
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="portfolio.html">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="index.html#clients">Clients</a></li>
          <li><a class="nav-link scrollto" href="index.html#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="index.html#contact">Get Quote</a></li>
        </ul>
       
        {{-- Cart Code Starting Here --}}
        <div class="dropdown">
          <button type="button" class="btn btn-info" data-toggle="dropdown">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
          </button> 
         
          <div class="dropdown-menu">
            <div class="row total-header-section">
                <div class="col-lg-6 col-sm-6 col-6">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </div>
                
                @php $total = 0 @endphp
                @foreach((array) session('cart') as $id => $product)
                    @php $total += $product['price'] * $product['quantity'] @endphp
                @endforeach
                <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                    <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                </div>
            </div>
            @if(session('cart'))
                @foreach(session('cart') as $id => $product)
                    <div class="row cart-detail">
                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                            <img src="{{ $product['image'] }}" />
                        </div>
                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                            <p>{{ $product['name'] }}</p>
                            <span class="price text-info"> ${{ $product['price'] }}</span> <span class="count"> Quantity:{{ $product['quantity'] }}</span>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                    <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                </div>
            </div>
        </div>
    </div>
        </div>
      </div>
        <i class="bi bi-list mobile-nav-toggle"></i>
        {{-- @if(session('success'))
      </div>
         <div class="alert alert-success">
             {{ session('success') }}
         </div> 
       </div>
       @endif --}}
      </nav><!-- .navbar -->
     
    </div>
  </header><!-- End Header -->