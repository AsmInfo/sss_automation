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
                
                @foreach ($product->getMedia('product') as $image)
                <div class="swiper-slide media" >
                  @if($image)
                  {{-- <figure class="zoom" onmousemove="zoom(event)" style="background-image: url('{{$image->getUrl()}}');)"> --}}
                  
                {{-- </figure> --}}
                <div class="zoom-box">
                <img id="myimage"   src="{{$image->getUrl()}}" alt="" style="background-image: url('{{$image->getUrl()}}');" >
                </div>  
                @endif
                </div>
                @endforeach
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4 mt-1">
            <div class="portfolio-info ">
              
              <ul>
                <li><strong>Price</strong>: {{$product->price}} </li>

                <button type="button" class="btn btn-primary">Add to Cart</button>
                <h3>Product information</h3> 
                <li><strong>Category</strong>: {{$product->category->name}}</li>
                <li><strong>Product Name</strong>: {{$product->title}}</li>
                
                {{-- <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li> --}}
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>Description</h2>
              <p>
                {!! $product->description !!}
              </p>
              
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
                @foreach ($product->component  as $components)
                {{-- {{$component}} --}}
              <tr>
                
                <td>{{$components->comp_name}}</td>
                @foreach($components->format as $format)
                <td>{{$format->type}}</td>
                @break
                @endforeach
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
  
  <div id="myresult" class="img-zoom-result hide"></div>

@endsection
