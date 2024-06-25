<?php

namespace App\Http\Controllers;


use App\Models\NilaiReferensi;

use Illuminate\Routing\Controller;
use \Illuminate\Database\Eloquent\Factories\HasFactory;



class NilaiReferensiController extends Controller
{
    use HasFactory;

    public  function getbobot($id_alternatif,$id_kriteria)
    {
        $data = NilaiReferensi::getbobot($id_alternatif,$id_kriteria);
        return $data;
    }
 
    public  function savingdata($id_alternatif, $id_kriteria,$bobot)
    {
 
        $data = NilaiReferensi::savingdata($id_alternatif, $id_kriteria,$bobot);
        return $data;
 
    
    }
    public  function deletedata($id_alternatif)
    {
        $data = NilaiReferensi::deletedata($id_alternatif);
        return $data;
    
    
    }

    public  function getalldata()
    {
        $data = NilaiReferensi::getalldata();
        return $data;

    
    }
    public  function getalldatadisticnt()
    {
        $data = NilaiReferensi::getalldatadisticnt();
        return $data;

    
    }
}