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
			<div class="row mb-1">	
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
					<div class="alert alert-success alert-dismissible">
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
								<a href="{{route('admin/addmenu')}}" class="btn btn-dark-blue d-inline p-3 m-0">
									<i class="fas fa-plus mr-1"></i> Add Menu
								</a>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body table-responsive">
							<table id="table_id" class="table table-striped table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Title</th>
										<th>Icon</th>
										<th>Link</th>
										<th>Dropdown</th>
										<th>Placement</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

									<?php 

									$no = 1;
									foreach ($menu as $m) : ?>
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $m->title }}</td>
											<td>{{ $m->icon }}</td>
											<td>{{ $m->link }}</td>
											<td>{{ $m->dropdown }}</td>
											<td>{{ $m->placement }}</td>
											<td>
												<a href="{{ url('admin/submenu/'.$m->id) }}" class="btn btn-xs btn-default">
													<i class="fas fa-folder-open"></i>
												</a>
												<a href="{{ url('admin/editmenu/'.$m->id) }}" class="btn btn-xs btn-default">
													<i class="fas fa-edit"></i>
												</a>
												<form action="{{ url('admin/deletemenu/'.$m->id) }}" method="post" class="d-inline" onsubmit="return confirm('Sure You Want To Delete?');">
													@method('delete')
													@csrf

													<button class="btn btn-xs btn-default"><i class="fas fa-trash"></i></button>
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

