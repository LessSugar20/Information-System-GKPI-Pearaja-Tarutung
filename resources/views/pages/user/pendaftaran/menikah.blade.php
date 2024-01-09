@extends('layouts.user.master')
@section('title', 'Daftar Menikah')
<script src="{{asset('sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

@section('content')
<section class="wrapper bg-soft-primary text-white">
     <div class="container pt-18 pt-md-20 pb-21 pb-md-21 text-center">
       <div class="row">
         <div class="col-lg-8 mx-auto">
           <h1 class="display-1 text-dark mb-3">Menikah</h1>
           <nav class="d-inline-block" aria-label="breadcrumb">
             <ol class="breadcrumb text-dark">
               <li class="breadcrumb-item"><a href="/">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Menikah</li>
             </ol>
           </nav>
           <!-- /nav -->
         </div>
         <!-- /column -->
       </div>
       <!-- /.row -->
     </div>
     <!-- /.container -->
   </section>
   <!-- /section -->
   <section class="wrapper bg-light">
     <div class="container pb-14 pb-md-16">
       <div class="row">
         <div class="col mt-n19">
           <div class="card shadow-lg">
             <div class="row gx-0 text-center">
               <div class="col-lg-12 ">
                    <form class="text-start" action="{{route('menikah.create')}}" method="POST">
                      @csrf
                    <div class=" row justify-content-around p-10 p-md-11 p-lg-13">
                         <div class="col-lg-6 mb-lg-5">
                              <div class="form-floating mb-4">
                                <input type="text" name="pria" class="form-control @error('pria') is-invalid @enderror" placeholder="Name" id="loginName">
                                <label for="loginName">Pria</label>
                                @error('pria')                                                               
                                    <div class="invalid-feedback">{{$message}}</div>
                                        <script>
                                            Swal.fire(
                                                  'Gagal!',
                                                  'Silahkan input Nama Pria!',
                                                  'error'
                                              )
                                          </script>
                                @enderror
                              </div>
                              <div class="form-floating mb-4">
                                <input type="text" name="wali_pria" class="form-control @error('wali_pria') is-invalid @enderror" placeholder="Email" id="loginEmail">
                                <label for="loginEmail">Wali Pria</label>
                                @error('wali_pria')                                                               
                                    <div class="invalid-feedback">{{$message}}</div>
                                        <script>
                                            Swal.fire(
                                                  'Gagal!',
                                                  'Silahkan input Wali Pria!',
                                                  'error'
                                              )
                                          </script>
                                @enderror
                              </div>
                              <div class="form-floating mb-4">
                                <input type="date" name="tanggal" class="form-control  @error('tanggal') is-invalid @enderror" placeholder="Email" id="loginEmail">
                                <label for="loginEmail">Tanggal</label>
                                @error('tanggal')                                                               
                                    <div class="invalid-feedback">{{$message}}</div>
                                        <script>
                                            Swal.fire(
                                                  'Gagal!',
                                                  'Silahkan input tanggal!',
                                                  'error'
                                              )
                                          </script>
                                @enderror
                              </div>
                                              

                         </div>
                         <div class="col-lg-6 mb-lg-5">

                              <div class="form-floating mb-4">
                                 <input type="text" name="wanita" class="form-control @error('wanita') is-invalid @enderror" placeholder="Name" id="loginName">
                                 <label for="loginName">Wanita</label>
                                 @error('wanita')                                                               
                                    <div class="invalid-feedback">{{$message}}</div>
                                        <script>
                                            Swal.fire(
                                                  'Gagal!',
                                                  'Silahkan input Nama Wanita!',
                                                  'error'
                                              )
                                          </script>
                                @enderror
                               </div>
                               <div class="form-floating mb-4">
                                 <input type="text" name="wali_wanita" class="form-control @error('wali_wanita') is-invalid @enderror" placeholder="Email" id="loginEmail">
                                 <label for="loginEmail">Wali Wanita</label>
                                 @error('wali_wanita')                                                               
                                    <div class="invalid-feedback">{{$message}}</div>
                                        <script>
                                            Swal.fire(
                                                  'Gagal!',
                                                  'Silahkan input Wali Wanita!',
                                                  'error'
                                              )
                                          </script>
                                @enderror
                               </div>
                               <div class="form-floating mb-4">
                                <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" placeholder="Email" id="loginEmail">
                                <label for="loginEmail">Lokasi</label>
                                @error('lokasi')                                                               
                                    <div class="invalid-feedback">{{$message}}</div>
                                        <script>
                                            Swal.fire(
                                                  'Gagal!',
                                                  'Silahkan input Lokasi!',
                                                  'error'
                                              )
                                          </script>
                                @enderror
                              </div>
                                              
                         </div>
                              <button type="submit" class="btn btn-primary rounded-pill btn-login col-lg-4 ">Daftar</button>
                         </div>
                    </div>              
               </form>                   
               <!--/column -->
             </div>
             <!--/.row -->
           </div>
           <!-- /.card -->
         </div>
         <!-- /column -->
       </div>
       <!-- /.row -->
     </div>
     <!-- /.container -->
   </section>
@endsection
@section('custom_js')
<script type="text/javascript"> 
    @if(session()->has('success'))
		Swal.fire(
			'Berhasil!',
			'{{session('success')}}',
			'success'
		)
	@endif
   </script>
@endsection