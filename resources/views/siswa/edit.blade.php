@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Data Siswa /</span> Tambah Siswa</h4>

        <a href="{{ url('siswa') }}" class="btn btn-primary mb-3 d-inline-flex align-items-center">
            <i class="bx bx-chevron-left me-2 ms-n1"></i>Kembali
        </a>

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
                        <h5 class="mb-0">Edit Siswa</h5>
                    </div>
                    <div class="card-body">
                        @if ($ubahsiswa)
                            <form method="POST" action="{{ url('siswa/' . $ubahsiswa->nisn) }}">
                                @method('PATCH')
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Nisn</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="22312005" name="nisn" autocomplete="off" value="{{ $ubahsiswa->nisn }}" required />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Nama Siswa</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="jhondoe" name="nama" autocomplete="off" value="{{ $ubahsiswa->nama }}" required/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Tempat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tempat" autocomplete="off" value="{{ $ubahsiswa->tempat }}" required/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="lahir" autocomplete="off" value="{{ $ubahsiswa->lahir }}" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Kelas</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kelas" autocomplete="off" value="{{ $ubahsiswa->kelas }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="select" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <select name="jenis_kelamin" class="form-control" autofocus required>
                                            <option>{{ $ubahsiswa->jenis_kelamin }}</option>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-8 d-flex">
                                        <button type="submit" name="action" value="save" class="me-2 btn btn-primary d-inline-flex align-items-center">
                                            <i class="bx bx-save me-2 ms-n1"></i>Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="alert alert-danger" role="alert">
                                Data siswa tidak ditemukan.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
