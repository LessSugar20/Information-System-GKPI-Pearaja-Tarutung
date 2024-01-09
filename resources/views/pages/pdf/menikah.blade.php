<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contoh PDF dengan Tabel</title>
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
        {{-- <p class="tengah" style="padding-left: 80px; padding-right:80px; margin-top:-5px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas fugit voluptatem adipisci excepturi praesentium. Officiis quisquam deleniti minus similique ipsum distinctio dolorum corporis suscipit nobis repellat inventore, consequuntur atque! Dicta.</p> --}}
        <br><br>
        <table style="padding-left: 30px; padding-right:80px; width:100%; margin-top:-18px">
            <tr>
                <td rowspan="2" style="width: 22%;"><img src="assetss/images/logogkpi.png" width="80" height="80" alt=""></td>
                <td class="tengah" style="border-bottom: solid black; padding-top:20px; font-size:20px; font-weight:bold">SURAT PEMBERKATAN PERKAWINAN</td>
            </tr>
            <tr>                
                <td class="tengah" style="border-top: solid black; padding-bottom:10px;padding-top:5px; font-size:20px; font-weight:bold">SURAT PAMASUMASUON PARBAGASON</td>
            </tr>
        </table>
        <br><br><br><br>
        <table style="width: 30%; margin: auto">
            <tr>
                <td style="width: 25px">No</td>
                <td style="width: 10px">:</td>
                <td style="border-bottom: dotted; font-weight:bold; width:10em">{{ucfirst($menikah->no_surat)}}</td>
            </tr>
        </table>
        <br>
        <P class="tengah">Telah menerima pemberkatan perkawinan</P>
        <p class="tengah" style="font-style: italic;margin-top:-17px">Nunga manjalo pasupasu parbagason</p><br>
        <table style="width: 100%;padding-left: 20px; padding-right:20px">
            <tr>                
                <td  style="font-size:14px; width:20%">Tuan</td>                
                <td  style="width: 10px; padding-left:30px">: </td>
                <td  style="width: 80%; border-bottom: dotted;text-transform:uppercase;font-weight:bold">{{ucfirst($menikah->pria)}}</td>
            </tr>         
        </table>
        <p class="tengah" style="margin-top: 0px">dengan / dohot</p>
        <table style="width: 100%;padding-left: 20px; padding-right:20px; margin-top:-10px">
          <tr>                
              <td  style="font-size:14px; width:20%">Nona</td>                
              <td  style="width: 10px; padding-left:30px">: </td>
              <td  style="width: 80%; border-bottom: dotted;text-transform:uppercase;font-weight:bold">{{ucfirst($menikah->wanita)}}</td>
          </tr>       
      </table>
      <br>
      <table style="width: 100%;padding-left: 20px; padding-right:20px;padding-top:10px">
          <tr>                
              <td  style="font-size:14px; width:20%">Pada tanggal</td>                
              <td  style="width: 10px; padding-left:30px">: </td>
              <td  style="width: 80%; border-bottom: dotted;font-weight:bold">{{ \Carbon\Carbon::parse($menikah->tanggal)->isoFormat('D MMMM Y') }}</td>
          </tr>       
      </table>
      <table style="width: 100%;padding-left: 20px; padding-right:20px;padding-top:15px">
          <tr>                
              <td  style="font-size:14px; width:22%">Pendeta yang melayani</td>                
              <td  style="width: 10px; padding-left:20px">: </td>
              <td  style="width: 80%; border-bottom: dotted;font-weight:bold">{{ucfirst($menikah->pendeta)}}</td>
          </tr>       
      </table>
      <table style="width: 100%;padding-left: 20px; padding-right:20px;padding-top:15px">
          <tr>                
              <td  style="font-size:14px; width:20%">Nats/Ayat</td>                
              <td  style="width: 10px; padding-left:30px">: </td>
              <td  style="width: 80%; border-bottom: dotted; text-align:justify"><div style="text-transform:uppercase;font-weight:bold">{{ucfirst($al->kitab)}} {{$al->pasal}} : {{$al->ayat}}</div> {{ucfirst($al->firman)}}</td>
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
          <br>
        <table style="width: 100%;padding-left: 30px; padding-right:30px;padding-bottom:8px; padding-top:10px">
            <tr>
                <td class="tengah" style="width:32%">Pendeta Resort/ <br> Pemimpin Jemaat,</td>
                <td></td>
                <td class="tengah" style="width: 32%">Guru Jemaat,</td>
            </tr>
            <tr >
                <td style="padding-top: 15px"></td>
                <td></td>
                <td style="padding-top: 15px"></td>
            </tr>
            <tr>
                <td class="tengah" style="font-weight: bold;padding-top: 30px; border-bottom:dotted;">{{ucfirst($menikah->pendeta)}}</td>
                <td></td>
                <td class="tengah" style="font-weight: bold;padding-top: 30px;border-bottom:dotted;">{{ucfirst($menikah->guru_jemaat)}}</td>
            </tr>
        </table>
        <table style="width: 100%;padding-left: 30px; padding-right:30px;">
          <tr>
              <td class="tengah" style="width:35%">SAKSI <br> Orangtua pengantin laki-laki,</td>
              <td></td>
              <td class="tengah" style="width: 35%">SAKSI <br> Orangtua pengantin perempuan,</td>
          </tr>
          <tr >
              <td style="padding-top: 15px"></td>
              <td></td>
              <td style="padding-top: 15px"></td>
          </tr>
          <tr>
              <td class="tengah" style="font-weight: bold;padding-top: 30px; border-bottom:dotted;">{{ucfirst($menikah->wali_pria)}}</td>
              <td></td>
              <td class="tengah" style="font-weight: bold;padding-top: 30px;border-bottom:dotted;">{{ucfirst($menikah->wali_wanita)}}</td>
          </tr>
      </table>
   </div>
</body>
</html>
