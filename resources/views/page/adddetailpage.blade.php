@extends('layouts.footer')
@extends('layouts.sidebar')
@extends('layouts.topbar')
@extends('layouts.header')

@section('title', $title)

@section('content_fill')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row">	
				<div class="col-sm-6">
					<h4><b>{{$title}}</b></h4>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">{{$title}}</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-10">
					<!-- general form elements -->
					<div class="card card-secondary">
						<div class="card-header">
							<div class="row">
								<div class="col-sm-11">
									<h5>Add {{$title}}</h5>
								</div>
							</div>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						{!! Form::open(['route' => 'admin/insertdetailpage', 'method' => 'post']) !!}
						@csrf

						<div class="card-body">

							{{Form::input('hidden', 'page_id', $page->id, ['class' => 'form-control'])}}

							<div class="form-group">
								{{Form::label('exampleInputPageType', 'Page Type')}}

								{{Form::select('type', ['Report' => 'Report', 'Form' => 'Form'], null, ['class' => 'form-control', 'placeholder' => 'Choose'])}}

								@error('type')
								<span class="text-danger" role="alert">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group">
								{{Form::label('exampleInputMethod', 'Method')}}

								{{Form::input('text', 'method', null, ['class' => 'form-control'])}}

								@error('method')
								<span class="text-danger" role="alert">{{ $message }}</span>
								@enderror
							</div>

							<div class="form-group">

								<?php 

								if ($page->meta_fields != '[""]'): ?>

									<?php $decode = json_decode($page->meta_fields); ?>

									<?php foreach($decode as $d) : ?>

										{{Form::label('exampleInputMeta', $d, ['class' => 'text-capitalize mt-1'])}}

										{{Form::select('meta['.$d.']', $select_type_field, null, ['class' => 'form-control mt-1 mb-3', 'placeholder' => 'Choose'])}}

									<?php endforeach ?> 

								<?php endif ?>	

								@error('meta')
								<span class="text-danger" role="alert">{{ $message }}</span>
								@enderror
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<a href="{{url('admin/detailpage/'.$page->id)}}" class="btn bg-secondary">Back</a>
							<button type="submit" class="btn btn-dark-blue">Save</button>
						</div>
						{!! Form::close() !!}
					</div>
					<!-- /.card -->
				</div>
				<!-- /.card -->
			</div>
			<!--/.col (right) -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
@endsection
