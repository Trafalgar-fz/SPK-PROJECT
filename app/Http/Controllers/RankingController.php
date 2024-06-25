<?php

namespace App\Http\Controllers;




use App\Models\Ranking;
use Illuminate\Routing\Controller;
use \Illuminate\Database\Eloquent\Factories\HasFactory;



class RankingController extends Controller
{
    use HasFactory;

    public  function getbobot($id_alternatif)
    {
        $data = Ranking::getbobot($id_alternatif);
        return $data;
    }
 
    public  function savingdata($id_alternatif,$bobot)
    {
 
        $data = Ranking::savingdata($id_alternatif,$bobot);
        return $data;
 
    
    }
    public  function deletedata($id_alternatif)
    {
        $data = Ranking::deletedata($id_alternatif);
        return $data;
    
    
    }
    public  function getall()
    {
        $data = Ranking::getall();
        return $data;
    }
 
}