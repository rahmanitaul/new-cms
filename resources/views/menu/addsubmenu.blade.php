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
				<div class="col-md-10">
					<!-- general form elements -->
					<div class="card card-secondary">
						<div class="card-header">
							<div class="row">	
								<div class="col-sm-9">
									<h5>Add {{$title}}</h5>
								</div>
							</div>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						{!! Form::open(['route' => 'admin/insertsubmenu', 'method' => 'post']) !!}
						@csrf

						<div class="card-body">
							<div class="form-group">
								{{Form::label('exampleInputMenu', 'Menu')}}

								{{Form::select('menu_id', $select_menu, $id_menu->id, ['class' => 'form-control', 'placeholder' => 'Choose', 'required' => 'required'])}}

								@error('menu_id')
								<span class="text-danger" role="alert">{{ $message }}</span>
								@enderror
							</div>

							<div class="form-group">
								{{Form::label('exampleInputSize', 'Title')}}

								{{Form::input('text', 'title', null, ['class' => 'form-control', 'required' => 'required'])}}


								@error('title')
								<span class="text-danger" role="alert">{{ $message }}</span>
								@enderror
							</div>

							<div class="form-group">
								{{Form::label('exampleInputPlacement', 'Placement')}}

								{{Form::select('placement', ['Superadmin' => 'Superadmin', 'Admin' => 'Admin'], $id_menu->placement, ['class' => 'form-control', 'placeholder' => 'Choose', 'required' => 'required'])}}

								@error('placement')
								<span class="text-danger" role="alert">{{ $message }}</span>
								@enderror
							</div>

							<div class="form-group">
								{{Form::label('exampleInputLink', 'Link')}}

								{{Form::input('text', 'link', null, ['class' => 'form-control', 'required' => 'required'])}}

								@error('link')
								<span class="text-danger" role="alert">{{ $message }}</span>
								@enderror
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<a href="{{url('admin/submenu/'.$id_menu->id)}}" class="btn bg-secondary">Back</a>
							<button type="submit" class="btn btn-dark-blue">Save</button>
						</div>
					</form>
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
