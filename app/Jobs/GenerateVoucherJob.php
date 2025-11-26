<?php

namespace App\Jobs;

use App\Mail\VoucherNotification;
use App\Models\Guest;
use App\Models\Voucher;
use App\Services\WahaClient;
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

        if (config('rsvp.use_whatsapp', false)) {
            $this->sendViaWhatsApp($voucher);
        } else {
            $qrPng = $this->generateQr($voucher->code);
            $this->sendViaEmail($qrPng, $voucher->code);
        }
    }

    protected function generateQr(string $code): string
    {
        return QrCode::format('png')
            ->size(300)
            ->errorCorrection('H')
            ->generate($code);
    }

    protected function sendViaEmail(string $qrPng, string $voucherCode): void
    {
        Mail::to($this->guest->email)
            ->send(new VoucherNotification($this->guest, $qrPng, $voucherCode));

        Log::info("Voucher terkirim via email ke " . $this->guest->email);
    }

    protected function sendViaWhatsApp(Voucher $voucher): void
    {
        $voucherUrl = route('voucher.show', $voucher->code);

        $message = implode("\n", [
            "Hai {$this->guest->name}!",
            "Terima kasih sudah melakukan RSVP. Berikut kode voucher diskon 10% kamu:",
            $voucher->code,
            "",
            "Tunjukkan kode atau QR pada tautan berikut saat menukarkan:",
            $voucherUrl,
        ]);

        app(WahaClient::class)->sendText($this->guest->phone, $message);

        Log::info("Voucher terkirim via WhatsApp ke " . $this->guest->phone);
    }
}
