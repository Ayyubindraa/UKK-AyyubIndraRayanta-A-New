<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanggapan extends Model
{
    use HasFactory;
    protected $table = 'tanggapan';
    protected $fillable = [ 'id_pengaduan', 'tgl_tanggapan', 'tanggapan', 'id_petugas'];

    public function getNamaPetugas()
    {
        return $this->belongsTo(petugas::class, 'id_petugas', 'id');
    }

    public function getStatusPengaduan()
    {
        return $this->belongsTo(pengaduan::class, 'id_pengaduan', 'id');
    }
}
