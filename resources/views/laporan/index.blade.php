@extends('layouts.main')

@section('content')

<div class="container-fluid mt-4">
<div class="card mb-2">
    <div class="card-header">
            <strong> Laporan Siswa Berprestasi</strong>
    </div>
    <div class="card-body">
        <div class="table-responsive mb-3">
            <table class="table w-100">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Total</th>
                        <th>Ranking</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($headerranking as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->bobot }}</td>
                            <td>{{ $loop->iteration }}</td>
                        </tr>
                    @endforeach
                </tbody>   
            </table>
        </div>
    </div>
  </div>
</div>

@endsection