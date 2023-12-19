@extends('layouts.master')

@section('content')


<main id="main">
  
  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio inner-page" style="padding-top:140px;">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <p>Check our latest work</p>
      </header>

 
      <div>

      </div>
<div class="row">
<div class="col-3">
 <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-8 d-flex justify-content-center align-items-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            @foreach($subcategory as $subcategories)
            <li class="select-subcategory" data-subcategory-id="{{ $subcategories->id }}" data-filter=".filter-app">{{$subcategories->name}}</li>
            @endforeach
          </ul>
        </div>
      </div>
</div>
<div class="col-9">
      <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

        @foreach($products as $product)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <a href="{{ route('detail', ['slug' => $product->slug]) }}">
          <div class="portfolio-wrap">
            @foreach ($product->getMedia('products') as $image)
            <img src="{{$image->getUrl()}}" class="img-fluid" alt="">
            @endforeach
            <h4>{{$product->title}}</h4>
          </div>
        </a>
        </div>
        @endforeach
    
    </div></div>

    </div>

  </section><!-- End Portfolio Section -->

</main><!-- End #main -->
{{-- <main id="main">
  
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
        @foreach($products as $product)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <a href="{{ route('detail', ['slug' => $product->slug]) }}">
          <div class="portfolio-wrap">
            @foreach ($product->getMedia('products') as $image)
            <img src="{{$image->getUrl()}}" class="img-fluid" alt="">
            @endforeach
            <h4>{{$product->title}}</h4>
          </div>
        </a>
        </div>
        @endforeach
    

      </div>

    </div>

  </section><!-- End Portfolio Section -->

</main><!-- End #main --> --}}


@endsection
