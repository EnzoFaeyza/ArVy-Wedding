<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VoucherController extends Controller
{
    public function show($code)
    {
        $voucher = Voucher::where('code', $code)->firstOrFail();

        // Generate QR untuk halaman
        $qr = base64_encode(
            QrCode::format('png')
                ->size(300)
                ->errorCorrection('H')
                ->generate($voucher->code)
        );

        return view('voucher.show', [
            'voucher' => $voucher,
            'qr' => $qr
        ]);
    }
}
