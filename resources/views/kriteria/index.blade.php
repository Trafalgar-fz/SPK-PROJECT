@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Kriteria /</span> Semua Kriteria</h4>

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
                        <div class="flex-grow-1 me-2">
                            <label class="form-label">Cari</label>
                            <input type="search" class="form-control" placeholder="Apa yang anda cari?" name="search" autocomplete="off" value="{{ $search }}">
                        </div>
                        <div>
                            <a href="{{ url('kriteria/index') }}" class="btn btn-secondary btn-sm mt-2">Reset</a>
                        </div> 
                    </form>
                </div>
                <div class="col-lg-8">
                    <a href="{{ url('kriteria/create') }}" class="btn btn-primary d-flex align-items-center float-start float-lg-end">
                        <i class="bx bx-plus me-2 ms-n1"></i>
                        <span>Tambah Kriteria</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive mb-3">
                <table class="table w-100">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Kode</th>
                            <th>Nama Kriteria</th>
                            <th>Atribut</th>
                            <th>Bobot</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                        @if ($item)
                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->nama_kriteria }}</td>
                                <td>{{ $item->atribut }}</td>
                                <td>{{ $item->bobot }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ url('sub/' . $item->kode) }}" class="btn btn-sm btn-primary me-2"><i class="bx bx-book-alt"></i></a>
                                        <a href="{{ url('kriteria/' . $item->kode) }}" class="btn btn-sm btn-primary me-2"><i class="bx bx-edit-alt"></i></a>

                                        <form action="{{ url('kriteria/' . $item->kode) }}" method="post" value="delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kriteria {{ $item->nama_kriteria }} ini?')"><i class="bx bx-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data yang dapat ditampilkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection