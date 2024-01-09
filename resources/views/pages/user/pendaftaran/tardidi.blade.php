@extends('layouts.user.master')
@section('title', 'Daftar Tardidi')
<script src="{{asset('sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

@section('content')
<section class="wrapper bg-soft-primary text-white">
     <div class="container pt-18 pt-md-20 pb-21 pb-md-21 text-center">
       <div class="row">
         <div class="col-lg-8 mx-auto">
           <h1 class="display-1 text-dark mb-3">Tardidi</h1>
           <nav class="d-inline-block" aria-label="breadcrumb">
             <ol class="breadcrumb text-dark">
               <li class="breadcrumb-item"><a href="/">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Tardidi</li>
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
                    <form class="text-start" href="{{route('tardidi.create')}}" method="POST">
                      @csrf
                    <div class=" row justify-content-around p-10 p-md-11 p-lg-13">
                         <div class="col-lg-6 mb-lg-5">
                              <div class="form-floating mb-4">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama" id="">
                                <label for="">Nama</label>
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
                              <div class="form-floating mb-4">
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" placeholder="Tempat Lahir" id="loginEmail">
                                <label for="">Tempat Lahir</label>
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
                              <div class="form-floating mb-4">
                                <input type="text" class="form-control @error('ayah') is-invalid @enderror" name="ayah" placeholder="Nama Ayah" id="loginName">
                                <label for="">Nama Ayah</label>
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
                            
                         </div>
                         <div class="col-lg-6 mb-lg-5">
                              <div class="form-select-wrapper mb-4">
                                <select class="form-select @error('id_sektor') is-invalid @enderror" aria-label="Default select example" name="id_sektor" id="country" >
                                        <option value="" selected disabled>Pilih Sektor</option>
                                  @foreach ($sektor as $k)
                                        <option value="{{$k->id}}" {{$k->id==$data->id_sektor?"selected":""}}>{{ucfirst($k->nama)}}</option>
                                  @endforeach
                                </select>
                                @error('id_sektor')                                                               
                                    <div class="invalid-feedback">{{$message}}</div>
                                        <script>
                                            Swal.fire(
                                                  'Gagal!',
                                                  'Silahkan input Sektor!',
                                                  'error'
                                              )
                                          </script>
                                @enderror
                              </div>
                              
                               <div class="form-floating password-field mb-4">
                                 <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" placeholder="" id="">                                
                                 <label for="">Tanggal Lahir</label>
                                @error('tanggal_lahir')                                                               
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
                               <div class="form-floating mb-4">
                                 <input type="text" class="form-control @error('ibu') is-invalid @enderror" name="ibu" placeholder="Nama Ibu" id="">
                                 <label for="">Nama Ibu</label>
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