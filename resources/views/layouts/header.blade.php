 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top">
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
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->