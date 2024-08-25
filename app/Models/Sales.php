<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'saless';

    protected $fillable = [
        'name',
        'content',
        'subcontent',
        'description',
        'image_path',
    ];

    /**
     * Get the URL for the section's image.
     *
     * @return string
     */
}
