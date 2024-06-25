@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Data Admin /</span> Edit Admin</h4>

        <a href="{{ url('user') }}" class="btn btn-primary mb-3 d-inline-flex align-items-center"><i class="bx bx-chevron-left me-2 ms-n1"></i>Kembali</a>

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

        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Admin</h5>
                    </div>
                    <div class="card-body">
                        @if ($ubahuser)   
                        
                        <form method="POST" action="{{ url('user/' . $ubahuser->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama User</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Jhon Doe" name="name" autocomplete="off" value="{{ $ubahuser->name }}" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" autocomplete="off" value="{{ $ubahuser->username }}"> 
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" placeholder="********" name="password" value="{{ $ubahuser->password }}" />
                                    <small class="form-text">Kosongkan jika tidak ingin mengubah password.</small>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="me-2 btn btn-primary d-inline-flex align-items-center"><i class="bx bx-save me-2 ms-n1"></i>Simpan</button>
                                </div>
                            </div>
                        </form>
                        @else
                            <div class="alert alert-danger" role="danger">
                                Data User Tidak Ditemukan.
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
