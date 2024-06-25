@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Sub /</span> Semua Sub</h4>

    <a href="{{ url('kriteria') }}" class="btn btn-primary mb-3 d-inline-flex align-items-center"><i class="bx bx-chevron-left me-2 ms-n1"></i>Kembali</a>

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
                </div>
                <div class="col-lg-8">
                    <a href="{{ url('sub/create') }}" class="btn btn-primary d-flex align-items-center float-start float-lg-end">
                        <i class="bx bx-plus me-2 ms-n1"></i>
                        <span>Tambah Sub</span>
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
                            <th>Kode Kriteria</th>
                            <th>Penjelasan</th>
                            <th>Nilai Awal</th>
                            <th>Nilai Akhir</th>
                            <th>Bobot</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($showsub as $sub)
                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td>{{ $sub->kode_id }}</td>
                                <td>{{ $sub->desc }}</td>
                                <td>{{ $sub->nilai_awal }}</td>
                                <td>{{ $sub->nilai_akhir }}</td>
                                <td>{{ $sub->bobot }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ url('sub/' . $sub->id . '/edit' ) }}" class="btn btn-sm btn-primary me-2"><i class="bx bx-edit-alt"></i></a>
                                        <form action="{{ url('sub/' . $sub->id) }}" method="post" value="delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus sub {{ $sub->desc }} ini?')"><i class="bx bx-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
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