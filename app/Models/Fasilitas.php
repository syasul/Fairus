<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas';
    protected $primaryKey = 'id_fasilitas';

    protected $fillable = [
        'gambar_fasilitas',
        'nama_fasilitas',
    ];

    public function perumahan()
    {
        return $this->belongsToMany(Perumahan::class, 'fasilitas_perumahan', 'id_fasilitas', 'id_perumahan');
    }
}
