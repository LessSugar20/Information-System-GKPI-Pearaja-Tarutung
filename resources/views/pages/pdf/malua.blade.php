<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Malua - {{ucfirst($item->nama)}}</title>
    <style>
        body, .body {
            /* font-family: Arial, sans-serif; */
            border-style: double;
            height: 98.8%;
            padding: 4px;
        }
        table {
            /* width: 100%; */
            border-collapse: collapse;
        }
        th, td {
            /* border:solid #ddd; */
            /* padding: 8px; */
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .tengah{
            text-align: center;
            /* font-family:'Times New Roman', Times, serif  */
        }
    </style>
</head>
<body >    
   <div class="body">
        {{-- <p class="tengah" style="padding-left: 80px; padding-right:80px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas fugit voluptatem adipisci excepturi praesentium. Officiis quisquam deleniti minus similique ipsum distinctio dolorum corporis suscipit nobis repellat inventore, consequuntur atque! Dicta.</p> --}}
        <br><br>
        <table style="padding-left: 30px; padding-right:80px; width:100%">
            <tr>
                <td rowspan="2" style="width: 22%;"><img src="assetss/images/logogkpi.png" width="80" height="80" alt=""></td>
                <td class="tengah" style="border-bottom: solid black; padding-top:20px; font-size:20px; font-weight:bold">SURAT TANDA PENEGUHAN SIDI</td>
            </tr>
            <tr>                
                <td class="tengah" style="border-top: solid black; padding-bottom:10px;padding-top:5px; font-size:14px; font-weight:bold">SURAT TANDA MANGHATINDANGKON HAPORSEAON</td>
            </tr>
        </table>
        <br><br><br><br>
        <table style="width: 30%; margin: auto">
            <tr>
                <td style="width: 25px">No</td>
                <td style="width: 10px">:</td>
                <td style="border-bottom: dotted; font-weight:bold; width:10em">{{$item->no_surat}}</td>
            </tr>
        </table>
        <br><br>
        <table style="width: 100%;padding-left: 20px; padding-right:20px">
            <tr>                
                <td  style="border-bottom: solid black; font-size:14px; width:5%; ">Nama</td>                
                <td rowspan="2" style="width: 10px; padding-left:120px">: </td>
                <td rowspan="2" style="width: 80%; border-bottom: dotted;font-weight:bold; text-transform:uppercase">{{ucfirst($item->nama)}}</td>
            </tr>
            <tr>
                <td  style="border-top: solid black; font-size:14px;">Goar</td>
            </tr>
        </table>
        <table style="width: 100%;padding-left: 20px; padding-right:20px">
            <tr>                
                <td  style="border-bottom: solid black; font-size:14px; width:20%">Tempat/Tanggal lahir</td>                
                <td rowspan="2" style="width: 10px; padding-left:30px">: </td>
                <td rowspan="2" style="width: 80%; border-bottom: dotted">{{ucfirst($item->tempat_lahir)}}, {{ \Carbon\Carbon::parse($item->tgl_lahir)->isoFormat('D MMMM Y') }}</td>
            </tr>
            <tr>
                <td  style="border-top: solid black; font-size:14px;">Tubu/di ari</td>
            </tr>
        </table>
        <table style="width: 100%;padding-left: 20px; padding-right:20px">
            <tr>                
                <td  style="border-bottom: solid black; font-size:14px; width:18%">Dibaptiskan tanggal</td>                
                <td rowspan="2" style="width: 10px; padding-left:40px">: </td>
                <td rowspan="2" style="width: 80%; border-bottom: dotted">{{ \Carbon\Carbon::parse($item->tanggal_baptis)->isoFormat('D MMMM Y') }}</td>
            </tr>
            <tr>
                <td  style="border-top: solid black; font-size:14px;">Tardidi di ari</td>
            </tr>
        </table>
        <table style="width: 100%;padding-left: 20px; padding-right:20px">
            <tr>                
                <td  style="border-bottom: solid black; font-size:14px; width:14%">Anggota Jemaat</td>                
                <td rowspan="2" style="width: 10px; padding-left:63px">: </td>
                <td rowspan="2" style="width: 80%; border-bottom: dotted">GKPI Pearaja Resort Pearaja Tarutung</td>
            </tr>
            <tr>
                <td  style="border-top: solid black; font-size:14px;">Ruas ni Huria</td>
            </tr>
        </table>
        <table style="width: 100%;padding-left: 20px; padding-right:20px">
            <tr>                
                <td  style="border-bottom: solid black; font-size:14px; width:22%">Peneguhan sidi tanggal</td>                
                <td rowspan="2" style="width: 10px; padding-left:21px">: </td>
                <td rowspan="2" style="width: 80%; border-bottom: dotted">{{ \Carbon\Carbon::parse($item->tanggal_sidi)->isoFormat('D MMMM Y') }}</td>
            </tr>
            <tr>
                <td  style="border-top: solid black; font-size:14px;">Manghantindanghon</td>
            </tr>
        </table>
        <table style="width: 100%;padding-left: 20px; padding-right:20px">
            <tr>                
                <td  style="border-bottom: solid black; font-size:14px; width:24%">Pendeta yang melayani</td>                
                <td rowspan="2" style="width: 10px; padding-left:12px">: </td>
                <td rowspan="2" style="width: 80%; border-bottom: dotted">{{ucfirst($item->pendeta)}}</td>
            </tr>
            <tr>
                <td  style="border-top: solid black; font-size:14px;">Pandita na mamasumasu</td>
            </tr>
        </table>
        <p class="tengah">di</p>
        <p class="tengah" style="font-weight: bolder; font-size: 1.2em; margin-top: -15px">GEREJA KRISTEN PROTESTAN INDONESIA</p>
        <p class="tengah" style="font-weight: bolder; font-size: 1.2em;margin-top: -15px">(G K P I)</p>
        <table style="margin: auto; margin-top: -12px">
            <tr>
                <td style="border-bottom: dotted;font-weight: bolder; font-size: 1.2em; font-family:font-family:'Times New Roman', Times, serif;">JEMAAT PEARAJA - RESORT PEARAJA TARUTUNG</td>
            </tr>
        </table>
        <p class="tengah" style="padding-top: 0px">Nats / Ayat Sidi</p>
        <table style="padding-left: 80px; padding-right:80px; margin-top:-15px">
            <tr>
                <td style="font-weight: bold; padding-right:10px; width:100px">{{ucfirst($al->kitab)}} {{$al->pasal}} : {{$al->ayat}}</td>
                <td style="text-align: justify">{{ucfirst($al->firman)}}</td>
            </tr>
        </table><br>
        <table style="width: 100%;padding-left: 30px; padding-right:30px;">
            <tr>
                <td class="tengah" style="width:40%">Pendeta Resort/ <br> Pemimpin Jemaat,</td>
                <td></td>
                <td class="tengah" style="width: 40%">Guru Jemaat,</td>
            </tr>
            <tr >
                <td style="padding-top: 40px"></td>
                <td style="padding-top: 40px"></td>
                <td style="padding-top: 40px"></td>
            </tr>
            <tr>
                <td class="tengah" style="font-weight: bold;padding-top: 10px; border-bottom:dotted;">{{ucfirst($item->pendeta)}}</td>
                <td></td>
                <td class="tengah" style="font-weight: bold;padding-top: 10px;border-bottom:dotted;">{{ucfirst($item->guru_jemaat)}}</td>
            </tr>
        </table>
        {{-- <br> --}}        
   </div>
</body>
</html>
