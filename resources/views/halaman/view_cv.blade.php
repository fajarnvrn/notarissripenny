@extends('index')
@section('title', 'CV')

@section('isihalaman')
    <h3><center>Daftar CV</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCVTambah"> 
        Tambah Data CV 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID CV</td>
                <td align="center">Nama CV</td>
                <td align="center">Nomor HP</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($cv as $index=>$a)
                <tr>
                    <td align="center" scope="row">{{ $index + $cv->firstItem() }}</td>
                    <td>{{$a->id_cv}}</td>
                    <td>{{$a->nama_cv}}</td>
                    <td>{{$a->hp}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalCVEdit{{$a->id_cv}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data CV -->
                        <div class="modal fade" id="modalCVEdit{{$a->id_cv}}" tabindex="-1" role="dialog" aria-labelledby="modalcvEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCVEditLabel">Form Edit Data CV</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formcvedit" id="formcvedit" action="/cv/edit/{{ $a->id_cv}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_cv" class="col-sm-4 col-form-label">Nama CV</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_CV" name="nama_CV" placeholder="Masukan Nama CV">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="hp" class="col-sm-4 col-form-label">Nomor HP</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="hp" name="hp" value="{{ $a->hp}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="cvtambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data cv -->
                        |
                        <a href="cv/hapus/{{$a->id_cv}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $cv->currentPage() }} <br />
    Jumlah Data : {{ $cv->total() }} <br />
    Data Per Halaman : {{ $cv->perPage() }} <br />

    {{ $cv->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data CV -->
    <div class="modal fade" id="modalCVTambah" tabindex="-1" role="dialog" aria-labelledby="modalCVTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCVTambahLabel">Form Input Data CV</h5>
                </div>
                <div class="modal-body">
                    <form name="formcvtambah" id="formcvtambah" action="/cv/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_cv" class="col-sm-4 col-form-label">Nama CV</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_cv" name="nama_cv" placeholder="Masukan Nama CV">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="hp" class="col-sm-4 col-form-label">Nomor HP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukan Nomor HP">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="cvtambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data cv -->
    
@endsection