@extends('layouts.master')
@section('content')
<main id="main">
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio inner-page" style="padding-top:140px;">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <p>Check our latest work</p>
      </header>

      <!-- <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-card">Card</li>
            <li data-filter=".filter-web">Web</li>
          </ul>
        </div>
      </div> -->

      <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
@foreach($productlist as $productslist)

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            @foreach ($productslist->getMedia('product') as $image)
            <a class="d-flex" href="{{ route('detail', ['slug' => $productslist->slug]) }}">
            <img src="{{ $image->getUrl() }}" class="img-fluid" alt="">
            @break
            @endforeach
            <h4>{{$productslist->title}}</h4>
            </a>
          </div>
        </div>
        @endforeach
        
        

      </div>

    </div>

  </section><!-- End Portfolio Section -->

</main>
<!-- End #main -->
@endsection