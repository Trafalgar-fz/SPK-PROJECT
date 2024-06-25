<?php

namespace App\Http\Controllers;

use App\Models\Kecocokan;
use Illuminate\Routing\Controller;
use \Illuminate\Database\Eloquent\Factories\HasFactory;



class KecocokanController extends Controller
{
    use HasFactory;

    public  function getbobot($id_sub)
    {
     $data = Kecocokan::getbobot($id_sub);
     return $data;
    }
 
    public  function savingdata($id_alternatif, $id_kriteria,$bobot)
    {
 
        $data = Kecocokan::savingdata($id_alternatif, $id_kriteria,$bobot);
        return $data;
 
    
    }
    public  function deletedata($id_alternatif)
    {
        $data = Kecocokan::deletedata($id_alternatif);
        return $data;

    
    }

    public  function getalldata()
    {
        $data = Kecocokan::getalldata();
        return $data;

    
    }
    public  function getalldatadisticnt()
    {
        $data = Kecocokan::getalldatadisticnt();
        return $data;

    
    }
}