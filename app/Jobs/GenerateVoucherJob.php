<?php

namespace App\Jobs;

use App\Models\Guest;
use App\Models\Voucher;
use App\Mail\VoucherNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GenerateVoucherJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $guest;

    public function __construct(Guest $guest)
    {
        $this->guest = $guest;
    }

    public function handle(): void
    {
        // Jika sudah punya voucher
        if ($this->guest->voucher) {
            return;
        }

        // Generate kode voucher
        $code = 'WEDD-VOUCHER-' . Str::upper(Str::random(10));

        // Simpan voucher
        $voucher = Voucher::create([
            'guest_id' => $this->guest->id,
            'code' => $code,
            'status' => 'unused',
        ]);

        // Generate QR PNG
        $qrPng = QrCode::format('png')
            ->size(300)
            ->errorCorrection('H')
            ->generate($voucher->code);

        // Konversi Base64
        $qrCodeBase64 = "data:image/png;base64," . base64_encode($qrPng);

        // Kirim email
        Mail::to($this->guest->email)
            ->send(new VoucherNotification($this->guest, $qrCodeBase64, $voucher->code));

        Log::info("Voucher terkirim ke " . $this->guest->email);
    }
}
