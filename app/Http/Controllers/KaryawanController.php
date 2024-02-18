<?php

namespace App\Http\Controllers;


use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    public function redirectToAddKaryawanPage(){
        return view('add_karyawan');
    }

    public function addKaryawan(Request $request){
        // dd($request->all());
        $validated = $request->validate([
            'nama' => 'required|min:5|max:20',
            'umur' => 'required|min:21|integer',
            'alamat' => 'required|string|min:10|max:40',
            'telepon' => 'required|regex:/^08/|min:9|max:12',
        ]);

        $karyawan = Karyawan::create([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect('/');
    }

    public function updateKaryawanPage($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('update_karyawan', ["karyawan" => $karyawan]);
    }
    public function updateKaryawan(Request $request, $id1){
        $validated = $request->validate([
            'nama' => 'required|min:5|max:20',
            'umur' => 'required|min:21|integer',
            'alamat' => 'required|string|min:10|max:40',
            'telepon' => 'required|regex:/^08/|min:9|max:12',
        ]);

        Karyawan::findOrFail($id1)->update([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);


        return redirect('/');
    }

    public function deleteKaryawan(Request $request, $id){

        Karyawan::destroy($id);

        return redirect('/');
    }
}
