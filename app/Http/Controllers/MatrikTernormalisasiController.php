<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller;
use App\Models\MatrikTernormalisasi;
use \Illuminate\Database\Eloquent\Factories\HasFactory;



class MatrikTernormalisasiController extends Controller
{
    use HasFactory;

    public  function getbobot($id_alternatif,$id_kriteria)
    {
        $data = MatrikTernormalisasi::getbobot($id_alternatif,$id_kriteria);
        return $data;
    }
 
    public  function savingdata($id_alternatif, $id_kriteria,$bobot)
    {
 
        $data = MatrikTernormalisasi::savingdata($id_alternatif, $id_kriteria,$bobot);
        return $data;
 
    
    }
    public function deletedata($id_alternatif)
    {
        $data = MatrikTernormalisasi::deletedata($id_alternatif);
        return $data;
    
    
    }

    public  function getalldata()
    {
        $data = MatrikTernormalisasi::getalldata();
        return $data;

    
    }
    public  function getalldatadisticnt()
    {
        $data = MatrikTernormalisasi::getalldatadisticnt();
        return $data;

    
    }
}