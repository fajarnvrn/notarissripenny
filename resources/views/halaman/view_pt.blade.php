@extends('index')
@section('title', 'PT')

@section('isihalaman')
    <h3><center>Daftar PT</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPTTambah"> 
        Tambah Data PT 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID PT</td>
                <td align="center">Kode PT</td>
                <td align="center">Nama PT</td>
                <td align="center">Modal</td>
                <td align="center">Kategori</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($pt as $index=>$bk)
                <tr>
                    <td align="center" scope="row">{{ $index + $pt->firstItem() }}</td>
                    <td>{{$bk->id_pt}}</td>
                    <td>{{$bk->kode_pt}}</td>
                    <td>{{$bk->judul}}</td>
                    <td>{{$bk->pengarang}}</td>
                    <td>{{$bk->kategori}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPTEdit{{$bk->id_pt}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data PT -->
                        <div class="modal fade" id="modalPTEdit{{$bk->id_pt}}" tabindex="-1" role="dialog" aria-labelledby="modalptEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPTEditLabel">Form Edit Data PT</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formptedit" id="formptedit" action="/pt/edit/{{ $bk->id_pt}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_pt" class="col-sm-4 col-form-label">Kode PT</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="kode_PT" name="kode_PT" placeholder="Masukan Kode PT">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="judul" class="col-sm-4 col-form-label">Nama PT</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $bk->judul}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="pengarang" class="col-sm-4 col-form-label">Modal</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ $bk->pengarang}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $bk->kategori}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="pttambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data pt -->
                        |
                        <a href="pt/hapus/{{$bk->id_pt}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $pt->currentPage() }} <br />
    Jumlah Data : {{ $pt->total() }} <br />
    Data Per Halaman : {{ $pt->perPage() }} <br />

    {{ $pt->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data PT -->
    <div class="modal fade" id="modalPTTambah" tabindex="-1" role="dialog" aria-labelledby="modalPTTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPTTambahLabel">Form Input Data PT</h5>
                </div>
                <div class="modal-body">
                    <form name="formpttambah" id="formpttambah" action="/pt/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_pt" class="col-sm-4 col-form-label">Kode PT</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kode_pt" name="kode_pt" placeholder="Masukan Kode PT">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-4 col-form-label">Nama PT</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Nama PT">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="pengarang" class="col-sm-4 col-form-label">Modal</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Masukan Modal">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukan Kategori">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="pttambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data pt -->
    
@endsection