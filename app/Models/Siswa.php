<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{

    use HasFactory;
    protected $table = 'siswa';
    protected $guarded = [];
    protected $primaryKey = 'nisn';
    protected $keyType = 'string';

    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'nisn');
    }
}
