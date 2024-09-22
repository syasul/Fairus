<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    use HasFactory;

    protected $table = 'rumah';
    protected $primaryKey = 'id_rumah';

    protected $fillable = [
        'gambar_rumah',
        'tipe',
        'id_perumahan',
        'deskripsi',
    ];

    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class, 'id_perumahan', 'id_perumahan');
    }
}
