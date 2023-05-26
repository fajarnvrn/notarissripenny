<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model Tanah
use App\Models\TanahModel;

class TanahController extends Controller
{
    //method untuk tampil data Tanah
    public function tanahtampil()
    {
        $datatanah = TanahModel::orderby('sertifikat', 'ASC')
        ->paginate(5);

        return view('halaman/view_tanah',['tanah'=>$datatanah]);
    }

    //method untuk tambah data tanah
    public function tanahtambah(Request $request)
    {
        $this->validate($request, [
            'sertifikat' => 'required',
            'nib' => 'required',
            'email' => 'required',
        ]);

        TanahModel::create([
            'sertifikat' => $request->sertifikat,
            'nib' => $request->nib,
            'email' => $request->email,
        ]);

        return redirect('/tanah');
    }


     //method untuk hapus data tanah
     public function tanahhapus($id_tanah)
     {
         $datatanah=TanahModel::find($id_tanah);
         $datatanah->delete();
 
         return redirect()->back();
     }

     //method untuk edit data tanah
    public function tanahedit($id_tanah, Request $request)
    {
        $this->validate($request, [
            'sertifikat' => 'required',
            'nib' => 'required',
            'email' => 'required',
        ]);

        $id_tanah = TanahModel::find($id_tanah);
        $id_tanah->sertifikat  = $request->sertifikat;
        $id_tanah->nib   = $request->nib;
        $id_tanah->email   = $request->email;

        $id_tanah->save();

        return redirect()->back();
    }
}