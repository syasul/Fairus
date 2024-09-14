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
        'about_perumahan_sub_title',
        'about_perumahan_content',
        'about_perumahan_image',
        'alasan_perumahan_content',
        'about_perumahan_image1',
        'about_perumahan_image2',
        'fasilitas_perumahan_title',
        'maps_perumahan_sub_title',
        'maps_perumahan_content',
        'maps_perumahan_image',
        'pembayaran_perumahan_title',
        'pembayaran_perumahan_content',
        'penghargaan_title',
    ];

    public function fasilitas()
    {
        return $this->belongsToMany(Fasilitas::class, 'fasilitas_perumahan', 'id_perumahan', 'id_fasilitas');
    }


    public function rumah()
    {
        return $this->hasMany(Rumah::class, 'id_perumahan', 'id_perumahan');
    }

    public static function boot()
    {
        parent::boot();

        // Event listener saat akan menghapus perumahan
        static::deleting(function ($perumahan) {
            // Hapus relasi di tabel pivot
            $perumahan->fasilitas()->detach();
        });
    }
}
