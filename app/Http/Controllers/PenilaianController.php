<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KriteriaKecocokan;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\KecocokanController;
use App\Http\Controllers\NilaiReferensiController;
use App\Http\Controllers\MatrikTernormalisasiController;
use App\Models\Subs;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penilaian = Penilaian::getList();
        $kriteria = Kriteria::all();
        $detail = Penilaian::getnilai();
        return view('penilaian.index', compact('penilaian', 'detail'));
        // return $penilaian;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alternatif = Siswa::all();
        $kriteria = Kriteria::all();
        $sub = Subs::all();
        return view('penilaian.create', compact('alternatif', 'kriteria', 'sub'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $penilaian = new Penilaian();

        $i = 0;


        if ($request->idnilai != "") {
            DB::table('penilaians')->where('id_alternatif', $request->name)->delete();
        }
        $cekdata = $penilaian->getpenilaian($request->name);
        if (count($cekdata) > 0) {
            return redirect('penilaian')->with('error', 'Tambah Penilaian Gagal Karena Data Sudah Ada');
        }


        foreach ($request->idkriteria as $key) {

            $penilaian->id_alternatif = $request->name;
            $penilaian->id_kriteria = $key;
            $penilaian->nilai = $request->sub[$i];
            $penilaian->id_sub = $penilaian->getidsub($key, $request->sub[$i]);
            $penilaian->save;
            Penilaian::create([
                'id_alternatif' => $request->name,
                'id_kriteria' => $key,
                'nilai' => $request->sub[$i],
                'id_sub' => $penilaian->getidsub($key, $request->sub[$i]),
            ]);


            $i += 1;
        }

        return redirect('penilaian')->with('status', 'Tambah Penilaian Berhasil !!');


        // print_r($request->sub);


    }



    public function show($penilaian)
    {
        $alternatif = Siswa::all();
        $kriteria = Kriteria::all();
        $sub = Subs::all();
        $data = DB::table('penilaians')->where('id_alternatif', $penilaian)->get();

        return view('penilaian.edit', compact('data', 'alternatif', 'sub', 'kriteria'));

        
        
    }

    public function edit(Penilaian $penilaian)
    {
    }

    
    public function update(Request $request, Penilaian $penilaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($penilaian)
    {
        DB::table('penilaians')->where('id_alternatif', $penilaian)->delete();
        return redirect('penilaian')->with('delete', 'Hapus Data Penilaian Berhasil !!');
    }
}