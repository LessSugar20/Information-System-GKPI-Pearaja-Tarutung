<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Keluarga Jemaat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            transform: rotate(90deg);
            /* margin: 1rem; */
            margin-top: 14rem
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-left: -20px;
        }
        th{
            text-align: center;
            border: 1px solid #ddd;
            padding: 5px;   
            font-size: 13px;
        }
        td {
            border: 1px solid #ddd;
            padding: 5px;   
            font-size: 13px;
        }
        th {
            background-color: #f2f2f2;
        }
        .judul{
            /* text-align: center; */
            /* margin: 5rem */
        }
    </style>
</head>
<body>
    <div class="judul">
        <center>
            <h3 class="judul" style="font-size: 1.2rem;">DATA KELUARGA GKPI JEMAAT PEARAJA RESORT PEARAJA TARUTUNG <br> WILAYAH VI - TAPANULI UTARA</h3>        
            <h5 class="judul">Jl. Sisingamangaraja No.108b</h5>
        </center>

    </div>
    <table style="margin: auto">
        <tr>
            <td style="border: #ddd">Sektor : {{ucfirst($jemaat->sektor)}}</td>
            <td style="text-align: center; border:#ddd">No Induk : {{ucfirst($jemaat->id)}}</td>
        </tr>
    </table>
    <hr>
    <br>
    <table style="margin: auto">
        <tr>
            <td style="border: #ddd; width: 150px">Nama Kepala Keluarga</td>
            <td style="border:#ddd; width:150px">: {{ucfirst($jemaat->ayah)}}</td>
            <td style="text-align: center; border:#ddd">Pekerjaan : {{ucfirst($jemaat->pekerjaan_ayah)}}</td>
        </tr>
    </table>
    <table style="margin: auto">
        <tr>
            <td style="border: #ddd; width: 150px">Nama Ibu Rumah Tangga</td>
            <td style="border:#ddd; width:150px">: {{ucfirst($jemaat->ibu)}}</td>
            <td style="text-align: center; border:#ddd">Pekerjaan : {{ucfirst($jemaat->pekerjaan_ibu)}}</td>
        </tr>
    </table>
    <br><br>    
    <table  >
        <thead>
            <tr>
                <th>No</th>
                <th style="width: 130px">Nama</th>
                <th>Status</th>
                <th style="width: 100px">Tempat/Lahir</th>
                <th style="width: 70px">Baptis</th>
                <th style="width: 70px">Sidi</th>
                <th style="width: 70px">Menikah</th>
                <th style="width: 70px">Pindah ke-Tanggal</th>
                <th style="width: 70px">Meninggal</th>            
            </tr>
        </thead>
        <tbody>
            @foreach ($all as $a)
                
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ucfirst($a->nama)}}</td>
                <td style="text-align: center">{{ucfirst($a->status)}}</td>
                <td>{{ucfirst($a->tempat_lahir)}} / {{ \Carbon\Carbon::parse($a->tgl_lahir)->isoFormat('D MMMM Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($a->baptis)->isoFormat('D MMMM Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($a->sidi)->isoFormat('D MMMM Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($a->menikah)->isoFormat('D MMMM Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($a->pindah_tgl)->isoFormat('D MMMM Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($a->meninggal)->isoFormat('D MMMM Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <table style="margin: auto">
        <tr>
            <td style="border: #ddd; width: 150px"></td>
            <td style="border:#ddd; width:130px"></td>
            <td style="text-align: center; border:#ddd">Tarutung, {{ \Carbon\Carbon::parse()->isoFormat('D MMMM Y') }}</td>
        </tr>
    </table>
    <br><br><br>
    <table style="margin: auto">
        <tr>
            <td style="border: #ddd; width: 200px">Masuk Ke GKPI Pearaja Tanggal</td>
            <td style="border:#ddd; width:150px">: {{ \Carbon\Carbon::parse($jemaat->masuk_tgl)->isoFormat('D MMMM Y') }}</td>
            <td style="text-align: center; border:#ddd">Dari Gereja : {{ucfirst($jemaat->pindah_dari)}}</td>
        </tr>
    </table>
    <table style="margin: auto">
        <tr>
            <td style="border: #ddd; width: 200px">Pindah Tanggal</td>
            <td style="border:#ddd; width:150px">: {{ \Carbon\Carbon::parse($jemaat->pindah_tgl)->isoFormat('D MMMM Y') }}</td>
            <td style="text-align: center; border:#ddd">Ke Gereja : {{ucfirst($jemaat->pindah_ke)}}</td>
        </tr>
    </table>
</body>
</html>
