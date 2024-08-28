<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perumahan extends Model
{
    use HasFactory;

    protected $table = 'perumahan';
    protected $primaryKey = 'id_perumahan';

    protected $fillable = [
        'gambar_perumahan',
        'nama_perumahan',
        'deskripsi_singkat',
        'gambar_jumbotron',
        'about_perumahan_title',
        'about_perumahan_sub_title',
        'about_perumahan_content',
        'about_perumahan_image',
        'alasan_perumahan_title',
        'alasan_perumahan_sub_title',
        'alasan_perumahan_content',
        'about_perumahan_image1',
        'about_perumahan_image2',
        'fasilitas_perumahan_title',
        'fasilitas_perumahan_subtitle',
        'maps_perumahan_title',
        'maps_perumahan_sub_title',
        'maps_perumahan_content',
        'maps_perumahan_image',
        'rumah_perumahan_title',
        'rumah_perumahan_subtitle',
        'pembayaran_perumahan_title',
        'pembayaran_perumahan_subtitle',
        'pembayaran_perumahan_content',
        'penghargaan_title',
        'gallery_perumahan_title',
        'gallery_perumahan_subtitle',
    ];

    public function rumah()
    {
        return $this->hasMany(Rumah::class, 'id_perumahan', 'id_perumahan');
    }

    public function fasilitas()
    {
        return $this->belongsToMany(Fasilitas::class, 'fasilitas_perumahan', 'id_perumahan', 'id_fasilitas');
    }
}
