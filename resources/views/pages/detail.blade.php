@extends('layouts.master')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="/">Home</a></li>
          <li>Portfolio Details</li>
        </ol>
        <h2>Portfolio Details</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
                
                @foreach ($product->getMedia('products') as $image)
                <div class="swiper-slide">
                  @if($image)
                  <img src="{{$image->getUrl()}}" alt="">
                  @endif
                </div>
                @endforeach
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Product information</h3>
              <ul>
                <li><strong>Category</strong>: {{$product->category->name}}</li>
                <li><strong>Product Name</strong>: {{$product->title}}</li>
                <li><strong>Price</strong>: {{$product->price}}</li>
                {{-- <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li> --}}
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>Description</h2>
              
              <p>
                {!! $product->description !!}
                
              </p>
              <div>
                <h1>Components</h1>
              @foreach ($product->components as $component)
              {{$component->product->id}}
              @endforeach
              </div>
            </div>
          </div>
        </div>
        <div>
          
        <table class="table table-bordered">
            <thead>
              <tr>

                <th scope="col">Components</th>
                <th scope="col">Formats</th>
              </tr>
            </thead> 
            <tbody>
                @foreach ($product->components as $component)
                {{$component}}
              <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{$component->comp_name}}</td>
                
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

@endsection