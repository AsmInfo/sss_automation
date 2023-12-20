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