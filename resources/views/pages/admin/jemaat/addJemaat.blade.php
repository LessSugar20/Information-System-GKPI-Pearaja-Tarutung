@extends('layouts.admin.master')
@section('title', 'Dashboard')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assetss/js/vendor/forms/selects/select2.min.js')}}"></script>
<script src="{{asset('assetss/demo/pages/form_select2.js')}}"></script>
<script src="{{asset('assetss/js/jquery/jquery.min.js')}}"></script>
@section('content')
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
                                          <span class="breadcrumb-item active">Tambah Data Jemaat</span>
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

                     <!-- Main charts -->
                     <div class="row">
                            <div class="col-xl-7">

                            </div>
                            
                            <div class="col-xl-5">
                                   
                            </div>
                     </div>
                     <!-- /main charts -->
                     
                     

                     <!-- Dashboard content -->
                     <div class="card">
                         <div class="card-header">
                              @if ($jem->id)
                              <h5 class="mb-0">Edit Jemaat</h5>
                              @else
                                  
                              <h5 class="mb-0">Tambah Jemaat</h5>
                              @endif
                         </div>                        

                         <div class="card-body border-top">
                             @if ($jem->id)
                                   @if (Auth::user()->hasrole('admin'))
                                   <form action="{{route('admin.jemaat.update', $jem->id)}}" method="POST">          
                                   @else
                                   <form action="{{route('sek.jemaat.update', $jem->id)}}" method="POST">                                        
                                   @endif
                                   @csrf
                                   @method('PATCH')
                                   <div class="mb-3">
                                        <label class="col-form-label col-lg-3">Nomor Induk</label>
                                        <div class="form-control-feedback">
                                             <select name="no_induk" class="form-control select @error('no_induk') is-invalid @enderror">
                                                  <option value="" selected disabled>Nomor Induk</option>
                                                  @foreach ($kel as $k)
                                                       <option value="{{$k->id}}" {{$k->id==$jem->no_induk?"selected":""}}>{{$k->id}}</option>
                                                  @endforeach             
                                             </select>
                                             @error('no_induk')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Nomor Induk!',
                                                            'error'
                                                       )
                                                   </script>
                                          @enderror
                                        </div>
                                   </div>

                                   <div class="mb-3">
                                        <label class="form-label">Nama </label>
                                        <input type="text" value="{{$jem->nama}}" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama">
                                        @error('nama')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Nama!',
                                                            'error'
                                                       )
                                                   </script>
                                          @enderror
                                   </div>

                                   <div class="mb-3">
                                        <label class="form-label">Status</label>
                                             <select name="status" class="form-control form-control-select2 @error('status') is-invalid @enderror">                                                                                     
                                                  <option value="aktif" {{$jem->kategori == "aktif"?"selected":""}}>Aktif</option>    
                                                  <option value="non-aktif" {{$jem->kategori == "non-aktif"?"selected":""}}>Non-Aktif</option>                                             
                                             </select>
                                             @error('status')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Status!',
                                                            'error'
                                                       )
                                                   </script>
                                          @enderror
                                   </div>

                                   <div class="mb-3">
                                        <label class="form-label">Tempat Lahir </label>
                                        <input type="text" value="{{$jem->tempat_lahir}}" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Tempat Lahir">
                                        @error('tempat_lahir')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Tempat Lahir!',
                                                            'error'
                                                       )
                                                   </script>
                                          @enderror
                                   </div>
                                   
                                   <div class="mb-3">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" value="{{$jem->tgl_lahir}}" class="form-control @error('tgl_lahir') is-invalid @enderror" placeholder="Tanggal Lahir">
                                        @error('tgl_lahir')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Tanggal Lahir!',
                                                            'error'
                                                       )
                                                   </script>
                                          @enderror
                                   </div>

                                   <div class="mb-3">
                                        <label class="form-label">Tanggal Baptis </label>
                                        <input type="date" name="baptis" value="{{$jem->baptis}}" class="form-control @error('baptis') is-invalid @enderror" placeholder="">
                                        @error('baptis')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Tanggal Baptis!',
                                                            'error'
                                                       )
                                                   </script>
                                          @enderror
                                   </div>
                                   <div class="mb-3">
                                        <label class="form-label">Tanggal Sidi</label>
                                        <input type="date" value="{{$jem->sidi}}" name="sidi" class="form-control" placeholder="">
                                   </div>
                                   <div class="mb-3">
                                        <label class="form-label">Tanggal Nikah</label>
                                        <input type="date" value="{{$jem->nikah}}" name="nikah" class="form-control" placeholder="">
                                   </div>
                                   <div class="mb-3">
                                        <label class="form-label">Pindah Tanggal </label>
                                        <input type="date" value="{{$jem->pindah_tgl}}" name="pindah_tgl" class="form-control" placeholder="">
                                   </div>
                                   
                                   <div class="mb-3">
                                        <label class="form-label">Meninggal</label>
                                        <input type="date" value="{{$jem->meinggal}}" name="meninggal" class="form-control" placeholder="">
                                   </div>
                                   <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Submit form <i class="ph-paper-plane-tilt ms-2"></i></button>
                                   </div>
                                   </form> 
                              @else
                                   @if (Auth::user()->hasrole('admin'))
                                   <form action="{{route('admin.jemaat.store')}}" method="POST">     
                                   @else
                                   <form action="{{route('sek.jemaat.store')}}" method="POST">                                        
                                   @endif
                                   @csrf
                                   <div class="mb-3">
                                        <label class="col-form-label col-lg-3">Nomor Induk <span class="text-danger">*</span></label>
                                        <div class="form-control-feedback">
                                             <select name="no_induk" class="form-control select @error('no_induk') is-invalid @enderror">
                                                  <option value="" selected disabled>Nomor Induk</option>
                                                  @foreach ($kel as $k)
                                                       <option value="{{$k->id}}" {{$k->id==$jem->no_induk?"selected":""}}>{{$k->id}}</option>
                                                  @endforeach             
                                             </select>
                                             @error('no_induk')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Nomor Induk!',
                                                            'error'
                                                       )
                                                   </script>
                                          @enderror
                                        </div>
                                   </div>
                                   <div class="mb-3">
                                        <label class="form-label">Nama <span class="text-danger">*</span></label>
                                        <input type="text" value="{{$jem->nama}}" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama">
                                        @error('nama')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Nama!',
                                                            'error'
                                                       )
                                                   </script>
                                          @enderror
                                   </div>
                                   <div class="mb-3">
                                        <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                                        <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Tempat Lahir">
                                        @error('tempat_lahir')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Tempat Lahir!',
                                                            'error'
                                                       )
                                                   </script>
                                          @enderror
                                   </div>
                                   
                                   <div class="mb-3">
                                        <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                        <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" placeholder="Tanggal Lahir">
                                        @error('tgl_lahir')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Tanggal Lahir!',
                                                            'error'
                                                       )
                                                   </script>
                                          @enderror
                                   </div>

                                   <div class="mb-3">
                                        <label class="form-label">Tanggal Baptis <span class="text-danger">*</span></label>
                                        <input type="date" name="baptis" class="form-control @error('baptis') is-invalid @enderror" placeholder="">
                                        @error('baptis')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Tanggal Baptis!',
                                                            'error'
                                                       )
                                                   </script>
                                          @enderror
                                   </div>
                                   <div class="mb-3">
                                        <label class="form-label">Tanggal Sidi </label>
                                        <input type="date" name="sidi" class="form-control " placeholder="">
                                   </div>
                                   <div class="mb-3">
                                        <label class="form-label">Tanggal Nikah</label>
                                        <input type="date" name="nikah" class="form-control" placeholder="">
                                   </div>
                                   <div class="mb-3">
                                        <label class="form-label">Pindah Tanggal </label>
                                        <input type="date" name="pindah_tgl" class="form-control" placeholder="">
                                   </div>
                                   
                                   <div class="mb-3">
                                        <label class="form-label">Meninggal</label>
                                        <input type="date" name="meninggal" class="form-control" placeholder="">
                                   </div>
                                   <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Submit form <i class="ph-paper-plane-tilt ms-2"></i></button>
                                   </div>
                                   </form>
                             @endif
                         </div>
                    </div>
                     <!-- /dashboard content -->

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