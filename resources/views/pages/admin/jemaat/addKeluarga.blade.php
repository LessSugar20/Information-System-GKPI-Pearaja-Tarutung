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
                              @if($kel->id)
                              <h5 class="mb-0">Edit Keluarga</h5>
                              @else
                              <h5 class="mb-0">Tambah Keluarga</h5>

                              @endif
                         </div>                        

                         <div class="card-body border-top">
                              @if ($kel->id)
                                   @if (Auth::user()->hasrole('admin'))
                                   <form action="{{route('admin.keluarga.update', $kel->id)}}" method="POST">                                             
                                   @else
                                   <form action="{{route('sek.keluarga.update', $kel->id)}}" method="POST">                                        
                                   @endif
                                        @csrf
                                        @method('PATCH')
                                        <div class="mb-3">
                                             <label class="form-label">Nomor Induk <span class="text-danger">*</span></label>
                                             <input type="Number" name="id" value="{{$kel->id}}" class="form-control @error('id') is-invalid @enderror" placeholder="Nomor Induk" autofocus>
                                             @error('id')                                                               
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

                                        <div class="mb-3">
                                             <label class="form-label">Ayah <span class="text-danger">*</span></label>
                                             <input type="text" name="ayah" value="{{$kel->ayah}}" class="form-control @error('ayah') is-invalid @enderror" placeholder="Nama Ayah">
                                             @error('ayah')                                                               
                                                  <div class="invalid-feedback">{{$message}}</div>
                                                       <script>
                                                       Swal.fire(
                                                                 'Gagal!',
                                                                 'Silahkan input Nama Ayah!',
                                                                 'error'
                                                            )
                                                       </script>
                                             @enderror
                                        </div>

                                        <div class="mb-3">
                                             <label class="form-label">Ibu <span class="text-danger">*</span></label>
                                             <input type="text" name="ibu" value="{{$kel->ibu}}" class="form-control @error('ibu') is-invalid @enderror" placeholder="Nama Ibu">
                                             @error('ibu')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Nama Ibu!',
                                                            'error'
                                                       )
                                                   </script>
                                             @enderror
                                        </div>

                                        <div class="mb-3">
                                             <label class="col-form-label col-lg-3">Sektor <span class="text-danger">*</span></label>
                                             <div class="form-control-feedback">
                                                  <select name="sektor" class="form-control select @error('sektor') is-invalid @enderror">
                                                       <option value="" selected disabled>Pilih Sektor</option>
                                                       @foreach ($sek as $s)
                                                            <option value="{{$s->nama}}" {{$s->nama==$kel->sektor?"selected":""}}>{{ucfirst($s->nama)}}</option>
                                                       @endforeach             
                                                  </select>
                                                  @error('sektor')                                                               
                                                  <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan pilih Sektor!',
                                                            'error'
                                                       )
                                                   </script>
                                                  @enderror
                                             </div>
                                        </div>
          
                                        
                                        <div class="mb-3">
                                             <label class="form-label">Pekerjaan Ayah <span class="text-danger">*</span></label>
                                             <input type="text" name="pekerjaan_ayah" value="{{$kel->pekerjaan_ayah}}" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" placeholder="Pekerjaan Ayah">
                                             @error('pekerjaan_ayah')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Pekerjaan Ayah!',
                                                            'error'
                                                       )
                                                   </script>
                                             @enderror
                                        </div>

                                        <div class="mb-3">
                                             <label class="form-label">Pekerjaan Ibu <span class="text-danger">*</span></label>
                                             <input type="text" name="pekerjaan_ibu" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" value="{{$kel->pekerjaan_ibu}}" placeholder="Pekerjaan Ibu">
                                             @error('pekerjaan_ibu')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Pekerjaan Ibu!',
                                                            'error'
                                                       )
                                                   </script>
                                             @enderror
                                        </div>
                                        <div class="mb-3">
                                             <label class="form-label">Masuk Tanggal <span class="text-danger">*</span></label>
                                             <input type="date" name="masuk_tgl" class="form-control @error('masuk_tgl') is-invalid @enderror" value="{{$kel->masuk_tgl}}" placeholder="">
                                             @error('masuk_tgl')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Tanggal Masuk!',
                                                            'error'
                                                       )
                                                   </script>
                                             @enderror
                                        </div>
                                        <div class="mb-3">
                                             <label class="form-label">Pindah Tanggal </label>
                                             <input type="date" name="pindah_tgl" class="form-control" value="{{$kel->pindah_tgl}}" placeholder="Pekerjaan Ibu">
                                        </div>
                                        
                                        <div class="mb-3">
                                             <label class="form-label">Pindah Dari</label>
                                             <input type="text" name="pindah_dari" class="form-control" value="{{$kel->pindah_dari}}" placeholder="Pindah Dari">
                                        </div>
                                        <div class="mb-3">
                                             <label class="form-label">Pindah Ke</label>
                                             <input type="text" name="pindah_ke" class="form-control" value="{{$kel->pindah_ke}}" placeholder="Pindah Ke">
                                        </div>
                                        <div class="text-end">
                                             <button type="submit" class="btn btn-primary">Submit form <i class="ph-paper-plane-tilt ms-2"></i></button>
                                        </div>
                                   </form>
                              @else
                                   @if (Auth::user()->hasrole('admin'))
                                   <form action="{{route('admin.keluarga.store')}}" method="POST">     
                                   @else
                                   <form action="{{route('sek.keluarga.store')}}" method="POST">                                        
                                   @endif
                                        @csrf
                                        <div class="mb-3">
                                             <label class="form-label">Nomor Induk <span class="text-danger">*</span></label>
                                             <input type="Number" name="id" class="form-control @error('id') is-invalid @enderror" placeholder="Nomor Induk" autofocus>
                                             @error('id')                                                               
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

                                        <div class="mb-3">
                                             <label class="form-label">Ayah <span class="text-danger">*</span></label>
                                             <input type="text" name="ayah" class="form-control @error('ayah') is-invalid @enderror" placeholder="Nama Ayah">
                                             @error('ayah')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Nama Ayah!',
                                                            'error'
                                                       )
                                                   </script>
                                          @enderror
                                        </div>

                                        <div class="mb-3">
                                             <label class="form-label">Ibu <span class="text-danger">*</span></label>
                                             <input type="text" name="ibu" class="form-control @error('ibu') is-invalid @enderror" placeholder="Nama Ibu">
                                             @error('ibu')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Nama Ibu!',
                                                            'error'
                                                       )
                                                   </script>
                                          @enderror
                                        </div>
                                        <div class="mb-3">
                                             <label class="col-form-label col-lg-3">Sektor <span class="text-danger">*</span></label>
                                             <div class="form-control-feedback">
                                                  <select name="sektor" class="form-control select @error('sektor') is-invalid @enderror">
                                                       <option value="" selected disabled>Pilih Sektor</option>
                                                       @foreach ($sek as $s)
                                                            <option value="{{$s->nama}}" {{$s->id==$kel->sektor?"selected":""}}>{{$s->nama}}</option>
                                                       @endforeach             
                                                  </select>
                                                  @error('sektor')                                                               
                                                  <div class="invalid-feedback">{{$message}}</div>
                                                       <script>
                                                           Swal.fire(
                                                                 'Gagal!',
                                                                 'Silahkan pilih Sektor!',
                                                                 'error'
                                                            )
                                                        </script>
                                               @enderror
                                             </div>
                                        </div>
          
                                        
                                        <div class="mb-3">
                                             <label class="form-label">Pekerjaan Ayah <span class="text-danger">*</span></label>
                                             <input type="text" name="pekerjaan_ayah" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" placeholder="Pekerjaan Ayah">
                                             @error('pekerjaan_ayah')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Pekerjaan Ayah!',
                                                            'error'
                                                       )
                                                   </script>
                                          @enderror
                                        </div>

                                        <div class="mb-3">
                                             <label class="form-label">Pekerjaan Ibu <span class="text-danger">*</span></label>
                                             <input type="text" name="pekerjaan_ibu" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" placeholder="Pekerjaan Ibu">
                                             @error('pekerjaan_ibu')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Pekerjaan Ibu!',
                                                            'error'
                                                       )
                                                   </script>
                                          @enderror
                                        </div>
                                        <div class="mb-3">
                                             <label class="form-label">Masuk Tanggal <span class="text-danger">*</span></label>
                                             <input type="date" name="masuk_tgl" class="form-control @error('masuk_tgl') is-invalid @enderror" placeholder="">
                                             @error('masuk_tgl')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Tanggal Masuk!',
                                                            'error'
                                                       )
                                                   </script>
                                          @enderror
                                        </div>
                                        <div class="mb-3">
                                             <label class="form-label">Pindah Tanggal </label>
                                             <input type="date" name="pindah_tgl" class="form-control" placeholder="Pekerjaan Ibu">
                                        </div>
                                        
                                        <div class="mb-3">
                                             <label class="form-label">Pindah Dari</label>
                                             <input type="text" name="pindah_dari" class="form-control" placeholder="Pindah Dari">
                                        </div>
                                        <div class="mb-3">
                                             <label class="form-label">Pindah Ke</label>
                                             <input type="text" name="pindah_ke" class="form-control" placeholder="Pindah Ke">
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
                    <span>&copy; 2023 HKBP Pearaja Tarutung</span>
                    
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