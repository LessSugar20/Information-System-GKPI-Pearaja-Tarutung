<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Malua;
use App\Models\Jemaat;
use App\Models\Menikah;
use App\Models\Tardidi;
use App\Models\UserJemaat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Alkitab;
use Illuminate\Support\Facades\View;

class PdfController extends Controller
{
    public function malua($id)
    {        
        $malua = Malua::find($id);
        $al = Alkitab::join('malua', 'malua.nats', '=', 'alkitab.id')->where('malua.nats', '=', $malua->nats)->first();
        $item = UserJemaat::join('malua', 'malua.id_user_jemaat', '=', 'user_jemaat.id')
            ->where('malua.id_user_jemaat', '=', $malua->id_user_jemaat)
            ->first();
        // dd($item);
        $pdf = PDF::loadView('pages.pdf.malua', compact('malua', 'item', 'al'));
 
        $asd = 'Surat_Malua.pdf';

        return $pdf->stream($asd);
    }
    public function menikah($id)
    {
        $menikah = Menikah::find($id);
        $al = Alkitab::join('menikah', 'menikah.nats', '=', 'alkitab.id')->where('menikah.nats', '=', $menikah->nats)->first();
        // dd($al);
        // $item = Tardidi::join('sektor', 'sektor.id', '=', 'menikah.id_sektor')->where('menikah.id_sektor', '=', $menikah->id_sektor)->first();
       $pdf = PDF::loadView('pages.pdf.menikah', compact('menikah', 'al'));
       
    
        $asd = 'Surat_Menikah.pdf';

        return $pdf->stream($asd);
    }
    public function tardidi($id)
    {
        $tardidi = Tardidi::find($id);
        $item = Tardidi::join('sektor', 'sektor.id', '=', 'tardidi.id_sektor')->where('tardidi.id_sektor', '=', $tardidi->id_sektor)->first();
        // dd($item);
        $pdf = PDF::loadView('pages.pdf.tardidi', compact('tardidi', 'item'));
      
        $asd = 'Surat_Tardidi.pdf';

        return $pdf->stream($asd);
    }
    public function jemaat($id)
    {            
        $jemaat = Jemaat::find($id);
       
        $all = UserJemaat::Join('jemaat', 'jemaat.id', '=', 'user_jemaat.no_induk')
        ->select('jemaat.*', 'user_jemaat.*')
        ->where('user_jemaat.no_induk','=', $jemaat->id)
        ->get();
        $now = date('d-M-Y');
        // dd($now);
        $pdf = PDF::loadView('pages.pdf.jemaat', compact('jemaat', 'all'));     
        $asd = 'Data_KeluargaJemaat_' .$now. '.pdf';

        return $pdf->stream($asd);
    }
    public function userjemaat()
    {            
        $jemaat = UserJemaat::Join('jemaat', 'jemaat.id', '=', 'user_jemaat.no_induk')
        ->select('jemaat.*', 'user_jemaat.*')
        ->get();
        $now = date('d-M-Y');
        $pdf = PDF::loadView('pages.pdf.userjemaat', compact('jemaat'));     
        $asd = 'Data_Jemaat_' .$now. '.pdf';

        return $pdf->stream($asd);
    }
}
