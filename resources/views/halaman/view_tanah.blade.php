@extends('index')
@section('title', 'Tanah')

@section('isihalaman')
    <h3><center>Daftar Tanah</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTanahTambah"> 
        Tambah Data Tanah
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Tanah</td>
                <td align="center">Sertifikat </td>
                <td align="center">NIB</td>
                <td align="center">Email</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($tanah as $index=>$p)
                <tr>
                    <td align="center" scope="row">{{ $index + $tanah->firstItem() }}</td>
                    <td>{{$p->id_tanah}}</td>
                    <td>{{$p->sertifikat}}</td>
                    <td>{{$p->nib}}</td>
                    <td>{{$p->email}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalTanahEdit{{$p->id_tanah}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data tanah -->
                        <div class="modal fade" id="modalTanahEdit{{$p->id_tanah}}" tabindex="-1" role="dialog" aria-labelledby="modalTanahEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTanahEditLabel">Form Edit Data Tanah</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formtanahtaedit" id="formtanahedit" action="/tanah/edit/{{ $p->id_tanah}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_tanah" class="col-sm-4 col-form-label">Nomor Sertifikat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="sertifikat" name="sertifikat" placeholder="Masukkan Nomor Sertifikat">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="nib" class="col-sm-4 col-form-label">NIB</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nib" name="nib" value="{{ $p->nib}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="email" name="email" value="{{ $p->email}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="tanahtambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data tanah -->
                        |
                        <a href="tanah/hapus/{{$p->id_tanah}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $tanah->currentPage() }} <br />
    Jumlah Data : {{ $tanah->total() }} <br />
    Data Per Halaman : {{ $tanah->perPage() }} <br />

    {{ $tanah->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Tanah -->
    <div class="modal fade" id="modalTanahTambah" tabindex="-1" role="dialog" aria-labelledby="modalTanahTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTanahTambahLabel">Form Input Sertifikat Tanah</h5>
                </div>
                <div class="modal-body">
                    <form name="formtanahtambah" id="formtanahtambah" action="/tanah/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_tanah" class="col-sm-4 col-form-label">Nomor Sertifikat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="sertifikat" name="sertifikat" placeholder="Masukan Nomor Sertifikat">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="nib" class="col-sm-4 col-form-label">NIB</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nib" name="nib" placeholder="Masukan NIB">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email" name="email" placeholder="email">
                            </div>
                        </div>
                        
                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="tanahtambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data tanah -->
    
@endsection