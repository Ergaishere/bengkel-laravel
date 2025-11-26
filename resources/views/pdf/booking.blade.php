<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .title { font-size: 22px; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        td { padding: 6px; font-size: 14px; }
        .label { font-weight: bold; width: 30%; }
        .footer { margin-top: 30px; font-size: 12px; text-align: center; }
    </style>
</head>
<body>

<div class="header">
    <div class="title">NOTA BOOKING SERVICE</div>
    <div>Bengkel Service Motor</div>
</div>

<table>
    <tr>
        <td class="label">Nomor Booking</td>
        <td>#{{ $booking->id }}</td>
    </tr>
    <tr>
        <td class="label">Pelanggan</td>
        <td>{{ $booking->user->name }}</td>
    </tr>
    <tr>
        <td class="label">Layanan</td>
        <td>{{ $booking->layanan->nama }}</td>
    </tr>
    <tr>
        <td class="label">Mekanik</td>
        <td>{{ $booking->mekanik->nama }}</td>
    </tr>
    <tr>
        <td class="label">Jadwal Service</td>
        <td>{{ $booking->jadwal->tanggal }} - {{ $booking->jadwal->jam }}</td>
    </tr>
    <tr>
        <td class="label">Status</td>
        <td>{{ ucfirst($booking->status) }}</td>
    </tr>
    <tr>
        <td class="label">Tanggal Update Status</td>
        <td>{{ $booking->status_updated_at ?? '-' }}</td>
    </tr>
</table>

<div class="footer">
    Dicetak pada: {{ now() }} <br>
    --- Terima kasih telah menggunakan layanan kami ---
</div>

</body>
</html>