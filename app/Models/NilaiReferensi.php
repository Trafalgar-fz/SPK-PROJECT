<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class NilaiReferensi extends Model
{
    use HasFactory;


    public static function getbobot($id_alternatif,$id_kriteria)
    {
     $data = DB::select("select bobot * (SELECT bobot / (SELECT SUM(bobot) FROM kriterias ) FROM kriterias WHERE kode = '".$id_kriteria."')  as bobot FROM materiknormalisasi WHERE id_alternatif =  '".$id_alternatif."' AND id_kriteria = '".$id_kriteria."'" );
     return $data[0]->bobot;
    }
 
    public static function savingdata($id_alternatif, $id_kriteria,$bobot)
    {
 
     try {
       
         $save =  DB::table('nilaireferensi')->insert([
             'id_alternatif' => $id_alternatif,
             'id_kriteria' => $id_kriteria,
             'bobot' => $bobot
         ]);
        
         return "Success";
     } catch (\Exception $e) {
         return $e;
     }
 
    
    }
    public static function deletedata($id_alternatif)
    {
 
     try {
         $save = DB::table('nilaireferensi')
         ->Where("id_alternatif",$id_alternatif)
         ->delete();
 
         return "Success";
     } catch (\Exception $e) {
         return $e;
     }
 
    
    }

    public static function getalldata()
    {
     $data = DB::select("SELECT * FROM nilaireferensi LEFT JOIN siswas ON nilaireferensi.id_alternatif = siswas.nisn");
     return $data;
    }

    public static function getalldatadisticnt()
    {
     $data = DB::select("SELECT DISTINCT(id_alternatif) FROM nilaireferensi");
     return $data;
    }
}

