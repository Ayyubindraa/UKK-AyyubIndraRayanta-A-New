<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    protected $fillable = ['tgl_pengaduan', 'nik', 'isi_laporan', 'foto', 'status'];

    public function getStatusMasyarakat()
    {
        return $this->belongsTo(masyarakat::class, 'id');
    }
}
