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
					<h5>{{$title}}</h5>
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
				<div class="col-md-12">
					<!-- general form elements -->
					<div class="card card-secondary">
						<div class="card-header">
							<div class="row">
								<div class="col-sm-11">
									<h5>Edit {{$title}}</h5>
								</div>
							</div>
						</div>
						<!-- /.card-header -->

						@foreach($menu as $m)
						<!-- form start -->
						{!! Form::open(['url' => 'admin/updatemenu/'.$m->id, 'method' => 'post']) !!}
						@method('patch')
						@csrf

						<div class="card-body">

							<div class="form-group">
								{{Form::label('exampleInputTitle', 'Title')}}

								{{Form::input('text', 'title', $m->title, ['class' => 'form-control'])}}


								@error('title')
								<span class="text-danger" role="alert">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group">
								{{Form::label('exampleInputIcon', 'Icon')}}

								{{Form::input('text', 'icon', $m->icon, ['class' => 'form-control'])}}


								@error('icon')
								<span class="text-danger" role="alert">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group">
								{{Form::label('exampleInputDropdown', 'Dropdown')}}

								{{Form::select('dropdown', ['Ya' => 'Ya', 'Tidak' => 'Tidak'], $m->dropdown, ['class' => 'form-select', 'placeholder' => 'Choose'])}}

								@error('dropdown')
								<span class="text-danger" role="alert">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group">
								{{Form::label('exampleInputLink', 'Link')}}

								{{Form::input('text', 'link', $m->link, ['class' => 'form-control'])}}


								@error('link')
								<span class="text-danger" role="alert">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group">
								{{Form::label('exampleInputPlacement', 'Placement')}}

								{{Form::select('placement', ['Superadmin' => 'Superadmin', 'Admin' => 'Admin'], $m->placement, ['class' => 'form-select', 'placeholder' => 'Choose'])}}

								@error('placement')
								<span class="text-danger" role="alert">{{ $message }}</span>
								@enderror
							</div>	
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<a href="{{route('admin/menu')}}" class="btn bg-secondary">Back</a>
							<button type="submit" class="btn btn-dark-blue">Update</button>
						</div>
						@endforeach
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
