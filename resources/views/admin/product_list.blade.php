@extends('admin.layouts.app')

<style type="text/css">
    svg {
      height: 15px;
    }

    .flex-1 {
      display: none;
    }
</style>

@section('content')
<div class="row">
  	<div class="col-md-12">
    	<div class="card">
	      	<div class="card-header">
	        	<h3 class="card-title">Product Master</h3>
	      	</div>

          @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p>{{ session('status') }}</p>
                
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          @endif

			<!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th style="width: 15px">Image</th>
                      <th style="width: 35px">Product Name</th>
                      <th style="width: 10px">Price</th>
                      <th style="width: 10px">Discount (in %)</th>
                      <th style="width: 10px">Status</th>
                      <th style="width: 20px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product_data)
                    <tr>
                      <td style="width: 10px">{{ $product_data->id }}</td>
                      <td style="width: 15px" align="center"><img src="{{ config('app.url') }}/product_images/{{ $product_data->image }}" width="45px" height="45px"></td>
                      <td style="width: 35px">{{ $product_data->name }}</td>
                      <td style="width: 10px">
                        ${{ $product_data->price }}
                      </td>
                      <td style="width: 10px">@if(!empty($product_data->discount_percentage)) {{ $product_data->discount_percentage }}% @else - @endif</td>
                      <td style="width: 10px">
                      @if((int) $product_data->status == 1)
                      <span style="color: green;">{{ $product_data->status_name }}</span>
                      @else
                      <span style="color: red;">{{ $product_data->status_name }}</span>
                      @endif
                      </td>
                      <td style="width: 20px">
                        <a href="{{ config('app.url') }}/admin/product/{{ $product_data->id }}/edit" title="edit" style="margin-left: 10px;">
                          <i class="fa fa-pencil-alt"></i>
                        </a>

                        <!-- form start -->
                        <form action="{{url('admin/product/'.$product_data->id.'/delete')}}" method="post" name="product_delete_form_{{ $product_data->id }}" style="float: right;">
                          {{csrf_field()}}
                          
                        <a href="javascript:void(0)" title="delete" style="color: red;margin-right: 33px;" onclick="javascript: document.product_delete_form_{{ $product_data->id }}.submit();">
                          <i class="fa fa-trash-alt"></i>
                        </a>
                        </form>

                        <!-- form start -->
                        <form action="{{url('admin/product/'.$product_data->id.'/status')}}" method="post" name="product_status_form_{{ $product_data->id }}" style="float: right;">
                          {{csrf_field()}}

                          @if((int) $product_data->status == 1)
                          <input type="hidden" name="product_status_{{ $product_data->id }}" value="0">

                          <a href="javascript:void(0)" title="change status" style="color: green;margin-right: 16px;font-size: 18px;" onclick="javascript: document.product_status_form_{{ $product_data->id }}.submit();">
                            <i class="fa fa-check-circle"></i>
                          </a>
                          @else
                          <input type="hidden" name="product_status_{{ $product_data->id }}" value="1">

                          <a href="javascript:void(0)" title="change status" style="color: red;margin-right: 16px;font-size: 18px;" onclick="javascript: document.product_status_form_{{ $product_data->id }}.submit();">
                            <i class="fa fa-ban"></i>
                          </a>
                          @endif
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            <!-- /.card-body -->

			<div class="card-footer clearfix" style="text-align: right;">
				{!! $products->render() !!}
			</div>
		</div>
	</div>
</div>
@endsection
