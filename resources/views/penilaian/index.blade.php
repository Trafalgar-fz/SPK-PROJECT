@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Penilaian /</span> Semua Penilaian</h4>

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
                    <a href="{{ url('penilaian/create') }}" class="btn btn-primary d-flex align-items-center float-start float-lg-end">
                        <i class="bx bx-plus me-2 ms-n1"></i>
                        <span>Tambah Penilaian</span>
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
                            <th>No</th>
                            <th class="text-center">Nama Siswa</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Rata-rata raport</th>
                            <th class="text-center">Sikap</th>
                            <th class="text-center">Kehadiran</th>
                            <th class="text-center">Ekstrakurikuler</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penilaian as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                @foreach ($detail as $data)
                                    @if ($item->nisn == $data->id_alternatif)
                                        <td class="text-center">{{ $data->nama }}</td>
                                        <td class="text-center">{{ $data->kelas }}</td>
                                    @break;
                                @endif
                            @endforeach
                            @foreach ($detail as $data)
                                @if ($item->nisn == $data->id_alternatif)
                                    <td class="text-center">{{ $data->nilai }}</td>
                                @endif
                            @endforeach
                            @foreach ($detail as $data)
                                @if ($item->nisn == $data->id_alternatif)
                                <td>
                                    <div class="d-flex justify-content-center">
                                        
                                        <form action="{{ url('penilaian/' . $data->id_alternatif) }}" method="post" value="delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus penilaian {{ $data->id_alternatif }} ini?')"><i class="bx bx-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                                @break;
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection