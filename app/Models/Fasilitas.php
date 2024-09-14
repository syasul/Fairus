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


    public static function boot()
    {
        parent::boot();

        // Event listener saat akan menghapus fasilitas
        static::deleting(function ($fasilitas) {
            // Hapus relasi di tabel pivot
            $fasilitas->perumahan()->detach();

            // Cek jika tidak ada perumahan yang terkait, maka fasilitas bisa dihapus
            if ($fasilitas->perumahan()->count() === 0) {
                $fasilitas->delete(); // Hapus fasilitas jika tidak terhubung dengan perumahan manapun
            }
        });
    }
}
