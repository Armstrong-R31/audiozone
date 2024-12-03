<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    
    public $incrementing = true;

    protected $fillable = [
        'album_name',
        'album_cover',
        'user_id',
        'genre',
        'tags',
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tracks()
    {
        return $this->hasMany(Song::class, 'album_id');
    }
}
