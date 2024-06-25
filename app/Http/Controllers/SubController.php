<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Subs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubController extends Controller
{
    

    public function index()
    {
    
    }
    public function show($kode)
    {
        $showsub = Subs::where('kode_id', $kode)->get();
        return view('sub.index', compact('showsub'));
    }


    public function create()
    {
        Subs::where('kode_id')->first();
        return view('sub.create');
        // return view('sub.create', compact('subs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'desc' => 'required',
            'nilai_awal' => 'required',
            'nilai_akhir' => 'required',
            'bobot' => 'required'
        ]);
        $sub = new Subs;
        $sub->kode_id = $request->kode;
        $sub->desc = $request->desc;
        $sub->nilai_awal = $request->nilai_awal;
        $sub->nilai_akhir = $request->nilai_akhir;
        $sub->bobot = $request->bobot;
        $sub->save();
        return redirect('sub/' . $request->kode)->with('status', 'Tambah Sub Berhasil !!');
    }

    public function edit($id)
    {
        $subs = Subs::where('id', $id)->first();
        return view('sub.edit', compact('subs'));
    }

    public function update(Request $request, Subs $sub)
    {
        $request->validate([
            'desc' => 'required',
            'nilai_awal' => 'required',
            'nilai_akhir' => 'required',
            'bobot' => 'required'
        ]);


        Subs::where('id', $sub->id)
            ->update([
                'kode_id' => $request->kode,
                'desc' => $request->desc,
                'nilai_awal' => $request->nilai_awal,
                'nilai_akhir' => $request->nilai_akhir,
                'bobot' => $request->bobot,
            ]);
        return redirect('sub/' . $sub->kode_id)->with('status', 'Edit Sub Berhasil !!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subs $sub)
    {
        Subs::destroy($sub->id);
        return redirect('sub/' . $sub->kode_id)->with('delete', 'Hapus Data Sub Berhasil !!');
    }
}