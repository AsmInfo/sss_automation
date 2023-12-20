@extends('layouts.master')

@section('content')


<main id="main">
  
  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio inner-page" style="padding-top:140px;">

    <div class="container" id="ajaxContent" data-aos="fade-up">

      <header class="section-header">
        <p>Check our latest work</p>
      </header>

 
     
<div class="row">
{{-- <div class="col-">
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
</div> --}}
<div class="col-12">
      <div class="row gy-4 " data-aos="fade-up" data-aos-delay="200">
        
        
        @foreach($subcategory as $subcategories)
        <div class="col-lg-4 col-md-6 ">
          <div class="">
            @if (isset($productArray[$subcategories->id]))
            
            {{-- Loop through products for the current subcategory --}}
            @foreach ($productArray[$subcategories->id] as $product)
            
            <a href="{{ route('detail', ['slug' => $product->slug]) }}">
            @if ($product->hasMedia('products'))
              <img src="{{ $product->getFirstMedia('products')->getUrl() }}" alt="Product Image">
              <h4>{{$product->subcategory?->name}}</h4>
              @else
              <p>No image available</p>
            @endif
          </a>
        @endforeach
        @endif
            
          </div>
         @endforeach  
        </div>
       
    
    </div></div>

    </div>

  </section><!-- End Portfolio Section -->

</main>
<!-- End #main -->



@endsection
