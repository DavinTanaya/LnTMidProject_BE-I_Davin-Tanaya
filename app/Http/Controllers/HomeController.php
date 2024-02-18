<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home () {
        $list_karyawan = Karyawan::all();
        return view('dashboard', [
            "list_karyawan" => $list_karyawan
        ]);
    }
    
}
