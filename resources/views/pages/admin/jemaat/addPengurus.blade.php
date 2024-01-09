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
                                          <span class="breadcrumb-item active">Data Pengurus</span>
                                          <span class="breadcrumb-item active">Tambah Data Pengurus</span>
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
                              <h5 class="mb-0">Tambah Pengurus</h5>
                         </div>                        

                         <div class="card-body border-top">                    
                              @if (Auth::user()->hasrole('admin'))
                              <form action="{{route('admin.pengurus.store')}}" method="POST">         
                              @else
                              <form action="{{route('sek.pengurus.store')}}" method="POST">                                   
                              @endif     
                                   @csrf
                                   <div class="mb-3">
                                        <label class="col-form-label col-lg-3">Nama</label>
                                        <div class="form-control-feedback">
                                             <select name="id_jemaat" class="form-control select">
                                                       <option value="" selected disabled>Nama Jemaat</option>
                                                       @foreach ($jemaat as $j)
                                                            <option value="{{$j->id}}" {{$j->id==$bphj->id_jemaat?"selected":""}}>{{ucfirst($j->nama)}}</option>
                                                       @endforeach                                             
                                             </select>
                                        </div>
                                   </div>

                                   <div class="mb-3">
                                        <label class="form-label">Jabatan</label>
                                        <select name="jabatan" class="form-control form-control-select2">                                        
                                             <option value="" disabled selected>Pilih Jabatan</option>    
                                             <option value="pendeta" {{$bphj->jabatan == "pendeta"?"selected":""}}>Pendeta</option>    
                                             <option value="guru_jemaat" {{$bphj->jabatan == "guru_jemaat"?"selected":""}}>Guru Jemaat</option>                                             
                                             <option value="sekretaris" {{$bphj->jabatan == "sekretaris"?"selected":""}}>Sekretaris</option>                                             
                                             <option value="bendahara" {{$bphj->jabatan == "bendahara"?"selected":""}}>Bendahara</option>                                             
                                        </select>
                                   </div>

                                   <div class="mb-3">
                                        <label class="form-label">Periode</label>
                                        <input type="text" name="periode" class="form-control" placeholder="Tahun Periode">
                                        
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
<script>
       @if(session()->has('success'))
       toastr.options = {
           "closeButton": true
       }
       toastr.success("{{ session()->get('success') }}")
       @endif
</script>