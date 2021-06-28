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
				<div class="col-12">
					@if (session('message'))
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong><i class="icon fas fa-check"></i> {{session('message')}}</strong>
					</div>
					@endif
					<div class="card">
						<div class="card-header">
							<div class="card-title d-inline mt-2">
								<strong><h4>{{$title}} List</h4></strong>
							</div>
							<div align="right" class="mt-4">
								<a href="{{route('admin/addpage')}}" class="btn btn-dark-blue d-inline p-3 m-0">
									<i class="fas fa-plus mr-1"></i> Add {{$title}}
								</a>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body table-responsive">
							<table id="table_id" class="table table-striped table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Menu</th>
										<th>Submenu</th>
										<th>Meta Fields</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

									<?php 

									$no = 1;
									foreach ($page as $p) : ?>
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $p->menu_title }}</td>

											@if($p->submenu_id == NULL)

												
												@php $submenu_title = 'No Submenu'; @endphp
												<td class="text-danger">{{ $submenu_title }}</td>

											@else
												
												@php $submenu_title = $p->submenu_title; @endphp
												<td>{{ $submenu_title }}</td>

											@endif

											<td>{{ $p->meta_fields }}</td>
											<td style="width: 240px;">
												<a href="{{ url('admin/detailpage/'.$p->id) }}" class="btn btn-blue">
													Detail Page
												</a>
												<a href="{{ url('admin/editpage/'.$p->id) }}" class="btn btn-dark-blue">
													Edit
												</a>
												<form action="{{ url('admin/deletepage/'.$p->id) }}" method="post" class="d-inline" onsubmit="return confirm('Sure You Want To Delete?');">
													@method('delete')
													@csrf

													<button class="btn btn-red">Delete</button>
												</form>
											</td>
										</tr>
									<?php endforeach ?>

								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>

@endsection

