<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'video_perumahan';

    protected $primaryKey = 'id_video';

    protected $fillable = [
        'video',
        'id_perumahan'
    ];

    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class, 'id_perumahan');
    }
}
