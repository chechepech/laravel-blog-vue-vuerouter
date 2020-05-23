@extends('layout')
@section('content')
	<section class="pages container">
		<div class="page page-about">
			<h1 class="text-capitalize">Access Denied</h1>
			<p><em>You are not authorized to access this page</em><br/>
			<span style="color: red;">{{$exception->getMessage()}}</span>
			<br/><a class="btn btn-link" href="{{url()->previous()}}">Back</a>
			</p>
		</div>
	</section>
@endsection