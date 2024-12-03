<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    
    public $incrementing = true;

    protected $attributes = [
        'plays' => 0,
    ];

    protected $fillable = [
        'title',
        'album_id',
        'user_id',
        'duration',
        'genre',
        'file_url',
    ];

    protected $casts = [
        'release_date' => 'date',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id')->withDefault();
    }
}
