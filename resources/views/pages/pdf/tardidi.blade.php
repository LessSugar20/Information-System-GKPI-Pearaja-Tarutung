<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Tardidi - {{ucfirst($tardidi->nama)}}</title>
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
                <td class="tengah" style="border-bottom: solid black; padding-top:20px; font-size:23px; font-weight:bold">SURAT BAPTISAN</td>
            </tr>
            <tr>                
                <td class="tengah" style="border-top: solid black; padding-bottom:10px;padding-top:5px; font-size:17px; font-weight:bold">SURAT PANDIDION</td>
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
        <br>
        <p class="tengah">Untuk / Ni</p>
        <table style="margin: auto; margin-top: -12px; width: 100%; padding-left:80px; padding-right:80px">
          <tr>
              <td class="tengah" style="border-bottom: dotted;font-weight: bolder; font-size: 1.2em; font-family:font-family:'Times New Roman', Times, serif; text-transform:uppercase">{{$tardidi->nama}}</td>
          </tr>
      </table>
      <br>
        <table style="width: 100%;padding-left: 20px; padding-right:20px">
            <tr>                
                <td  style="border-bottom: solid black; font-size:14px; width:20%">Tempat/Tanggal lahir</td>                
                <td rowspan="2" style="width: 10px; padding-left:30px">: </td>
                <td rowspan="2" style="width: 80%; border-bottom: dotted">{{ucfirst($item->tempat_lahir)}}, {{ \Carbon\Carbon::parse($item->tanggal_lahir)->isoFormat('D MMMM Y') }}</td>
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
               <td  style="border-bottom: solid black; font-size:14px; width:22%">Orang tua laki-laki</td>                
               <td rowspan="2" style="width: 10px; padding-left:21px">: </td>
               <td rowspan="2" style="width: 80%; border-bottom: dotted">{{ucfirst($item->ayah)}}</td>
          </tr>
          <tr>
               <td  style="border-top: solid black; font-size:14px;">Natorasna baoa</td>
          </tr>
     </table>
     <table style="width: 100%;padding-left: 20px; padding-right:20px">
          <tr>                
               <td  style="border-bottom: solid black; font-size:14px; width:22%">Orang tua perempuan</td>                
               <td rowspan="2" style="width: 10px; padding-left:21px">: </td>
               <td rowspan="2" style="width: 80%; border-bottom: dotted">{{ucfirst($item->ibu)}}</td>
          </tr>
          <tr>
               <td  style="border-top: solid black; font-size:14px;">Natorasna boru</td>
          </tr>
     </table>
        <table style="width: 100%;padding-left: 20px; padding-right:20px">
          <tr>                
               <td  style="border-bottom: solid black; font-size:14px; width:22%">Alamat/Tempat tinggal</td>                
               <td rowspan="2" style="width: 10px; padding-left:21px">: </td>
               <td rowspan="2" style="width: 80%; border-bottom: dotted">{{ucfirst($item->lokasi)}}</td>
          </tr>
          <tr>
               <td  style="border-top: solid black; font-size:14px;">Hutana</td>
          </tr>
     </table>
     <table style="width: 100%;padding-left: 20px; padding-right:20px">
         <tr>                
             <td  style="border-bottom: solid black; font-size:14px; width:14%">Gereja/Jemaat</td>                
             <td rowspan="2" style="width: 10px; padding-left:63px">: </td>
             <td rowspan="2" style="width: 80%; border-bottom: dotted">GKPI Pearaja Tarutung</td>
         </tr>
         <tr>
             <td  style="border-top: solid black; font-size:14px;">Huria</td>
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
                <td style="border-bottom: dotted;font-weight: bolder; font-size: 1.2em; font-family:font-family:'Times New Roman', Times, serif;">PEARAJA - RESORT PEARAJA TARUTUNG</td>
            </tr>
        </table>
      <br>
        <table style="width: 100%;padding-left: 30px; padding-right:30px;">
            <tr>
                <td class="tengah" style="width:40%">Pendeta Resort/ <br> Pemimpin Jemaat,</td>
                <td></td>
                <td class="tengah" style="width: 40%">Guru Jemaat,</td>
            </tr>
            <tr >
                <td style="padding-top: 20px"></td>
                <td></td>
                <td style="padding-top: 20px"></td>
            </tr>
            <tr>
                <td class="tengah" style="font-weight: bold;padding-top: 30px; border-bottom:dotted;">{{ucfirst($item->pendeta)}}</td>
                <td></td>
                <td class="tengah" style="font-weight: bold;padding-top: 30px;border-bottom:dotted;">{{ucfirst($item->guru_jemaat)}}</td>
            </tr>
        </table>
        {{-- <br> --}}
        
   </div>
</body>
</html>
