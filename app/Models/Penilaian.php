<?php

namespace App\Models;

use App\Models\Subs;
use App\Models\Siswa;
use App\Models\Kriteria;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penilaian extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['id_alternatif', 'id_kriteria', 'id_sub','nilai'];

    public function alternatif(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'id_alternatif', 'nisn');
    }

    public function sub(): BelongsTo
    {
        return $this->belongsTo(Subs::class, 'id_sub', 'id');
    }
    public function getidsub($codekriteria,$nilai)
    {   
        $data = "";
        if(is_numeric($nilai))
        {
            $data = DB::select("SELECT * FROM subs WHERE kode_id = '".$codekriteria."' AND '".$nilai."' between CAST(nilai_awal AS UNSIGNED)  and  CAST(nilai_akhir AS UNSIGNED) ");
        }
        else
        {
            $data = DB::select("SELECT * FROM subs WHERE kode_id = '".$codekriteria."' AND '".$nilai."' between nilai_awal and nilai_akhir");
        }
       
        if(count($data) > 0)
        {
            return $data[0]->id;
        }
        else{
            return 0;
        }
        
        
    }
    public static function getnilai()
    {   
        
        $data = DB::select("SELECT * FROM penilaians LEFT JOIN siswas ON
        penilaians.id_alternatif = siswas.nisn");
        return $data;
        
    }
    public static function getList()
    {   
        
        $data = DB::select("SELECT DISTINCT(id_alternatif) as nisn FROM penilaians ");
        return $data;
        
    }

    public static function getpenilaian($id_alternatif)
    {   
        
        $data = DB::select("SELECT * FROM penilaians WHERE id_alternatif = '".$id_alternatif."'");
        return $data;
        
    }

    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria', 'kode');
    }


}