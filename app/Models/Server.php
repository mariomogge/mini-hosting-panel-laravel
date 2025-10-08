<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Server extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'owner_id',
        'meta'
    ];

    protected $casts = ['meta' => 'array'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
