<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model Waris
use App\Models\WarisModel;

class WarisController extends Controller
{
    //method untuk tampil data waris
    public function waristampil()
    {
        $datawaris = WarisModel::orderby('nama', 'ASC')
        ->paginate(5);

        return view('halaman/view_waris',['waris'=>$datawaris]);
    }

    //method untuk tambah data waris
    public function waristambah(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'anggota' => 'required',
            'kk' => 'required',
        ]);

        WarisModel::create([
            'nama' => $request->nama,
            'anggota' => $request->anggota,
            'kk' => $request->kk,
        ]);

        return redirect('/waris');
    }


     //method untuk hapus data waris
     public function warishapus($id_waris)
     {
         $datawaris=WarisModel::find($id_waris);
         $datawaris->delete();
 
         return redirect()->back();
     }

     //method untuk edit data waris
    public function warisedit($id_waris, Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'anggota' => 'required',
            'kk' => 'required',
        ]);

        $id_waris = WarisModel::find($id_waris);
        $id_waris->nama_Waris      = $request->nama_waris;
        $id_waris->anggota   = $request->anggota;
        $id_waris->kk   = $request->kk;

        $id_waris->save();

        return redirect()->back();
    }
}