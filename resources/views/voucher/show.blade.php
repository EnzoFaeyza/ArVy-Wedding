<!DOCTYPE html>
<html>
<head>
    <title>Voucher QR Code</title>
</head>

<body style="text-align:center; font-family:Arial; padding:40px;">

    <h2>Voucher Anda</h2>

    <p>Tunjukkan QR ini kepada petugas untuk menukarkan voucher.</p>

    <img src="data:image/png;base64,{{ $qr }}" width="260">

    <p style="margin-top:20px; font-size:14px;">
        Kode Voucher: {{ $voucher->code }}
    </p>

</body>
</html>
