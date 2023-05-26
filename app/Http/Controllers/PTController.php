<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model PTModel
use App\Models\PTModel;

class PTController extends Controller
{
 //method untuk tampil data pt
 public function pttampil()
 {
     $datapt = ptModel::orderby('kode_pt', 'ASC')
     ->paginate(5);

     return view('halaman/view_pt',['pt'=>$datapt]);
 }

 //method untuk tambah data pt
 public function pttambah(Request $request)
 {
     $this->validate($request, [
         'kode_pt' => 'required',
         'judul' => 'required',
         'pengarang' => 'required',
         'kategori' => 'required',
     ]);

     PTModel::create([
         'kode_pt' => $request->kode_pt,
         'judul' => $request->judul,
         'pengarang' => $request->pengarang,
         'kategori' => $request->kategori,
     ]);

     return redirect('/pt');
 }

  //method untuk hapus data pt
  public function pthapus($id_pt)
  {
      $datapt=PTModel::find($id_pt);
      $datapt->delete();

      return redirect()->back();
  }

  //method untuk edit data pt
 public function ptedit($id_pt, Request $request)
 {
     $this->validate($request, [
         'kode_pt' => 'required',
         'judul' => 'required',
         'pengarang' => 'required',
         'kategori' => 'required',
     ]);

     $id_pt = PTModel::find($id_pt);
     $id_pt->kode_pt   = $request->kode_pt;
     $id_pt->judul      = $request->judul;
     $id_pt->pengarang  = $request->pengarang;
     $id_pt->kategori   = $request->kategori;

     $id_pt->save();

     return redirect()->back();
 }
}