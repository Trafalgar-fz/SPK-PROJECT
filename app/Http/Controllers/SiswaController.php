<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $siswas = DB::table('siswas')->get();
        $search = $request->input('search');

        $data = Siswa::query();

        if ($search) {
            $data->where('nama', 'like', '%'.$search.'%');
        }

        $data = $data->latest()->paginate(10);

        return view('siswa.index',[
            'data' => $data,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'nama' => 'required|min:2',
            'tempat' => 'required',
            'lahir' => 'required',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
            'kelas' => 'required'
        ]);

        DB::table('siswas')->insert([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'tempat' => $request->tempat,
            'lahir' => $request->lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas' => $request->kelas,
        ]);
        return redirect('siswa')->with('status', 'Tambah Siswa Berhasil !!');
    }

    /**
     * Display the specified resource.
     */
    public function show($nisn)
    {
        $ubahsiswa = DB::table('siswas')->where('nisn', $nisn)->first();

        if (!$ubahsiswa) {
            return redirect('siswa')->withErrors('Data siswa tidak ditemukan.');
        }

        return view('siswa.edit', compact('ubahsiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nisn)
    {
        $request->validate([
            'nisn' => 'required',
            'nama' => 'required|min:2',
            'tempat' => 'required',
            'lahir' => 'required',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
            'kelas' => 'required',
        ]);

        DB::table('siswas')->where('nisn', $nisn)
            ->update([
                'nisn' => $request->nisn,
                'nama' => $request->nama,
                'tempat' => $request->tempat,
                'lahir' => $request->lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'kelas' => $request->kelas
            ]);
        return redirect('siswa')->with('status', 'Edit Siswa Berhasil !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nisn)
    {
        DB::table('siswas')->where('nisn', $nisn)->delete();
        return redirect('siswa')->with('delete', 'Hapus Data Siswa Berhasil !!');
    }
}