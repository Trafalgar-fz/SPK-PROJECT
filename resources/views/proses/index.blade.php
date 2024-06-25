@extends('layouts.main')



@section('content')

<div class="container-fluid mt-4">
  <div class="card mb-2">
    <div class="card-header">
            <strong> Rating Kecocokan</strong>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive mb-3">
            <table class="table w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Rata-rata raport</th>
                        <th>Sikap</th>
                        <th>Kehadiran</th>
                        <th>Ekstrakurikuler</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($header as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @foreach ($detail as $data)
                                @if ($item->id_alternatif == $data->id_alternatif)
                                    <td>{{ $data->nama }}</td>
                                @break;
                            @endif
                        @endforeach
                        @foreach ($detail as $data)
                            @if ($item->id_alternatif == $data->id_alternatif)
                                <td>{{ $data->bobot }}</td>
                            @endif
                        @endforeach

                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-header">
                <strong>Normalisasi Matrix</strong>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive mb-3">
                <table class="table w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Rata-rata raport</th>
                            <th>Sikap</th>
                            <th>Kehadiran</th>
                            <th>Ekstrakurikuler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($headermatrik as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @foreach ($detailmatrik as $data)
                                    @if ($item->id_alternatif == $data->id_alternatif)
                                        <td>{{ $data->nama }}</td>
                                    @break;
                                @endif
                            @endforeach
                            @foreach ($detailmatrik as $data)
                                @if ($item->id_alternatif == $data->id_alternatif)
                                    <td>{{ $data->bobot }}</td>
                                @endif
                            @endforeach

                        </tr>
                    @endforeach
                
                </table>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-header">
                    <strong> Nilai Referensi</strong>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive mb-3">
                    <table class="table w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Rata-rata raport</th>
                                <th>Sikap</th>
                                <th>Kehadiran</th>
                                <th>Ekstrakurikuler</th>
        
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($headerreferensi as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @foreach ($detailreferensi as $data)
                                        @if ($item->id_alternatif == $data->id_alternatif)
                                            <td>{{ $data->nama }}</td>
                                        @break;
                                    @endif
                                @endforeach
                                @foreach ($detailreferensi as $data)
                                    @if ($item->id_alternatif == $data->id_alternatif)
                                        <td>{{ $data->bobot }}</td>
                                    @endif
                                @endforeach
        
                            </tr>
                        @endforeach 
                    </tbody>                   
                    </table>
                </div>
            </div>

            
        <div class="card mb-2">
            <div class="card-header">
                    <strong> Ranking</strong>
                </div>
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
