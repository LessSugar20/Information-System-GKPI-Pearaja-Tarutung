@extends('layouts.admin.master')
@section('title', 'Jadwal')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assetss/js/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assetss/demo/demo_configurator.js')}}"></script>
<script src="{{asset('assetss/js/app.js')}}"></script>
<script src="{{asset('assetss/js/bootstrap/bootstrap.bundle.min.jss')}}"></script>
<link href="{{asset('assetss/fonts/inter/inter.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assetss/icons/phosphor/styles.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assetss/css/all.min.css')}}" id="stylesheet" rel="stylesheet" type="text/css">
<script src="{{asset('assetss/demo/pages/datatables_basic.js')}}"></script>     
<script src="{{asset('assetss/js/vendor/tables/datatables/datatables.min.js')}}"></script>
@section('content')
<!-- Main content -->
{{-- <div class="content-wrapper"> --}}
     <div class="page-content">


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Page header -->
				<div class="page-header page-header-light shadow">
					<div class="page-header-content d-lg-flex">
						

						
					</div>

					<div class="page-header-content d-lg-flex border-top py-1">
						<div class="d-flex">
							<div class="breadcrumb py-2">
								@hasrole('admin')
								<a href="{{url('admin/')}}" class="breadcrumb-item"><i class="ph-house"></i></a>
								@else
								<a href="{{url('sek/')}}" class="breadcrumb-item"><i class="ph-house"></i></a>
								@endhasrole
								<span href="#" class="breadcrumb-item">Jemaat</span>
								<span class="breadcrumb-item active">Jadwal Ibadah & Partangiangan</span>
							</div>

							<a href="#breadcrumb_elements" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
								<i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
							</a>
						</div>

						<div class="collapse d-lg-block ms-lg-auto" id="breadcrumb_elements">
							<div class="d-lg-flex mb-2 mb-lg-0">
									
							</div>
						</div>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="card">
						<div class="card-header row">
							<h5 class="col mt-1 mb-0">Jadwal Ibadah</h5>
							
							@hasrole('admin')
							   <div class="col mb-0 text-end">
								   <a href="{{url('admin/jemaat/jadwal/ibadah/create')}}" class="btn btn-info text-nowrap">
									  <i class="ph-plus me-2"></i>
									  Tambah Jadwal
								   </a>
							    </div>
							   @else
							   <div class="col mb-0 text-end">
								   <a href="{{url('sek/jemaat/jadwal/ibadah/create')}}" class="btn btn-info text-nowrap">
									  <i class="ph-plus me-2"></i>
									  Tambah Jadwal
								   </a>
							    </div>
							   @endhasrole
						</div>

						<table class="table datatable-basic">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Tanggal</th>
									<th class="text-center col-3">Tata Acara</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($i as $item)
								    
								<tr>
									<td>{{$x++}}</td>
									<td class="text-capitalize">{{$item->nama}}</td>
									<td>{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM Y') }}</td>
									<td class="text-center">
										@if (Auth::user()->hasrole('admin'))
										<a type="button" class="btn btn-secondary btn-icon" href="{{route('admin.ibadah.show', $item->id)}}">
											<span>
												<i class="ph-download-simple me-2"></i>
												Unduh
											</span>
										</a>
										@else
										<a type="button" class="btn btn-secondary btn-icon" href="{{route('sek.ibadah.show', $item->id)}}">
											<span>
												<i class="ph-download-simple me-2"></i>
												Unduh
											</span>
										</a>										
										@endif
									</td>									
									<td class="text-center">
										@if (Auth::user()->hasrole('admin'))
										<form action="{{route('admin.ibadah.destroy', $item->id)}}" method="POST">
										@else
										<form action="{{route('sek.ibadah.destroy', $item->id)}}" method="POST">										
										@endif
											@csrf
											@method('DELETE')
											@if (Auth::user()->hasrole('admin'))
											<a type="button" method="GET" href="{{route('admin.ibadah.edit', $item->id)}}" data-bs-popup="tooltip" title="Edit" class="btn btn-warning btn-icon" style="margin-bottom: -1rem">
												<i class="ph-note-pencil"></i>
											</a>
											@else
											<a type="button" method="GET" href="{{route('sek.ibadah.edit', $item->id)}}" data-bs-popup="tooltip" title="Edit" class="btn btn-warning btn-icon" style="margin-bottom: -1rem">
												<i class="ph-note-pencil"></i>
											</a>											
											@endif
											<button type="submit" href="" data-bs-popup="tooltip" title="Delete" class="btn btn-danger btn-icon" style="margin-bottom: -1rem">
												<i class="ph-trash"></i>
											</button>
										</form>
									</td>
								</tr>								
								@endforeach
							</tbody>
						</table>
						
					</div>
					<div class="card">
						<div class="card-header row">
							<h5 class="col mt-1 mb-0">Jadwal Partangiangan</h5>
							
							@hasrole('admin')
							   <div class="col mb-0 text-end">
								   <a href="{{url('admin/jemaat/jadwal/partangiangan/create')}}" class="btn btn-info text-nowrap">
									  <i class="ph-plus me-2"></i>
									  Tambah Jadwal
								   </a>
							    </div>
							   @else
							   <div class="col mb-0 text-end">
								   <a href="{{url('sek/jemaat/jadwal/partangiangan/create')}}" class="btn btn-info text-nowrap">
									  <i class="ph-plus me-2"></i>
									  Tambah Jadwal
								   </a>
							    </div>
							   @endhasrole
						</div>

						<table class="table datatable-basic">
							<thead>
								<tr>
									<th>No</th>
									<th>Sektor</th>
									<th>Tanggal</th>
									<th>Keluarga</th>
									<th>Alamat</th>
									<th>Tata Acara</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($p as $item)
								    
								<tr>
									<td>{{$item->id}}</td>
									<td class="text-capitalize">{{$item->sektor}}</td>
									<td>{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM Y') }}</td>
									<td class="text-capitalize">{{$item->keluarga}}</td>
									<td class="text-capitalize text-justify">{{$item->alamat}}</td>
									<td>
										@if (Auth::user()->hasrole('admin'))
										<a type="button" class="btn btn-secondary btn-icon" href="{{route('admin.partangiangan.show', $item->id)}}">
											<span>
												<i class="ph-download-simple"></i>											
											</span>
										</a>
										@else
										<a type="button" class="btn btn-secondary btn-icon" href="{{route('sek.partangiangan.show', $item->id)}}">
											<span>
												<i class="ph-download-simple"></i>											
											</span>
										</a>											
										@endif
									</td>
									<td class="text-center">
										@if (Auth::user()->hasrole('admin'))
										<form action="{{route('admin.partangiangan.destroy', $item->id)}}" method="POST">
										@else
										<form action="{{route('sek.partangiangan.destroy', $item->id)}}" method="POST">											
										@endif
											@csrf
											@method('DELETE')
											@if (Auth::user()->hasrole('admin'))
											<a type="button" method="GET" href="{{route('admin.partangiangan.edit', $item->id)}}" data-bs-popup="tooltip" title="Edit" class="btn btn-warning btn-icon" style="margin-bottom: -1rem">
												<i class="ph-note-pencil"></i>
											</a>
											@else
											<a type="button" method="GET" href="{{route('sek.partangiangan.edit', $item->id)}}" data-bs-popup="tooltip" title="Edit" class="btn btn-warning btn-icon" style="margin-bottom: -1rem">
												<i class="ph-note-pencil"></i>
											</a>												
											@endif
											<button type="submit" href="" data-bs-popup="tooltip" title="Delete" class="btn btn-danger btn-icon" style="margin-bottom: -1rem">
												<i class="ph-trash"></i>
											</button>
										</form>
									</td>
								</tr>
								@endforeach
								
								
							</tbody>
						</table>
						
					</div>
					<!-- /basic datatable -->
				</div>
				<!-- /content area -->


				<!-- Footer -->
				<div class="navbar navbar-sm navbar-footer border-top">
					<div class="container-fluid">
						<span>&copy; 2023 GKPI Pearaja Tarutung</span>
						
					</div>
				</div>
				<!-- /footer -->

			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>

{{-- </div> --}}
@endsection
<!-- /main content -->
@section('custom_js')
<script type="text/javascript">
     @if(session()->has('success'))
		Swal.fire(
			'Berhasil!',
			'{{session('success')}}',
			'success'
		)
	@endif
	@if(session()->has('error'))
		Swal.fire(
			'Gagal!',
			'{{session('error')}}',
			'error'
		)
	@endif
	@if(session()->has('sdelete'))
		Swal.fire(
			'Berhasil!',
			'{{session('sdelete')}}',
			'success'
		)
	@endif
</script>
@endsection