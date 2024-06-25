<?php

namespace App\Models;

use App\Models\Sub;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kriteria extends Model
{
    use HasFactory;


    public function subs(): HasMany
    {
        return $this->hasMany(Subs::class, 'kode_id', 'kode');
    }

    // public function sub(): BelongsTo
    // {
    //     return $this->belongsTo(Sub::class, 'kode_id', 'kode');
    // }
}