@extends('index')
@section('title', 'Waris')

@section('isihalaman')
    <h3><center>Daftar Waris</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalWarisTambah"> 
        Tambah Data Waris 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Waris</td>
                <td align="center">Nama Waris</td>
                <td align="center">Nama Anggota</td>
                <td align="center">KK</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($waris as $index=>$w)
                <tr>
                    <td align="center" scope="row">{{ $index + $waris->firstItem() }}</td>
                    <td>{{$w->id_waris}}</td>
                    <td>{{$w->nama}}</td>
                    <td>{{$w->anggota}}</td>
                    <td>{{$w->kk}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalWarisEdit{{$w->id_waris}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data Waris -->
                        <div class="modal fade" id="modalWarisEdit{{$w->id_waris}}" tabindex="-1" role="dialog" aria-labelledby="modalWarisEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalWarisEditLabel">Form Edit Data Waris</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formwarisedit" id="formwarisedit" action="/waris/edit/{{ $w->id_waris}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_waris" class="col-sm-4 col-form-label">Nama Waris</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_waris" name="nama_waris" placeholder="Masukan Nama Waris">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="anggota" name="anggota" value="{{$w->anggota}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="kk" class="col-sm-4 col-form-label">KK</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="kk" name="kk" value="{{$w->kk}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="kktambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data waris -->
                        |
                        <a href="waris/hapus/{{$w->id_waris}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $waris->currentPage() }} <br />
    Jumlah Data : {{ $waris->total() }} <br />
    Data Per Halaman : {{ $waris->perPage() }} <br />

    {{ $waris->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Waris -->
    <div class="modal fade" id="modalWarisTambah" tabindex="-1" role="dialog" aria-labelledby="modalWarisTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalWarisTambahLabel">Form Input Data Waris</h5>
                </div>
                <div class="modal-body">
                    <form name="formwaristambah" id="formwaristambah" action="/waris/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_waris" class="col-sm-4 col-form-label">Nama Waris</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_waris" name="nama_waris" placeholder="Masukan Nama Waris">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="anggota" name="anggota" placeholder="Masukan Nama Anggota">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="kk" class="col-sm-4 col-form-label">KK</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kk" name="kk" placeholder="Masukkan Nomor KK">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="waristambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data waris -->
    
@endsection