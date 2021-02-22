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
	        	<h3 class="card-title">Customers</h3>
	      	</div>

			      <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th style="width: 35px">Name</th>
                      <th style="width: 10px">Email Id</th>
                      <th style="width: 10px">Contact No</th>
                      <th style="width: 10px">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($customers as $customer_data)
                    <tr>
                      <td style="width: 10px">{{ $customer_data->id }}</td>
                      <td style="width: 35px">{{ $customer_data->first_name }} {{ $customer_data->last_name }}</td>
                      <td style="width: 10px">{{ $customer_data->email }}</td>
                      <td style="width: 10px">{{ $customer_data->contact_no }}</td>
                      <td style="width: 10px">
                      @if((int) $customer_data->status == 1)
                      <span style="color: green;">{{ $customer_data->status_name }}</span>
                      @else
                      <span style="color: red;">{{ $customer_data->status_name }}</span>
                      @endif
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            <!-- /.card-body -->

			<div class="card-footer clearfix" style="text-align: right;">
				{!! $customers->render() !!}
			</div>
		</div>
	</div>
</div>
@endsection
