@extends('layouts.admin.master')
@section('title', 'Jemaat')
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
<script src="{{asset('assetss/js/vendor/tables/datatables/extensions/fixed_columns.min.js')}}"></script>
<script src="{{asset('assetss/demo/pages/datatables_extension_fixed_columns.js')}}"></script>
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
								<span class="breadcrumb-item active">Data Jemaat</span>
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
					<div class="card ">
						<div class="card-header row">
							<h5 class="col mt-1 mb-0 text-start">Data Keluarga</h5>
							<div class="col offset-lg-5 text-end text-nowrap">
								
						   	</div>
							   @hasrole('admin')
							   <div class="col mb-0 text-end">
								   <a href="{{url('admin/jemaat/keluarga/create')}}" class="btn btn-info text-nowrap">
									  <i class="ph-plus me-2"></i>
									  Tambah Keluarga
								   </a>
							    </div>
							   @else
							   <div class="col mb-0 text-end">
								   <a href="{{url('sek/jemaat/keluarga/create')}}" class="btn btn-info text-nowrap">
									  <i class="ph-plus me-2"></i>
									  Tambah Keluarga
								   </a>
							    </div>
							   @endhasrole
						</div>

						<table class="table datatable-fixed-both">
							<thead>
								<tr>
									<th class="col-1 border-bottom-1">No.Induk</th>
									<th class="wd-30p col-4 border-bottom-1">Ayah</th>
									<th class="wd-15p border-bottom-1">Ibu</th>
									<th class="wd-15p border-bottom-1">Sektor</th>
                                             <th class="wd-5p col-1 border-bottom-1">Pekerjaan Ayah</th>									
                                             <th class="wd-5p col-1 border-bottom-1">Pekerjaan Ibu</th>									
									<th class="wd-20p border-bottom-1">Masuk Tanggal</th>
                                             <th class="wd-20p border-bottom-1">Pindah Dari</th>
									<th class="wd-15p border-bottom-1">Pindah Tanggal</th>
                                             <th class="wd-15p border-bottom-1">Pindah Ke</th>
                                             <th class="wd-10p border-bottom-1" style="width: 20%">Actions</th>
								</tr>
							</thead>
							<tbody>
                                        @foreach ($kel as $k)
								<tr>
									<td class="col-1">{{$k->id}}</td>
									<td class="text-capitalize">{{$k->ayah}}</td>
									<td class="text-capitalize">{{$k->ibu}}</td>
									<td class="text-capitalize">{{$k->sektor}}</td>
									<td class="text-wrap col-1 text-capitalize">{{$k->pekerjaan_ayah}}</td>
                                             <td class="text-wrap col-1 text-capitalize">{{$k->pekerjaan_ibu}}</td>
									<td class="text-capitalize">{{ \Carbon\Carbon::parse($k->masuk_tgl)->isoFormat('D MMMM Y') }}</td>
									<td class="text-capitalize">{{$k->pindah_dari}}</td>
                                             @if($k->pindah_tgl == Null)
                                             <td>--</td>                                             
                                             @else
                                             <td class="text-capitalize">{{ \Carbon\Carbon::parse($k->pindah_tgl)->isoFormat('D MMMM Y') }}</td>                                             
                                             @endif
                                             @if($k->pindah_ke == Null)
                                             <td>--</td>                                             
                                             @else                                             
									<td class="text-capitalize">{{$k->pindah_ke}}</td>
                                             @endif                                             
                                             <td>
                                                  <div class="d-inline-flex ">
											@if (Auth::user()->hasrole('admin'))
											<form action="{{route('admin.keluarga.destroy', $k->id)}}" method="POST">
											@else
											<form action="{{route('sek.keluarga.destroy', $k->id)}}" method="POST">												
											@endif
												@csrf
												@method('DELETE')
												<a type="button" method="GET" href="{{route('jemaat_pdf', $k->id)}}" data-bs-popup="tooltip" title="Unduh" class="btn btn-secondary btn-icon" style="margin-bottom: -1rem">
													<i class="ph-file-pdf"></i>
												</a>		
												@if (Auth::user()->hasrole('admin'))
												<a type="button" method="GET" href="{{route('admin.keluarga.edit', $k->id)}}" data-bs-popup="tooltip" title="Edit" class="btn btn-warning btn-icon" style="margin-bottom: -1rem">
													<i class="ph-note-pencil"></i>
												</a>
												@else
												<a type="button" method="GET" href="{{route('sek.keluarga.edit', $k->id)}}" data-bs-popup="tooltip" title="Edit" class="btn btn-warning btn-icon" style="margin-bottom: -1rem">
													<i class="ph-note-pencil"></i>
												</a>													
												@endif
												<button type="submit" href="" data-bs-popup="tooltip" title="Delete" class="btn btn-danger btn-icon" style="margin-bottom: -1rem">
													<i class="ph-trash"></i>
												</button>
											</form>
										</div>     
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