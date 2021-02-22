@extends('admin.layouts.app')

@section('content')
<div class="row">
  	<div class="col-md-12">
      <!-- form start -->
      <form action="{{url('admin/product/'.$product->id.'/update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}

      	<div class="card">
        	<div class="card-header">
          	<h3 class="card-title">Update Product</h3>
        	</div>
          
          <div class="card-body">
            @if ($errors->all())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <div class="form-group">
              <label for="prod_name">Product Name</label>
              <input type="text" class="form-control" name="prod_name" placeholder="Enter Product Name" value="{{ $product->name }}">
            </div>
            <div class="form-group">
              <label for="prod_price">Price</label>
              <input type="text" class="form-control" name="prod_price" placeholder="Enter Price" value="{{ $product->price }}">
            </div>
            <div class="form-group">
              <label for="prod_discount_percentage">Discount (in %)</label>
              <input type="text" class="form-control" name="prod_discount_percentage" placeholder="Enter Discount (in %)" value="{{ $product->discount_percentage }}">
            </div>
            <div class="form-group">
              <label for="prod_description">Description</label>
              <textarea class="form-control" name="prod_description" rows="3" placeholder="Enter Text Here ...">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
              <label for="prod_image">Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="prod_image" id="customFile">
                </div>
              </div>
              <div>
                <img src="{{ config('app.url') }}/product_images/{{ $product->image }}" width="100px" height="100px">
              </div>
            </div>
          </div>
          <!-- /.card-body -->
              
    			<div class="card-footer clearfix" style="text-align: right;">
    				<button type="submit" name="add_product" value="Add" class="btn btn-primary">Submit</button>
    			</div>
    		</div>
      </form>
	</div>
</div>
@endsection
