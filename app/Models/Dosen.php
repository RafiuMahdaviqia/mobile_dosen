<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    // Menentukan nama tabel jika berbeda dari konvensi Laravel
    protected $table = 'dosen';

    // Menentukan kolom-kolom yang dapat diisi massal
    protected $fillable = [
        'nama_dosen',
        'pengajar_prodi',
        'deskripsi',
        'alamat',
    ];

    // Jika Anda ingin menambahkan relasi atau metode lain, bisa ditambahkan di sini
}
