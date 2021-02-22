@extends('layouts.app')

<style type="text/css">
    .card {
        width: 210px;
        height: auto;
        margin: 2px;
    }

    .card-img-overlay {
      position: relative !important;
      padding: 0 !important;
    }

    .product_view {
      grid-template-columns: repeat(5, 1fr) !important;
    }

    svg {
      height: 15px;
    }

    .flex-1 {
      display: none;
    }

    .card-img {
      width: 208px;
      height: 208px;
    }
</style>

@section('content')
<div class="container">
    <div class="product_view" style="display: inline-grid;">
      @if(isset($products) && count($products) > 0)

        @foreach($products as $product_data)
        
          <div class="card">
            <div class="card-img-overlay d-flex justify-content-end">
              <img class="card-img" src="{{ config('app.url') }}/product_images/{{ $product_data->image }}" alt="Vans">
            </div>
            <div class="card-body">
              <h5 class="card-title">{{ $product_data->name }}</h5>
              
              <div class="buy d-flex justify-content-between align-items-center">
                <div class="price text-success"><h5 class="mt-4">${{ $product_data->price }}</h5></div>
                 <a href="#" class="btn btn-danger mt-3" style="cursor: pointer;"><i class="fas fa-shopping-cart"></i> Add </a>
              </div>
            </div>
          </div>
        
        @endforeach
      @else
        <p style="color: red;">No Products Found</p>
      @endif
    </div>

    <div class="row" style="float: right;margin-right: 26px;">
      <div class="col-md-12">
        {!! $products->render() !!}
      </div>
    </div>
</div>
@endsection
