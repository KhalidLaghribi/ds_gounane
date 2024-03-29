<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'downloads',
        'path',
        'user_id',
    ];
    public function users()
{
    return $this->belongsTo(User::class);
}
    
}
