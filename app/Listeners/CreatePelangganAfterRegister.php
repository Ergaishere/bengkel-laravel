<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use App\Models\Pelanggan;

class CreatePelangganAfterRegister
{
    public function handle(Registered $event)
    {
        Pelanggan::create([
            'nama' => $event->user->name,
            'email' => $event->user->email,
            'telp' => '-',
        ]);
    }
}
