<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $fillable = ['user_id', 'layanan_id'];

    public function layanan() { return $this->belongsTo(Layanan::class); }
    public function user() { return $this->belongsTo(User::class); }
}