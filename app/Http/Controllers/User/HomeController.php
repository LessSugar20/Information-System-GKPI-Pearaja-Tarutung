<?php

namespace App\Http\Controllers\User;

use App\Models\Ayat;
use App\Models\Jemaat;
use App\Models\Sektor;
use App\Models\Penatua;
use App\Models\UserJemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function beranda(){
        $now = Carbon::today();
        $ayat = Ayat::Join('alkitab', 'alkitab.id', '=', 'ayat.id_alkitab')
        ->select('alkitab.*', 'ayat.*')
        ->where('ayat.tanggal', '=', $now)
        ->get();
        $jemaat = UserJemaat::count();
        $jemaat_aktif = UserJemaat::where('status', 'aktif')->count();
        $kel = Jemaat::count();
        $kel_aktif = Jemaat::where('pindah_ke', '=', Null)->count();
        $sektor = Sektor::count();
        $penatua = Penatua::count();
        return view('pages.user.home', compact('ayat', 'jemaat', 'jemaat_aktif', 'kel', 'kel_aktif', 'sektor', 'penatua'));
    }
}
