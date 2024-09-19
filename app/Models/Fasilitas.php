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
            // First, detach all related records in the pivot table
            $fasilitas->perumahan()->detach();

            // Now, delete the fasilitas record itself
            $fasilitas->delete();
        });
    }
}
