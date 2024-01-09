@extends('layouts.admin.master')
@section('title', 'Dashboard')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>

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
                                          <a href="index.html" class="breadcrumb-item"><i class="ph-house me-2"></i>Home</a>
                                          
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
                     
                     
                                                        <!-- Quick stats boxes -->
                                                        <div class="row">
                                                               <div class="col-lg-3">
                     
                                                                      <!-- Members online -->
                                                                      <div class="card bg-teal text-white">
                                                                             <div class="card-body">
                                                                                    <div class="d-flex">
                                                                                           <h3 class="mb-0">{{$jemaat}}</h3>
                                                                                           <span class="badge bg-black bg-opacity-50 rounded-pill align-self-center ms-auto">{{number_format($persen,2)}}%</span>
                                                                             </div>
                                                                             
                                                                             <div>
                                                                                           Jemaat Aktif
                                                                                           <div class="fs-sm opacity-75">{{$jemaat_aktif}} Total Jemaat</div>
                                                                                    </div>
                                                                             </div>
                     
                                                                             <div class="rounded-bottom overflow-hidden mx-3" id="members-online"></div>
                                                                      </div>
                                                                      <!-- /members online -->
                     
                                                               </div>
                                                               <div class="col-lg-3">
                     
                                                                      <!-- Members online -->
                                                                      <div class="card bg-secondary text-white">
                                                                             <div class="card-body">
                                                                                    <div class="d-flex">
                                                                                           <h3 class="mb-0">Rp.{{ number_format($total_kas, 2, ',', '.') }}</h3>
                                                                                           {{-- <span class="badge bg-black bg-opacity-50 rounded-pill align-self-center ms-auto">{{number_format($persen,2)}}%</span> --}}
                                                                             </div>
                                                                             
                                                                             <div>
                                                                                           Total Kas
                                                                                           <div class="fs-sm opacity-75">{{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</div>
                                                                                    </div>
                                                                             </div>
                     
                                                                             <div class="rounded-bottom overflow-hidden mx-3" id="members-online"></div>
                                                                      </div>
                                                                      <!-- /members online -->
                     
                                                               </div>
                     
                                                               <div class="col-lg-3">
                     
                                                                      <!-- Members online -->
                                                                      <div class="card bg-pink text-white">
                                                                             <div class="card-body">
                                                                                    <div class="d-flex">
                                                                                           <h3 class="mb-0">{{$kel}}</h3>
                                                                                           <span class="badge bg-black bg-opacity-50 rounded-pill align-self-center ms-auto">{{number_format($persen1,2)}}%</span>
                                                                             </div>
                                                                             
                                                                             <div>
                                                                                           Keluarga Aktif
                                                                                           <div class="fs-sm opacity-75">{{$k}} Total Keluarga</div>
                                                                                    </div>
                                                                             </div>
                     
                                                                             <div class="rounded-bottom overflow-hidden mx-3" id="members-online"></div>
                                                                      </div>
                                                                      <!-- /members online -->
                     
                                                               </div>
                     
                                                               <div class="col-lg-3">
                     
                                                                      <!-- Members online -->
                                                                      <div class="card bg-primary text-white">
                                                                             <div class="card-body">
                                                                                    <div class="d-flex">
                                                                                           <h3 class="mb-0">{{$p}}</h3>
                                                                                           <span class="badge bg-black bg-opacity-50 rounded-pill align-self-center ms-auto">{{number_format($persen2,2)}}%</span>
                                                                             </div>
                                                                             
                                                                             <div>
                                                                                           Penatua Aktif
                                                                                           <div class="fs-sm opacity-75">{{$penatua}} Total Penatua</div>
                                                                                    </div>
                                                                             </div>
                     
                                                                             <div class="rounded-bottom overflow-hidden mx-3" id="members-online"></div>
                                                                      </div>
                                                                      <!-- /members online -->
                     
                                                               </div>
                                                        </div>
                                                        <!-- /quick stats boxes -->

                     <!-- Dashboard content -->
                     <div class="row">
                            <div class="col-xl-8">

                                   <!-- Marketing campaigns -->
                                   <div class="card">                                          
                                          <div id="chart"></div>                                        
                                   </div>
                                   <!-- /marketing campaigns -->

                            </div>
                            <div class="col-xl-4">

                                   <!-- Marketing campaigns -->
                                   <div class="card">                                          
                                          <div id="chart2"></div>                                        
                                   </div>
                                   <!-- /marketing campaigns -->

                            </div>
                           
                     </div>
                     <div class="row">
                            <div class="col-xl-12">

                                   <!-- Marketing campaigns -->
                                   <div class="card">                                          
                                          <div id="chart3"></div>                                        
                                   </div>
                                   <!-- /marketing campaigns -->

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
<script>
       var chartData = {!! json_encode($chartData) !!};

       Highcharts.chart('chart', {
       chart:{
              type: 'column'
       },
       title: {
              text: 'Grafik Keuangan Per Minggu'
       },
       xAxis: {
              categories: chartData.labels
       },
       yAxis: {
              title: {
              text: 'Nominal'
              }
       },
       series: [{
              name: 'Pemasukan',
              data: chartData.pemasukan
       }, {
              name: 'Pengeluaran',
              data: chartData.pengeluaran
       }]
       });
       
       Highcharts.chart('chart2', {
       chart: {
              plotBackgroundColor: null,
              plotBorderWidth: null,
              plotShadow: false,
              type: 'pie'
       },
       title: {
              text: 'Grafik Perbandingan Keuangan',
              align: 'center'
       },
       tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
       },
       accessibility: {
              point: {
              valueSuffix: '%'
              }
       },
       plotOptions: {
              pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                     enabled: true,
                     format: '<b>{point.name}</b>: {point.percentage:.1f}%',
                     connectorColor: 'silver'
              },
              showInLegend: true
              }
       },
       series: [{
              name: 'Total',
              colorByPoint: true,
              data: [{
              name: 'Pemasukan',
              y: chartData.pemasukan.reduce((a, b) => a + b, 0),
              sliced: true,
              selected: true
              }, {
              name: 'Pengeluaran',
              y: chartData.pengeluaran.reduce((a, b) => a + b, 0)
              }]
       }]
       });

       Highcharts.chart('chart3', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Pendaftaran Malua, Baptis, dan Nikah'
    },
    xAxis: {
        categories: <?php echo json_encode($months); ?>
    },
    yAxis: {
        title: {
            text: 'Total Pendaftaran'
        }
    },
    plotOptions: {
        column: {
            dataLabels: {
                enabled: true,
                crop: false,
                overflow: 'none',
                format: '{point.series.name}',
                align: 'center',
                verticalAlign: 'bottom',
                rotation: 0,
                inside: false,
                padding: 5,
                style: {
                    fontSize: '12px',
                    fontWeight: 'bold',
                    textOutline: '0'
                }
            }
        }
    },
    series: [{
        name: 'Malua',
        data: <?php echo json_encode($maluaCount); ?>,
        color: '#293462' // Warna untuk seri Malua
    }, {
        name: 'Menikah',
        data: <?php echo json_encode($menikahCount); ?>,
        color: '#EB5353'
    }, {
        name: 'Tardidi',
        data: <?php echo json_encode($tardidiCount); ?>,
        color: '#37E2D5'
    }]
});

       </script>
<script>
       @if(session()->has('success'))
       toastr.options = {
           "closeButton": true
       }
       toastr.success("{{ session()->get('success') }}")
       @endif
</script>
@endsection