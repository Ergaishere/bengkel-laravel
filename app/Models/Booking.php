<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Booking extends Model
{

    
    use HasFactory;

    protected $fillable = [
        'user_id',
        'layanan_id',
        'mekanik_id',
        'jadwal_id',
        'status',
        'status_updated_at',
    ];
    
    public function rating()
{
    return $this->hasOne(Rating::class);
}
    public function user() { return $this->belongsTo(User::class); }
    public function layanan() { return $this->belongsTo(Layanan::class); }
    public function mekanik() { return $this->belongsTo(Mekanik::class); }
    public function jadwal() { return $this->belongsTo(Jadwal::class); }
}
