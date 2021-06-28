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
						{!! Form::open(['route' => 'admin/insertpage', 'method' => 'post']) !!}
						@csrf

						<div class="card-body">
							<div class="form-group">
								{{Form::label('exampleInputMenu', 'Menu')}}

								{{Form::select('menu_id', $select_menu, null, ['class' => 'form-control', 'placeholder' => 'Choose'])}}

								@error('menu_id')
								<span class="text-danger" role="alert">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group">
								{{Form::label('exampleInputSubMenu', 'Sub Menu')}}

								{{Form::select('submenu_id', $select_submenu, null, ['class' => 'form-control', 'placeholder' => 'Choose'])}}

								@error('submenu_id')
								<span class="text-danger" role="alert">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group">
								{{Form::label('exampleInputPageType', 'Page Type')}}

								{{Form::select('type', ['Report' => 'Report', 'Form' => 'Form'], null, ['class' => 'form-control', 'placeholder' => 'Choose'])}}

								@error('type')
								<span class="text-danger" role="alert">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group">
								{{Form::label('exampleInputMetaFields', 'Meta Fields')}}

								{{Form::textarea('meta_fields', null, ['class' => 'form-control', 'rows' => '3'])}}

								@error('meta_fields')
								<span class="text-danger" role="alert">{{ $message }}</span>
								@enderror
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<a href="{{route('admin/page')}}" class="btn bg-secondary">Back</a>
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
