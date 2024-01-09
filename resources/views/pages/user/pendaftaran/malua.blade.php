@extends('layouts.user.master')
@section('title', 'Daftar Malua')
<script src="{{asset('sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
@section('content')
<section class="wrapper bg-soft-primary text-white">
     <div class="container pt-18 pt-md-20 pb-21 pb-md-21 text-center">
       <div class="row">
         <div class="col-lg-8 mx-auto">
           <h1 class="display-1 text-dark mb-3">Malua</h1>
           <nav class="d-inline-block" aria-label="breadcrumb">
             <ol class="breadcrumb text-dark">
               <li class="breadcrumb-item"><a href="/">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Malua</li>
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
                
                    <form class="text-start" href="{{route('malua.create')}}" method="POST">
                      @csrf
                    <div class=" row justify-content-around p-10 p-md-11 p-lg-13">
                         <div class="col-lg-6 mb-lg-5">
                              <div class="form-select-wrapper mb-4">
                                <select class="form-select @error('id_user_jemaat') is-invalid @enderror" aria-label="Default select example" name="id_user_jemaat" id="country">
                                  <option value="" selected disabled>Nama Jemaat</option>
                                  @foreach ($jemaat as $j)
                                       <option value="{{$j->id}}" {{$j->id==$data->id_user_jemaat?"selected":""}}>{{ucfirst($j->nama)}}</option>
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
                              <div class="form-floating mb-4">
                                <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Email" id="loginEmail">
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

                         </div>
                         <div class="col-lg-6 mb-lg-5">

                          <div class="form-floating password-field mb-4">
                            <input type="date" class="form-control @error('tanggal_baptis') is-invalid @enderror" name="tanggal_baptis" placeholder="" id="">                                
                            <label for="">Tanggal Baptis</label>
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
                               <div class="form-floating mb-4">
                                 <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" placeholder="" id="loginEmail">
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