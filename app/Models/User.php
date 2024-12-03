<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'username',
        'profile_picture',
        'forename',
        'surname',
        'password',
    ];

    public function sessions()
    {
        return $this->hasMany(Session::class, 'user_id');
    }

    public function albums()
    {
        return $this->hasMany(Album::class, 'user_id');
    }
}
