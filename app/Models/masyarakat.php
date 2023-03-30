<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;

class masyarakat extends Model
{
    use HasFactory;
    protected $table = 'masyarakat';
    protected $guard = 'masyarakat';
    protected $fillable = ['nik', 'nama', 'username', 'password', 'jk', 'telp', 'alamat_masyarakat',];
}
