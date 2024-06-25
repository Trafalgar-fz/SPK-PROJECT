<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Kecocokan extends Model
{
    use HasFactory;


    public static function getbobot($id_sub)
    {
     $data = DB::select("SELECT bobot FROM subs WHERE id = '".$id_sub."'");
     return $data[0]->bobot;
    }
 
    public static function savingdata($id_alternatif, $id_kriteria,$bobot)
    {
 
     try {
       
         $save =  DB::table('ratingkecocokan')->insert([
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
         $save = DB::table('ratingkecocokan')
         ->Where("id_alternatif",$id_alternatif)
         ->delete();
 
         return "Success";
     } catch (\Exception $e) {
         return $e;
     }
 
    
    }

    public static function getalldata()
    {
     $data = DB::select("SELECT * FROM ratingkecocokan LEFT JOIN siswas ON ratingkecocokan.id_alternatif = siswas.nisn");
     return $data;
    }

    public static function getalldatadisticnt()
    {
     $data = DB::select("SELECT DISTINCT(id_alternatif) FROM ratingkecocokan");
     return $data;
    }
}

