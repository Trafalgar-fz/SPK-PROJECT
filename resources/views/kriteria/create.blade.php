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
                        <h5 class="mb-0">Tambah Kriteria</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('kriteria') }}">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Kode Kriteria</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="C1" name="kode" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Kriteria</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="" name="nama_kriteria" required/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Bobot</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="" name="bobot" required/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="select" class=" col-sm-5 col-form-label ">Atribut</label>
                                <select name="atribut" class="form-control" autofocus required>
                                    <option selected>---PILIH----</option>
                                    <option value="Benefit">Benefit</option>
                                    <option value="Cost">Cost</option>
                                </select>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-8 d-flex">
                                    <button type="submit" name="action" value="save" class="me-2 btn btn-primary d-inline-flex align-items-center"><i class="bx bx-save me-2 ms-n1"></i>Simpan</button>
                                    <button type="submit" name="action" value="save_and_add" class="btn btn-outline-primary ">Simpan dan Tambah Lagi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
