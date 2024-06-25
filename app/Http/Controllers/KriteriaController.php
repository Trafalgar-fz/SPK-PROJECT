<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $kriteria = DB::table('kriterias')->get();
        $search = $request->input('search');
        
        $data = Kriteria::query();

        if($search) {
            $data->where('kode', 'like', '%'.$search.'%');
        }

        $data = $data->latest()->paginate(5);

        return view('kriteria.index', [
            'data' => $data,
            'search' => $search
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|min:1',
            'nama_kriteria' => 'required',
            'atribut' => 'required|in:Benefit,Cost',
            'bobot' => 'required'
        ]);

        DB::table('kriterias')->insert([
            'kode' => $request->kode,
            'nama_kriteria' => $request->nama_kriteria,
            'atribut' => $request->atribut,
            'bobot' => $request->bobot
        ]);
        return redirect('kriteria')->with('status', 'Tambah Data Kriteria Berhasil !!');
    }

    /**
     * Display the specified resource.
     */
    public function show($kode)
    {
        $ubahkriteria = DB::table('kriterias')->where('kode', $kode)->first();

        if (!$ubahkriteria) {
            return redirect('kriteria')->withErrors('Kriteria Tidak Di Temukan');
        }

        return view('kriteria.edit', compact('ubahkriteria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
