<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilToko extends Model
{
    use HasFactory;

    protected $table = 'profil_tokos';
    protected $primaryKey = 'id_profil';
    
    protected $fillable = [
        'nama_toko',
        'deskripsi',
        'kontak',
        'lokasi',
        'logo_toko',
        'email',
        'whatsapp'
    ];
}