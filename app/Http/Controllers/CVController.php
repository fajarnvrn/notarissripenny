<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model CVModel
use App\Models\CVModel;

class CVController extends Controller
{
    //method untuk tampil data cv
    public function cvtampil()
    {
        $datacv = cvModel::orderby('nama_cv', 'ASC')
        ->paginate(5);

        return view('halaman/view_cv',['cv'=>$datacv]);
    }

    //method untuk tambah data cv
    public function cvtambah(Request $request)
    {
        $this->validate($request, [
            'nama_cv' => 'required',
            'hp' => 'required',
        ]);

        CVModel::create([
            'nama_cv' => $request->nama_cv,
            'hp' => $request->hp,
        ]);

        return redirect('/cv');
    }

     //method untuk hapus data cv
     public function cvhapus($id_cv)
     {
         $datacv=CVModel::find($id_cv);
         $datacv->delete();
 
         return redirect()->back();
     }

     //method untuk edit data cv
    public function cvedit($id_cv, Request $request)
    {
        $this->validate($request, [
            'nama_cv' => 'required',
            'hp' => 'required',
        ]);

        $id_cv = CVModel::find($id_cv);
        $id_cv->nama_cv      = $request->nama_cv;
        $id_cv->hp   = $request->hp;

        $id_cv->save();

        return redirect()->back();
    }
}