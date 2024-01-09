@extends('layouts.user.master')
@section('title', 'Dashboard')
@section('content')
     <!-- /header -->
    <section class="wrapper bg-soft-primary pt-14">
      <div class="container pt-10 pb-12 pt-md-14  text-center">
        <div class="row">
          <div class="col-md-10 col-lg-8 col-xl-7 col-xxl-6 mx-auto">
            <h1 class="display-1 ">Pengumuman</h1>
            <nav class="d-inline-block" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengumuman</li>
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
    <div class="container" style="margin-top: -2%">
      <div class="row gx-0">
       
        <!-- /column -->
        @if ($p->count() == 0)
            
        <div class="col-xl-11 mx-auto pb-15">
          <section id="terms-conditions" class="wrapper pt-16">
            <div class="card">
              <div class="card-body p-10">                
                <h6 class="text-bold">Tidak Ada Pengumuman Untuk Saat Ini.</h6>                                
              </div>              
            </div>      
        @endif
            @foreach ($p as $item)
            <div class="card">
              <div class="card-body p-10">
                <h2 class="mb-3">{{$item->judul}}</h2>
                <p class="text-end">- {{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM Y') }}</p>
                <p>{{$item->isi}}</p>
                <h6 class="text-bold">Sekretariat</h6>                                
              </div>              
            </div>              
            @endforeach
            <!--/.card -->
          </section>
         
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection