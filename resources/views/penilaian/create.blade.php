@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Penilaian /</span> Tambah Penilaian</h4>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible mb-3" role="alert">
            {!! session('success') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-3">
        <div class="card-header">
            <div class="row justify-content-between align-items-end">
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <form action="" method="get">
                        <label class="form-label">Cari</label>
                        <input type="search" class="form-control" placeholder="Apa yang anda cari?" name="search" value="">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ url('penilaian') }}" method="POST">
                @csrf
                <div class="table-responsive mb-3">
                    <div class="row mb-3">
                        <input type="hidden" name="idnilai" id="idnilai">
                        <label for="select" class=" col-sm-2 col-form-label ">Nama Siswa</label>
                        <select name="name" id="name" class="form-control" autofocus required>
                            <option value="">---Pilih---</option>
                            @foreach ($alternatif as $item)
                            <option value="{{ $item->nisn }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <table class="table w-100">
                        <thead>
                            <tr>
                                @foreach ($kriteria as $item)
                                    <th> {{ $item->kode }}-{{ $item->nama_kriteria }}</th>
    
                                @endforeach
                            </tr>
    
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($kriteria as $item)
                                    @foreach ($sub as $itemx)
                                        @if ($item->kode == $itemx->kode_id)
                                            @if (is_numeric($itemx->nilai_awal))
                                                <td>
                                                    <input type="text" class="form-control"
                                                        name="sub[]">
                                                    <input type="hidden" class="form-control"
                                                        name="idkriteria[]" value="{{ $itemx->kode_id }}">
                                                </td>
                                            @else
                                                <td>
                                                    <select name="sub[]" class="form-control">
                                                        @foreach ($sub as $itemv)
                                                            @if ($item->kode == $itemv->kode_id)
                                                                <option value="{{ $itemv->nilai_awal }}">
                                                                    {{ $itemv->nilai_awal }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" class="form-control"
                                                        name="idkriteria[]" value="{{ $itemx->kode_id }}">
    
                                                </td>
                                            @endif
                                        @break
                                    @endif
                                @endforeach
                            @endforeach
                        </tr>
                    </tbody>
                           
                    </table>

                <div class="row justify-content-end">
                    <div class="col-sm-8 d-flex">
                        <button type="submit" name="action" value="save" class="me-2 btn btn-primary d-inline-flex align-items-center"><i class="bx bx-save me-2 ms-n1"></i>Simpan</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection