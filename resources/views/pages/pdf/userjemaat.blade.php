<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Jemaat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* transform: rotateY(0deg); */
            /* margin: 1rem; */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            /* margin-left: 20px; */
            margin: auto;
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
            <h3 class="judul" style="font-size: 1.2rem;">DATA JEMAAT GKPI JEMAAT PEARAJA RESORT PEARAJA TARUTUNG <br> WILAYAH VI - TAPANULI UTARA</h3>        
            <h5 class="judul">Jl. Sisingamangaraja No.108b</h5>
        </center>

    </div>
   
    <hr>
    <br>
  
    <table  >
        <thead>
            <tr>
                <th>No</th>
                <th style="width: 130px">Nama</th>
                <th>No Induk</th>
                <th style="width: 100px">Tempat/Lahir</th>
                <th style="width: 70px">Baptis</th>
                <th style="width: 70px">Sidi</th>
                <th style="width: 70px">Menikah</th>
                <th style="width: 70px">Pindah ke-Tanggal</th>
                <th style="width: 70px">Meninggal</th>            
            </tr>
        </thead>
        <tbody>
            @foreach ($jemaat as $a)
                
            <tr>
                <td style="text-align: center">{{$loop->iteration}}</td>
                <td>{{ucfirst($a->nama)}}</td>                
                <td style="text-align: center">{{$a->no_induk}}</td>
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
</body>
</html>
