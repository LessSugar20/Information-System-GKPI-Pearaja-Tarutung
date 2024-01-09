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
                                          <span class="breadcrumb-item active">Jadwal</span>
                                          <span class="breadcrumb-item active">Tambah Jadwal</span>
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
                              <h5 class="mb-0">Tambah Jadwal Partangiangan</h5>
                         </div>                        

                         <div class="card-body border-top">
                              @if ($p->id)
                                        @if (Auth::user()->hasrole('admin'))
                                        <form action="{{route('admin.partangiangan.update', $p->id)}}" enctype="multipart/form-data" method="POST">
                                        @else
                                        <form action="{{route('sek.partangiangan.update', $p->id)}}" enctype="multipart/form-data" method="POST">                                        
                                        @endif
                                        @csrf
                                        @method('PATCH')
                                        <div class="mb-3">
                                             <label class="col-form-label col-lg-3">Sektor</label>
                                             <div class="form-control-feedback">
                                                  <select id="sektor1" name="sektor" class="form-control select @error('sektor') is-invalid @enderror">
                                                       <option value="" selected disabled>Pilih Sektor</option>
                                                       @foreach ($sektor as $s)
                                                       <option value="{{$s->nama}}" {{$s->nama==$p->sektor?"selected":""}}>{{ucfirst($s->nama)}}</option>
                                                       @endforeach             
                                                  </select>
                                                  @error('sektor')                                                               
                                                  <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan pilij Sektor!',
                                                            'error'
                                                       )
                                                   </script>
                                                  @enderror
                                             </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                             <label class="form-label">Alamat </label>
                                             <input type="text" name="alamat" value="{{$p->alamat}}" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat">
                                             @error('alamat')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Alamat!',
                                                            'error'
                                                       )
                                                   </script>
                                             @enderror
                                        </div>                                   
                                        <div class="mb-3">
                                             <label class="col-form-label col-lg-3">Keluarga</label>
                                             <div class="form-control-feedback">
                                                  <select id="keluarga1 " name="keluarga" class="form-control select @error('keluarga') is-invalid @enderror">
                                                       <option value="" selected disabled>Pilih Keluarga</option>
                                                       @foreach ($keluarga as $k)
                                                       <option value="{{$k->ayah}} / {{$k->ibu}}" {{$k->ayah." / ".$k->ibu==$p->keluarga?"selected":""}}>{{ucfirst($k->ayah)}} / {{ucfirst($k->ibu)}}</option>
                                                       @endforeach             
                                                  </select>
                                                  @error('keluarga')                                                               
                                                  <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan pilih Keluarga!',
                                                            'error'
                                                       )
                                                   </script>
                                                  @enderror
                                             </div>
                                        </div>
                                        <div class="mb-3">
                                             <label class="form-label">Tanggal Ibadah</label>
                                             <input type="date" name="tanggal" value="{{$p->tanggal}}" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Tanggal Ibadah">
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

                                        <div class="mb-3">
                                             <label class="col-form-label ">Tata Acara</label>
                                             <div class="col-lg-12">
                                                  <input type="file" name="path" class="form-control @error('path') is-invalid @enderror">                                             
                                                  @error('path')                                                               
                                                  <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input File!',
                                                            'error'
                                                       )
                                                   </script>
                                                  @enderror
                                             </div>
                                        </div>

                                        <div class="text-end">
                                             <button type="submit" class="btn btn-primary">Submit <i class="ph-paper-plane-tilt ms-2"></i></button>
                                        </div>
                                   </form>
                              @else
                                   @if (Auth::user()->hasrole('admin'))
                                   <form action="{{route('admin.partangiangan.store')}}" enctype="multipart/form-data" method="POST">     
                                   @else
                                   <form action="{{route('sek.partangiangan.store')}}" enctype="multipart/form-data" method="POST">                                   
                                   @endif
                                        @csrf
                                        <div class="mb-3">
                                             <label class="col-form-label col-lg-3">Sektor</label>
                                             <div class="form-control-feedback">
                                                  <select id="sektor" name="sektor" class="form-control select @error('sektor') is-invalid @enderror">
                                                       <option value="" selected disabled>Pilih Sektor</option>
                                                       @foreach ($sektor as $s)
                                                       <option value="{{$s->nama}}" {{$s->id==$p->sektor?"selected":""}}>{{ucfirst($s->nama)}}</option>
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
                                             <label class="form-label">Alamat </label>
                                             <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat">
                                             @error('alamat')                                                               
                                             <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input Alamat!',
                                                            'error'
                                                       )
                                                   </script>
                                             @enderror
                                        </div>                                   
                                        <div class="mb-3">
                                             <label class="col-form-label col-lg-3">Keluarga</label>
                                             <div class="form-control-feedback">
                                                  <select id="keluarga" name="keluarga" class="form-control select @error('keluarga') is-invalid @enderror">
                                                       <option value="" selected disabled>Pilih Keluarga</option>
                                                       @foreach ($keluarga as $k)
                                                       <option value="{{$k->ayah}} / {{$k->ibu}}" {{$k->id==$p->keluarga?"selected":""}}>{{ucfirst($k->ayah)}} / {{ucfirst($k->ibu)}}</option>
                                                       @endforeach             
                                                  </select>
                                                  @error('keluarga')                                                               
                                                  <div class="invalid-feedback">{{$message}}</div>
                                                       <script>
                                                       Swal.fire(
                                                                 'Gagal!',
                                                                 'Silahkan input Keluarga!',
                                                                 'error'
                                                            )
                                                       </script>
                                                  @enderror
                                             </div>
                                        </div>
                                        <div class="mb-3">
                                             <label class="form-label">Tanggal Ibadah</label>
                                             <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Tanggal Ibadah">
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

                                        <div class="mb-3">
                                             <label class="col-form-label ">Tata Acara</label>
                                             <div class="col-lg-12">
                                                  <input type="file" name="path" class="form-control @error('path') is-invalid @enderror">                                             
                                                  @error('path')                                                               
                                                  <div class="invalid-feedback">{{$message}}</div>
                                                  <script>
                                                      Swal.fire(
                                                            'Gagal!',
                                                            'Silahkan input File!',
                                                            'error'
                                                       )
                                                   </script>
                                                  @enderror
                                             </div>
                                        </div>

                                        <div class="text-end">
                                             <button type="submit" class="btn btn-primary">Submit <i class="ph-paper-plane-tilt ms-2"></i></button>
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
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
   $(document).ready(function() {
    // Mendengarkan perubahan pada elemen sektor
    $('#sektor').change(function() {
        var sektorId = $(this).val();

        // Mengirim permintaan Ajax ke endpoint yang mengembalikan daftar keluarga berdasarkan sektor
        $.ajax({
            url: '/get-keluarga-by-sektor', // Ganti dengan URL yang sesuai
            method: 'GET',
            data: { sektorId: sektorId },
            success: function(response) {
                // Menghapus opsi saat ini
                $('#keluarga').empty();

                if (response.length > 0) {
                    // Menambahkan opsi berdasarkan data yang diterima dari server
                    $.each(response, function(index, keluarga) {
    $('#keluarga').append('<option value="' + keluarga.ayah + ' / ' + keluarga.ibu + '">' + keluarga.ayah + ' / ' + keluarga.ibu + '</option>');
});

                } else {
                    // Menambahkan opsi "Keluarga Tidak ada"
                    $('#keluarga').append('<option value="">Keluarga Tidak ada</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});

</script>
<script>
     $(document).ready(function() {
      // Mendengarkan perubahan pada elemen sektor
      $('#sektor1').change(function() {
          var sektorId = $(this).val();
  
          // Mengirim permintaan Ajax ke endpoint yang mengembalikan daftar keluarga berdasarkan sektor
          $.ajax({
              url: '/get-keluarga-by-sektor', // Ganti dengan URL yang sesuai
              method: 'GET',
              data: { sektorId: sektorId },
              success: function(response) {
                  // Menghapus opsi saat ini
                  $('#keluarga1').empty();
  
                  if (response.length > 0) {
                      // Menambahkan opsi berdasarkan data yang diterima dari server
                      $.each(response, function(index, keluarga) {
      $('#keluarga1').append('<option value="' + keluarga.ayah + ' / ' + keluarga.ibu + '">' + keluarga.ayah + ' / ' + keluarga.ibu + '</option>');
  });
  
                  } else {
                      // Menambahkan opsi "Keluarga Tidak ada"
                      $('#keluarga1').append('<option value="">Keluarga Tidak ada</option>');
                  }
              },
              error: function(xhr, status, error) {
                  console.error(error);
              }
          });
      });
  });
  
  </script>

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