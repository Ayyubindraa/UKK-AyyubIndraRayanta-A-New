<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;;

class petugas extends Model
{
    use HasFactory;
    protected $table = 'petugas';
    protected $guard = 'petugas';
    protected $fillable = ['nama_petugas', 'username', 'password', 'jk', 'telp', 'alamat_petugas', 'level'];
}
