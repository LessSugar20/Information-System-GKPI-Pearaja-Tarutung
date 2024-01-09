@extends('layouts.user.master')
@section('title', 'Dashboard')
@section('content')
    <section class="wrapper overflow-hidden">
      <div class="container pt-19 pt-md-21 pb-16 pb-md-18 text-center position-relative">
        <div class="position-absolute" style="top: -12%; left: 50%; transform: translateX(-50%);" data-cue="fadeIn"><img src="{{asset('assets/img/photos/blurry.png')}}" alt=""></div>
        <div class="row position-relative">
          <div class="col-lg-8 col-xxl-7 mx-auto position-relative">
            <div class="position-absolute shape grape w-5 d-none d-lg-block" style="top: -5%; left: -15%;" data-cue="fadeIn" data-delay="1500"><img src="{{asset('assets/img/svg/pie.svg')}}" class="svg-inject icon-svg w-100 h-100" alt="" /></div>
            <div class="position-absolute shape violet w-10 d-none d-lg-block" style="bottom: 30%; left: -20%;" data-cue="fadeIn" data-delay="1500"><img src="{{asset('assets/img/svg/scribble.svg')}}" class="svg-inject icon-svg w-100 h-100" alt="" /></div>
            <div class="position-absolute shape fuchsia w-6 d-none d-lg-block" style="top: 0%; right: -25%; transform: rotate(70deg);" data-cue="fadeIn" data-delay="1500"><img src="{{asset('assets/img/svg/tri.svg')}}" class="svg-inject icon-svg w-100 h-100" alt="" /></div>
            <div class="position-absolute shape yellow w-6 d-none d-lg-block" style="bottom: 25%; right: -17%;" data-cue="fadeIn" data-delay="1500"><img src="{{asset('assets/img/svg/circle.svg')}}" class="svg-inject icon-svg w-100 h-100" alt="" /></div>
            <div data-cues="slideInDown" data-group="page-title">
              <h1 class="display-1 fs-64 mb-5 mx-md-10 mx-lg-0">
                {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }} 
                @foreach ($ayat as $a)
                <br /><span class="text-primary">{{ucfirst($a->kitab)}} {{$a->pasal}} : {{$a->ayat}}</span>
                <p class="lead fs-24 mb-8">"{{$a->firman}}"</p>
                @endforeach
              </h1>
                  
            </div>
            <div class="d-md-flex justify-content-center" data-cues="slideInDown" data-delay="600">
              <span><a href="{{route('ibadah')}}" class="btn btn-lg btn-primary btn-icon btn-icon-end rounded-xl mx-md-1 mb-2 mb-md-0">Tata Ibadah <i class="uil uil-arrow-right"></i></a></span>
            </div>
            <!-- /div -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
      <div class="swiper-container swiper-auto swiper-auto-xs mb-8" data-margin="40" data-nav="false" data-dots="false" data-centered="true" data-loop="true" data-items-auto="true" data-autoplay="true" data-autoplaytime="1" data-drag="false" data-resizeupdate="false" data-speed="7000">
        <div class="swiper overflow-visible pe-none">
          <div class="swiper-wrapper ticker">
            <div class="swiper-slide">
              <figure class="rounded-xl shadow-xl"><img src="{{asset('assetss/images/gereja/gereja22.jpg')}}"   alt="" /></figure>
            </div>
            <div class="swiper-slide">
              <figure class="rounded-xl shadow-xl"><img src="{{asset('assetss/images/gereja/ibadah22.jpg')}}" height="300" alt="" /></figure>
            </div>
            <div class="swiper-slide">
              <figure class="rounded-xl shadow-xl"><img src="{{asset('assetss/images/gereja/ibadah2.jpg')}}" height="300" alt="" /></figure>
            </div>
            
          </div>
          <!--/.swiper-wrapper -->
        </div>
        <!-- /.swiper -->
      </div>
      <!-- /.swiper-container -->
      <div class="swiper-container swiper-auto swiper-auto-xs mb-10 mb-md-12" data-margin="40" data-nav="false" data-dots="false" data-centered="true" data-loop="true" data-items-auto="true" data-autoplay="true" data-autoplaytime="1" data-drag="false" data-resizeupdate="false" data-speed="7000">
        <div class="swiper overflow-visible pe-none" dir="rtl">
          <div class="swiper-wrapper ticker">
            <div class="swiper-slide">
              <figure class="rounded-xl shadow-xl"><img src="{{asset('assetss/images/gereja/partangiangan_keluargapendeta.jpg')}}" height="300" alt="" /></figure>
            </div>
            <div class="swiper-slide">
              <figure class="rounded-xl shadow-xl"><img src="{{asset('assetss/images/gereja/tamu.jpg')}}" height="300" alt="" /></figure>
            </div>
            {{-- <div class="swiper-slide">
              <figure class="rounded-xl shadow-xl"><img src="{{asset('assetss/images/gereja/tamu2.jpgg')}}" height="300" alt="" /></figure>
            </div> --}}
            <div class="swiper-slide">
              <figure class="rounded-xl shadow-xl"><img src="{{asset('assetss/images/gereja/tamu2.png')}}" height="300" alt="" /></figure>
            </div>
          </div>
          <!--/.swiper-wrapper -->
        </div>
        <!-- /.swiper -->
      </div>
      <!-- /.swiper-container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-soft-primary overflow-hidden" id="demos">
    
      <!-- /.container -->
      <div class="container-fluid px-xl-0 pb-16 pb-md-18">
        
        <div class="container py-14 py-md-16">
          <div class="row text-center">
            <div class="col-xl-10 mx-auto">              
              <h3 class="display-4 mb-10 px-xxl-15">Data Statistik Jemaat</h3>
            </div>
            <!-- /column -->
          </div>
          <!-- /.row -->
          <div class="row gy-6">
            <div class="col-md-6 col-lg-4">
              <div href="#" class="card shadow-lg lift h-80">
                <div class="card-body p-5 d-flex flex-row">
                  <div>
                    <span class="avatar bg-green text-white w-11 h-11 fs-25 me-4"><i class="fas fa-users"></i></span>
                  </div>
                  <div>
                    <span class="badge bg-pale-aqua text-aqua rounded py-1 mb-2 fs-20">Jumlah Keluarga</span>
                    <h4 class="mb-1 counter bold">{{$kel}}</h4>
                    {{-- <p class="mb-0 text-body">Anywhere</p> --}}
                  </div>
                </div>
              </div>
            </div>
            <!--/column -->
            <div class="col-md-6 col-lg-4">
              <div href="#" class="card shadow-lg lift h-80">
                <div class="card-body p-5 d-flex flex-row">
                  <div>
                    <span class="avatar bg-red text-white w-11 h-11 fs-25 me-4"><i class="fas fa-user"></i></span>
                  </div>
                  <div>
                    <span class="badge bg-pale-blue text-blue rounded py-1 mb-2 fs-20">Jumlah Jemaat</span>
                    <h4 class="mb-1 counter bold">{{$jemaat}}</h4>
                    {{-- <p class="mb-0 text-body">Anywhere</p> --}}
                  </div>
                </div>
              </div>
            </div>
            <!--/column -->
            <div class="col-md-6 col-lg-4">
              <div href="#" class="card shadow-lg lift h-80">
                <div class="card-body p-5 d-flex flex-row">
                  <div>
                    <span class="avatar bg-yellow text-white w-11 h-11 fs-25 me-4"><i class="fas fa-map-marked-alt"></i></span>
                  </div>
                  <div>
                    <span class="badge bg-pale-leaf text-leaf rounded py-1 mb-2 fs-20">Jumlah Sektor</span>
                    <h4 class="mb-1 counter bold">{{$sektor}}</h4>
                    {{-- <p class="mb-0 text-body">Anywhere</p> --}}
                  </div>
                </div>
              </div>
            </div>
            <!--/column -->
            <div class="col-md-6 col-lg-4">
              <div href="#" class="card shadow-lg lift h-80">
                <div class="card-body p-5 d-flex flex-row">
                  <div>
                    <span class="avatar bg-purple text-white w-11 h-11 fs-25 me-4"><i class="fas fa-users"></i></span>
                  </div>
                  <div>
                    <span class="badge bg-pale-grape text-grape rounded py-1 mb-2 fs-20">Jumlah Keluarga Aktif</span>
                    <h4 class="mb-1 counter bold">{{$kel_aktif}}</h4>
                    {{-- <p class="mb-0 text-body">Anywhere</p> --}}
                  </div>
                </div>
              </div>
            </div>
            <!--/column -->
            <div class="col-md-6 col-lg-4">
              <div href="#" class="card shadow-lg lift h-80">
                <div class="card-body p-5 d-flex flex-row">
                  <div>
                    <span class="avatar bg-orange text-white w-11 h-11 fs-25 me-4"><i class="fas fa-user-check"></i></span>
                  </div>
                  <div>
                    <span class="badge bg-pale-orange text-orange rounded py-1 mb-2 fs-20">Jumlah Jemaat Aktif</span>
                    <h4 class="mb-1 counter bold">{{$jemaat_aktif}}</h4>
                    {{-- <p class="mb-0 text-body">Anywhere</p> --}}
                  </div>
                </div>
              </div>
            </div>
            <!--/column -->
            <div class="col-md-6 col-lg-4">
              <div href="#" class="card shadow-lg lift h-80">
                <div class="card-body p-5 d-flex flex-row">
                  <div>
                    <span class="avatar bg-pink text-white w-11 h-11 fs-25 me-4"><i class="fas fa-user-tie"></i></span>
                  </div>
                  <div>
                    <span class="badge bg-pale-pink text-pink rounded py-1 mb-2 fs-20">Jumlah Penatua</span>
                    <h4 class="mb-1 counter bold">{{$penatua}}</h4>
                    {{-- <p class="mb-0 text-body">Anywhere</p> --}}
                  </div>
                </div>
              </div>
            </div>
            <!--/column -->
          </div>
          <!--/.row -->         
        </div>
      </div>
      <!-- /.container -->
  
      <!--/.container -->
    </section>
    <!-- /section -->
    <!-- /section -->   
@endsection
  
