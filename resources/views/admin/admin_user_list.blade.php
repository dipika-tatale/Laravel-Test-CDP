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
	        	<h3 class="card-title">Admin Users</h3>
	      	</div>

			<!-- /.card-header -->
			<div class="card-body">
				<table class="table table-bordered">
				  <thead>
				    <tr>
				      <th style="width: 10px">ID</th>
				      <th style="width: 35px">Name</th>
				      <th style="width: 10px">Email</th>
				      <th style="width: 10px">Status</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($admin_users as $admin_user_data)
				    <tr>
				      <td style="width: 10px">{{ $admin_user_data->id }}</td>
				      <td style="width: 35px">{{ $admin_user_data->name }}</td>
				      <td style="width: 10px">{{ $admin_user_data->email }}</td>
				      <td style="width: 10px">
				      	@if((int) $admin_user_data->status == 1)
				      	<span style="color: green;">{{ $admin_user_data->status_name }}</span>
				      	@else
				      	<span style="color: red;">{{ $admin_user_data->status_name }}</span>
				      	@endif
				      </td>
				    </tr>
				    @endforeach
				  </tbody>
				</table>
			</div>
			<!-- /.card-body -->

			<div class="card-footer clearfix" style="text-align: right;">
				{!! $admin_users->render() !!}
			</div>
		</div>
	</div>
</div>
@endsection
