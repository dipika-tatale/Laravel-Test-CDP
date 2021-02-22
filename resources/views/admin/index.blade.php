@extends('admin.layouts.app')

@section('content')
<div style="text-align: center; margin-top: 20%;">
    <h1>Welcome On Board</h1>
    <h1>{{ Auth::guard('admin')->user()->name }}</h1>
</div>
@endsection
