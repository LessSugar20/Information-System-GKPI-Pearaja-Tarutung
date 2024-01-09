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
                              <h5 class="mb-0">Edit Data</h5>  
                         </div>                        

                         <div class="card-body border-top">                       
                              @if (Auth::user()->hasrole('admin'))
                              <form action="{{route('admin.malua.update', $m->id)}}" method="POST">         
                              @else
                              <form action="{{route('sek.malua.update', $m->id)}}" method="POST">                                   
                              @endif      
                              @csrf
                              @method('PATCH')
                              <div class="mb-3">
                                   <label class="form-label">Nomor Surat </label>
                                   <input type="text" value="{{$m->no_surat}}" name="no_surat" class="form-control @error('no_surat') is-invalid @enderror" placeholder="Nomor Surat">
                                        @error('no_surat')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                  Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Nomor Surat!',
                                                            'error'
                                                       )
                                                  </script>
                                        @enderror
                              </div>
                              <div class="mb-3">
                                   <label class="col-form-label col-lg-3">Nama</label>
                                   <div class="form-control-feedback">
                                        <select name="id_user_jemaat" class="form-control select @error('id_user_jemaat') is-invalid @enderror">
                                                  <option value="" selected disabled>Nama Jemaat</option>
                                                  @foreach ($jemaat as $j)
                                                       <option value="{{$j->id}}" {{$j->id==$m->id_user_jemaat?"selected":""}}>{{ucfirst($j->nama)}}</option>
                                                  @endforeach                                             
                                        </select>
                                        @error('id_user_jemaat')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Nama Jemaat!',
                                                            'error'
                                                       )
                                                   </script>
                                        @enderror
                                   </div>
                              </div>                        
                              <div class="mb-3">
                                   <label class="col-form-label col-lg-3">Nats</label>
                                   <div class="form-control-feedback">
                                        <select name="nats" class="form-control select @error('nats') is-invalid @enderror">
                                                  <option value="" selected disabled>Pilih Ayat</option>
                                                  @foreach ($kitab as $k)
                                                       <option value="{{$k->id}}" {{$k->id==$m->nats?"selected":""}}>{{ucfirst($k->kitab)}} {{$k->pasal}} : {{$k->ayat}}</option>
                                                  @endforeach
                                        
                                        </select>
                                        @error('nats')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Nats!',
                                                            'error'
                                                       )
                                                   </script>
                                        @enderror
                                   </div>
                            </div>
                              <div class="mb-3">
                                   <label class="form-label">Tanggal Sidi </label>
                                   <input type="date" name="tanggal_sidi" value="{{$m->tanggal_sidi}}" class="form-control @error('tanggal_sidi') is-invalid @enderror" placeholder="">
                                   @error('tanggal_sidi')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Tanggal Sidi!',
                                                            'error'
                                                       )
                                                   </script>
                                   @enderror
                              </div> 
                              <div class="mb-3">
                                   <label class="col-form-label col-lg-3">Pendeta</label>
                                   <div class="form-control-feedback">
                                        <select name="pendeta" class="form-control select @error('pendeta') is-invalid @enderror">
                                             <option value="" selected disabled>Pilih Pendeta</option>
                                             @foreach ($p as $pdt)
                                                  <option value="{{$pdt->nama}}" {{$m->pendeta==$pdt->nama?"selected":""}}>{{ucfirst($pdt->nama)}}</option>
                                             @endforeach             
                                        </select>
                                        @error('pendeta')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Pendeta!',
                                                            'error'
                                                       )
                                                   </script>
                                        @enderror
                                   </div>
                              </div>
                              <div class="mb-3">
                                   <label class="col-form-label col-lg-3">Guru Jemaat</label>
                                   <div class="form-control-feedback">
                                        <select name="guru_jemaat" class="form-control select @error('guru_jemaat') is-invalid @enderror">
                                             <option value="" selected disabled>Pilih Guru Jemaat</option>
                                             @foreach ($gj as $g)
                                                  <option value="{{$g->nama}}" {{$m->guru_jemaat==$g->nama?"selected":""}}>{{ucfirst($g->nama)}}</option>
                                             @endforeach             
                                        </select>
                                        @error('guru_jemaat')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Guru Jemaat!',
                                                            'error'
                                                       )
                                                   </script>
                                        @enderror
                                   </div>
                              </div>
                              <div class="mb-3">
                                   <label class="form-label">Tanggal Baptis </label>
                                   <input type="date" name="tanggal_baptis" value="{{$m->tanggal_baptis}}" class="form-control @error('tanggal_baptis') is-invalid @enderror" placeholder="">
                                   @error('tanggal_baptis')                                                               
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
                              <div class="text-end">
                                   <button type="submit" class="btn btn-primary">Submit form <i class="ph-paper-plane-tilt ms-2"></i></button>
                              </div>
                              </form>                              
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