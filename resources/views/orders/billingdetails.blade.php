@extends('layouts.master')
@section('content')
<main id="main">
    <section id="portfolio" class="portfolio inner-page" style="padding-top:140px;">
        <div class="container">
<div class="row">
    <div class="col-md-8 mb-4">
      <div class="card mb-4">
        <div class="card-header py-3">
          <h5 class="mb-0">Billing details</h5>
        </div>
            {{-- @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif --}}
            
        <div class="card-body">
            <form action="{{ route('userdetails') }}" method="POST">
            @csrf
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                 <input type="text" id="form7Example13" name="user_id" value="{{ optional($data)->id }}" hidden class="form-control" />

                  <input type="text" id="form7Example1" name="name" value="{{ optional($data)->name }}" readonly class="form-control"  autocomplete="off"/>
                  <label class="form-label" for="form7Example1">First name</label>
                  
                </div>
              </div>

              <div class="col">
                <div class="form-outline">
                  <input type="tel" id="form7Example2" name="mobile" class="form-control" required />
                  <label class="form-label" for="form7Example2">Mobile No:</label>
                  @if ($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="textarea" id="form7Example3" name="door_no" class="form-control" required/>
                    <label class="form-label" for="form7Example3">Flat/House No. Building, Company Name</label>
                    @if ($errors->has('door_no'))
                    <span class="text-danger">{{ $errors->first('door_no') }}</span>
                  @endif
                </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="textarea" id="form7Example4" name="street" class="form-control" required/>
                    <label class="form-label" for="form7Example4">Street/Sector/Village</label>
                    @if ($errors->has('street'))
                    <span class="text-danger">{{ $errors->first('street') }}</span>
                  @endif
                </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="number" id="form7Example5" name="pincode" class="form-control" required/>
                    <label class="form-label" for="form7Example5">Pincode</label>
                    @if ($errors->has('pincode'))
                    <span class="text-danger">{{ $errors->first('pincode') }}</span>
                  @endif
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form7Example6" name="area" class="form-control" required/>
                    <label class="form-label" for="form7Example6">Area</label>
                    @if ($errors->has('area'))
                    <span class="text-danger">{{ $errors->first('area') }}</span>
                  @endif
                  </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form7Example7" name="city" class="form-control" required />
                    <label class="form-label" for="form7Example7">City</label>
                    @if ($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                  @endif
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form7Example8" name="state" class="form-control" required/>
                    <label class="form-label" for="form7Example8">State</label>
                    @if ($errors->has('state'))
                    <span class="text-danger">{{ $errors->first('state') }}</span>
                  @endif
                  </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form7Example9" name="country" class="form-control" required autocomplete="on"/>
                    <label class="form-label" for="form7Example9">Country</label>
                    @if ($errors->has('country'))
                    <span class="text-danger">{{ $errors->first('country') }}</span>
                  @endif
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form7Example10"  name="email" value="{{$data->email}}" readonly class="form-control"  autocomplete="off"/>
                    <label class="form-label" for="form7Example10">Email</label>
                    
                  </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form7Example11" name="GST" class="form-control" required pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$" title="Invalid GST Number." />
                    <label class="form-label" for="form7Example11">GST Invoice Number</label>
                    @if ($errors->has('GST'))
                    <span class="text-danger">{{ $errors->first('GST') }}</span>
                  @endif
                  </div>
                </div>
                
            </div>
            <div class="col">
                <div class="form-outline">
                    <button type="submit" class="btn btn-primary btn-lg btn-block"> 
                        Submit
                    </button>                
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  
    <div class="col-md-4 mb-4">
      <div class="card mb-4">
        <div class="card-header py-3">
          <h5 class="mb-0">Summary</h5>
        </div>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $product)
                @php $total += $product['price'] * $product['quantity'] @endphp
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">Product Image</li>
            <span><img src="{{ $product['image'] }}" width="100" height="100" class="img-responsive"/></span>

            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
              Products
              
              <span>{{ $product['name'] }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
              Price
              <span>${{ $product['price'] }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Quantity
                <span>{{ $product['quantity'] }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Discount
                <span>-</span>
              </li>
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
              <div>
                <strong>Total amount</strong>
                <strong>
                  <p class="mb-0">(including VAT)</p>
                </strong>
              </div>
              <span><strong>${{ $total }}</strong></span>
            </li>
          </ul>
          @endforeach
        @endif
          {{-- <button type="button" class="btn btn-primary btn-lg btn-block">
            Make purchase
          </button> --}}
        </div>
      </div>
    </div>
  </div>
        </div>
    </section>
</main>


  @endsection