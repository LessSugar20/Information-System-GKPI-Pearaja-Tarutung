<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Ibadah;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Partangiangan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{
    public function index(){
        $endDate = Carbon::now()->endOfWeek();
        $i = Ibadah::whereDate('tanggal', '<=', $endDate)->latest()->get();
        $p = Partangiangan::whereDate('tanggal', '<=', $endDate)->get();
        $x = 1;       
        $y = 1;       
        return view('pages.user.ibadah.ibadah', compact('i','p','x', 'y'));
    }

    public function downIbadah($id)
    {
        $ibadah = Ibadah::findOrFail($id);

        // Pastikan file path ada sebelum mengaksesnya
        if ($ibadah->path) {
            return Storage::download($ibadah->path);
        }

        // Tindakan jika file path tidak ada
    }

    public function downPartangiangan($id)
    {
        $ibadah = Partangiangan::findOrFail($id);

        // Pastikan file path ada sebelum mengaksesnya
        if ($ibadah->path) {
            return Storage::download($ibadah->path);
        }

        // Tindakan jika file path tidak ada
    }
    
}
