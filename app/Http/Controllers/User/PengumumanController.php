<?php

namespace App\Http\Controllers\User;

use App\Models\Account;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PengumumanController extends Controller
{    

    public function index(){
        $expire = Carbon::today()->subWeeks(1);
        $p = Pengumuman::select('pengumuman.*')
                        ->where('pengumuman.created_at', '>', $expire)                        
                        ->get();        
        return view('pages.user.pengumuman.pengumuman', compact('p'));
    }
    
}
