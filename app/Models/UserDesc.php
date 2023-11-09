<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDesc extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "roles",
        "no_telp",
    ];

    public function Deskripsi()
    {
        return $this->belongsTo(User::class);
    }
}
