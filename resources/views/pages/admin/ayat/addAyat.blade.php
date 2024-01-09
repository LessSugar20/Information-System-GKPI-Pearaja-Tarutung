@extends('layouts.admin.master')
@section('title', 'Dashboard')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assetss/js/vendor/forms/selects/select2.min.js')}}"></script>
<script src="{{asset('sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assetss/demo/pages/form_select2.js')}}"></script>
<script src="{{asset('assetss/js/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assetss/demo/pages/form_validation_library.js')}}"></script>
<script src="{{asset('assetss/js/vendor/forms/validation/validate.min.js')}}"></script>
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
                                          <a href="{{url('admin/ayat/ayat')}}" class="breadcrumb-item">Ayat Harian</a>
                                          @else
                                          <a href="{{url('sek/')}}" class="breadcrumb-item"><i class="ph-house"></i></a>
                                          <a href="{{url('sek/ayat/ayat')}}" class="breadcrumb-item">Ayat Harian</a>
                                          @endhasrole
                                          <span class="breadcrumb-item active">Tambah Ayat</span>
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
                     <div class="card">
                            @if ($data->id)
                            <div class="card-header">
                                   <h5 class="mb-0">Edit Ayat</h5>
                              </div>     
                            @else
                            <div class="card-header">
                                 <h5 class="mb-0">Tambah Ayat</h5>
                            </div>                        
                                
                            @endif

                         <div class="card-body border-top">
                            @if ($data->id)
                            @if(Auth::user()->hasrole('admin'))
                            <form action="{{route('admin.ayat.update', $data->id)}}" method="POST">       
                            @else
                            <form action="{{route('sek.ayat.update', $data->id)}}" method="POST">                                
                            @endif
                                   @csrf
                                   @method('PATCH')
                                                 <div class="mb-3">
                                                        <label class="col-form-label col-lg-3">Nats <span class="text-danger">*</span></label>
									<div class="form-control-feedback">
										<select name="id_alkitab" class="form-control select @error('id_alkitab') is-invalid @enderror">
                                                                             <option selected disabled>Pilih Ayat</option>
                                                                             @foreach ($kitab as $k)
                                                                                    <option value="{{$k->id}}" {{$k->id==$data->id_alkitab?"selected":""}}>{{ucfirst($k->kitab)}} {{$k->pasal}} : {{$k->ayat}}</option>
                                                                             @endforeach
										
										</select>
                                                                      @error('id_alkitab')       
                                                                      <div class="invalid-feedback">{{$message}}</div>                                                        
                                                                      <script>
                                                                             Swal.fire(
                                                                                   'Gagal!',
                                                                                   'Silahkan pilih Ayat!',
                                                                                   'error'
                                                                              )
                                                                          </script>
                                                                      @enderror
									</div>
                                                 </div>
                                                 <div class="mb-3">
								<label class="form-label">Tanggal <span class="text-danger">*</span></label>
								<div class="form-control-feedback ">
									<input type="date" value="{{$data->tanggal}}" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="Deskripsi">
                                                               @error('tanggal')                                                               
                                                               <div class="invalid-feedback">{{$message}}</div>
                                                               <script>
                                                                      Swal.fire(
                                                                            'Gagal!',
                                                                            'Silahkan input Tanggal!',
                                                                            'error'
                                                                       )
                                                                   </script>
                                                               @enderror
								</div>
							</div>
                                                 <div class="mb-3">
								<label class="form-label">Deskripsi</label>
								<div class="form-control-feedback ">
									<textarea type="text" class="form-control" name="deskripsi" placeholder="Deskripsi">{{$data->deskripsi}}</textarea>
								</div>
							</div>
                                                 <div class="text-end">
                                                        <button type="submit" class="btn btn-primary">Edit Ayat <i class="ph-paper-plane-tilt ms-2"></i></button>
                                                 </div>
                              </form>
                            @else
                            @if (Auth::user()->hasrole('admin'))
                            <form action="{{route('admin.ayat.store')}}" method="POST">       
                            @else
                            <form action="{{route('sek.ayat.store')}}" method="POST">                                
                            @endif
                                   @csrf
                                                 <div class="mb-3">
                                                        <label class="col-form-label col-lg-3">Nats <span class="text-danger">*</span></label>
									<div class="form-control-feedback">
										<select name="id_alkitab" class="form-control select @error('id_alkitab') is-invalid @enderror">
                                                                             <option selected disabled>Pilih Ayat</option>
                                                                             @foreach ($kitab as $k)
                                                                                    <option value="{{$k->id}}" {{$k->id==$data->id_alkitab?"selected":""}}>{{ucfirst($k->kitab)}} {{$k->pasal}} : {{$k->ayat}}</option>
                                                                             @endforeach
										
										</select>
                                                                      @error('id_alkitab')       
                                                                      <div class="invalid-feedback">{{$message}}</div>                                                        
                                                                      <script>
                                                                             Swal.fire(
                                                                                   'Gagal!',
                                                                                   'Silahkan pilih Ayat!',
                                                                                   'error'
                                                                              )
                                                                          </script>
                                                                      @enderror
									</div>
                                                 </div>
                                                 <div class="mb-3">
								<label class="form-label">Tanggal <span class="text-danger">*</span></label>
								<div class="form-control-feedback ">
									<input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="Deskripsi">
                                                               @error('tanggal')                                                               
                                                               <div class="invalid-feedback">{{$message}}</div>
                                                               <script>
                                                                      Swal.fire(
                                                                            'Gagal!',
                                                                            'Silahkan input Tanggal!',
                                                                            'error'
                                                                       )
                                                                   </script>
                                                               @enderror
								</div>
							</div>
                                                 <div class="mb-3">
								<label class="form-label">Deskripsi</label>
								<div class="form-control-feedback ">
									<textarea type="text" class="form-control" name="deskripsi" placeholder="Deskripsi"></textarea>
								</div>
							</div>
                                                 <div class="text-end">
                                                        <button type="submit" class="btn btn-primary">Tambah Ayat <i class="ph-paper-plane-tilt ms-2"></i></button>
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
<script>
       @if(session()->has('success'))
       toastr.options = {
           "closeButton": true
       }
       toastr.success("{{ session()->get('success') }}")
       @endif
</script>