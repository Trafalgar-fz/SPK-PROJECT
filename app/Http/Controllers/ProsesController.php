<?php

namespace App\Http\Controllers;

use App\Models\Proses;
use App\Models\Penilaian;
use App\Models\MaterikN;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\KecocokanController;
use App\Http\Controllers\NilaiReferensiController;
use App\Http\Controllers\MatrikTernormalisasiController;

class ProsesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->generate();
        $this->generate();
        $kecocokan =  new KecocokanController();
        $header = $kecocokan->getalldatadisticnt();
        $detail = $kecocokan->getalldata();
        $ternormalisasi = new MatrikTernormalisasiController();
        $headermatrik = $ternormalisasi->getalldatadisticnt();
        $detailmatrik = $ternormalisasi->getalldata();
        $referensi = new NilaiReferensiController();
        $headerreferensi = $referensi->getalldatadisticnt();
        $detailreferensi = $referensi->getalldata();
        $ranking = new RankingController();
        $headerranking = $ranking->getall();
        
        return view('proses.index',compact("header","detail","headermatrik","detailmatrik","headerreferensi","detailreferensi","headerranking"));
    }

    public function generate()
    {
        $penilaian = new Penilaian();
        $kriteriakecocokan = new KecocokanController();
        $ternormalisasi = new MatrikTernormalisasiController();
        $referensi = new NilaiReferensiController();
        $ranking = new RankingController();

        $penilaianlist = $penilaian->getList();
        foreach ($penilaianlist as $item ) {
             $kriteriakecocokan->deletedata( $item->nisn);
             $ternormalisasi->deletedata( $item->nisn);
             $referensi->deletedata( $item->nisn);
             $ranking->deletedata( $item->nisn);

            $penilaiandetail = $penilaian->getpenilaian($item->nisn);
            
            foreach ($penilaiandetail as $detail ) {
                $bobot = $kriteriakecocokan->getbobot($detail->id_sub);
                $kriteriakecocokan->savingdata( $item->nisn,
                $detail->id_kriteria,round($bobot, 2));
    
                $bobotternormalisasi = $ternormalisasi->getbobot($item->nisn,$detail->id_kriteria);
                $ternormalisasi->savingdata( $item->nisn,
                $detail->id_kriteria,round($bobotternormalisasi, 2));
            
                $bobotreferensi = $referensi->getbobot($item->nisn,$detail->id_kriteria);
                 $referensi->savingdata( $item->nisn,
                $detail->id_kriteria,round($bobotreferensi, 2));
               
            
                
            }
            $bobotranking = $ranking->getbobot($item->nisn);
             $ranking->savingdata( $item->nisn,
            round($bobotranking, 2));
        }

       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Proses $proses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proses $proses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proses $proses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proses $proses)
    {
        //
    }
}