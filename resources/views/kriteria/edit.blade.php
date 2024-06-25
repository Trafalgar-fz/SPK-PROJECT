@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Data Kriteria /</span> Tambah Kriteria</h4>

        <a href="{{ url('kriteria') }}" class="btn btn-primary mb-3 d-inline-flex align-items-center"><i class="bx bx-chevron-left me-2 ms-n1"></i>Kembali</a>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible mb-3" role="alert">
                <ul class="ps-3 mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible mb-3" role="alert">
                {!! session('success') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Kriteria</h5>
                    </div>
                    <div class="card-body">
                        @if ($ubahkriteria)  
                        <form method="POST" action=" {{ url('kriteria/' . $ubahkriteria->kode) }}">
                            @method('PATCH')
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Kode</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="22312005" name="kode" autocomplete="off" value= {{ $ubahkriteria->kode }} required/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Kriteria</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="jhondoe" name="nama_kriteria" autocomplete="off" value="{{ $ubahkriteria->nama_kriteria }}" required/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Bobot</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="bobot" autocomplete="off" value= {{ $ubahkriteria->bobot }}>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="select" class=" col-sm-2 col-form-label ">Atribut</label>
                                <select name="atribut" class="form-control" autofocus required>
                                    <option>{{ $ubahkriteria->atribut}}</option>
                                    <option value="Benefit">Benefit</option>
                                    <option value="Cost">Cost</option>
                                </select>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-8 d-flex">
                                    <button type="submit" name="action" value="save" class="me-2 btn btn-primary d-inline-flex align-items-center"><i class="bx bx-save me-2 ms-n1"></i>Simpan</button>
                                </div>
                            </div>
                        </form>
                      @else
                      <div class="alert alert-danger" role="alert">
                        Data Kriteria Tidak Di Temukan
                      </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
