@extends('layouts.user.master')
@section('title', 'Dashboard')
@section('content')
<section class="wrapper bg-soft-primary text-white">
     <div class="container pt-20 pt-md-20 pb-15 pb-md-15 text-center">
       <div class="row">
         <div class="col-lg-8 mx-auto">
           <h1 class="display-1 text-dark mb-3">Jadwal Acara</h1>
           <nav class="d-inline-block" aria-label="breadcrumb">
             <ol class="breadcrumb text-dark">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">Jadwal</li>
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
   <section class="wrapper col-lg-11 mx-auto pb-5 mb-12 bg-light">
     <div class="container col-lg-11 pb-8 pb-md-8">
          <div id="snippet-4" class="wrapper pt-6">
               <h2 class="mb-5 text-center">Jadwal Ibadah</h2>
               <div class="card">
                 <div class="card-body">
                   <table class="table table-bordered">
                     <thead>
                       <tr>
                         <th class="col text-center">No</th>
                         <th class="col text-center">Nama</th>                         
                         <th class="col text-center">Tanggal</th>
                         <th class="col text-center">Tata Ibadah</th>
                       </tr>
                     </thead>
                     <tbody>
                      @foreach ($i as $item)
                          
                      <tr>
                        <th class="text-center" >{{$x++}}</th>
                        <td class="text-capitalize text-center">{{$item->nama}}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM Y') }}</td>
                        <td class="text-center"> <a href="{{ route('ibadah.download', $item->id) }}" class="btn btn-aqua rounded-xl btn-sm">Unduh</a></td>
                      </tr>
                      @endforeach
                     </tbody>
                   </table>
                 </div>
               </div>
               <!--/.card -->
          </div>
          
     </div>
     <div class="container col-lg-11 pb-8 pb-md-8">
          <div id="snippet-4" class="wrapper pt-6">
               <h2 class="mb-5 text-center">Jadwal Partangiangan</h2>
               <div class="card">
                 <div class="card-body">
                   <table class="table table-bordered">
                     <thead>
                       <tr>
                         <th class="col text-center">No</th>
                         <th class="col text-center">Sektor</th>
                         <th class="col text-center">Keluarga</th>
                         <th class="col text-center">Alamat</th>
                         <th class="col text-center">Tanggal</th>
                         <th class="col text-center">Tata Ibadah</th>
                       </tr>
                     </thead>
                     <tbody>
                      @foreach ($p as $item)                        
                      <tr>
                        <th class="text-capitalize text-center">{{$y++}}</th>
                        <td class="text-capitalize text-center">{{$item->sektor}}</td>
                        <td class="text-capitalize text-center">{{$item->keluarga}}</td>
                        <td class="text-capitalize text-center">{{$item->alamat}}</td>
                        <td class="text-capitalize text-center">{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM Y') }}</td>
                        <td class="text-capitalize text-center"><a href="{{ route('partangiangan.download', $item->id) }}" class="btn btn-aqua rounded-xl btn-sm">Unduh</a></td>
                      </tr>
                      @endforeach
                     </tbody>
                   </table>
                 </div>
               </div>
               <!--/.card -->
          </div>
          
     </div>
     <!-- /.container -->
</section>
@endsection
  
