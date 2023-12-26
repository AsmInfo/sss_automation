@extends('layouts.master')

@section('content')
<main id="main">
    <section id="portfolio" class="portfolio inner-page" style="padding-top:140px;">

<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $product)
                @php $total += $product['price'] * $product['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                <img src="{{ $product['image'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $product['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $product['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number"  readonly value="{{ $product['quantity'] }}" class="form-control quantity update-cart"  />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $product['price'] * $product['quantity'] }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart" ><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>

                @guest('web')
                        <a href="{{ url('login') }}" class="btn btn-warning">Checkout</a>
                        {{-- Login with Google --}}
                @else
                <a href="{{ url('billing') }}" class="btn btn-warning">Checkout</a>
                 @endguest
            </td>
        </tr>
    </tfoot>
</table>
    </section>
</main>
@endsection

