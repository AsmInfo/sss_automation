@extends('layouts.master')

@section('content')


<main id="main">
  
  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio inner-page" style="padding-top:140px;">

    <div class="container" id="ajaxContent" data-aos="fade-up">

      <header class="section-header">
        <p>Check our latest work</p>
      </header>

 
     
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
{{-- <div class="col-12"> --}}
  
      <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
        
        
        @foreach($subcategory as $subcategories)
        <div class="col-lg-4 col-md-4 portfolio-item filter-app">
          <div class="portfolio-wrap">
            @if (isset($productArray[$subcategories->id]))
                @php
                    $latestProduct = $productArray[$subcategories->id]->first();
                @endphp
            @if ($latestProduct)
            <a class="d-flex" href="{{ route('detail', ['slug' => $latestProduct->slug]) }}">
              @if ($latestProduct->hasMedia('product'))
              <img src="{{ $latestProduct->getFirstMedia('product')->getUrl() }}" class="img-fluid" alt="Product Image">
              <h4>{{$latestProduct->subcategory?->name}}</h4>
              @else
              <p>No image available</p>
              @endif
            </a>
            @endif 
         @endif            
          </div>
        </div>
         @endforeach  
        </div>
       
    
    </div>

    </div>

  </section><!-- End Portfolio Section -->

</main>
<!-- End #main -->



@endsection
