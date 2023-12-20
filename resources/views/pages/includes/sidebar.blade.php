@extends('layouts.master')
@section('content')
<main id="main">
  
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio inner-page" style="padding-top:140px;">
<div class="col-3">
    <div class="row" data-aos="fade-up" data-aos-delay="100">
           <div class="col-lg-8 d-flex justify-content-center align-items-center">
             <ul id="portfolio-flters">
               <li data-filter="*" class="filter-active"><a href="/subcategory/{slug}">All</a></li>
               @foreach($subcategory as $subcategories)
               <li class="select-subcategory" data-subcategory-id="{{ $subcategories->id }}" data-filter=".filter-app">{{$subcategories->name}}</li>
               @endforeach
             </ul>
           </div>
         </div>
   </div>
  

</div>

</section><!-- End Portfolio Section -->

</main>
<script src="/assets/js/ajaxproduct.js"></script>

   @endsection