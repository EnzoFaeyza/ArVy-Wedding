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
        if ($this->guest->voucher) {
            return;
        }

        $code = 'WEDD-VOUCHER-' . Str::upper(Str::random(10));

        $voucher = Voucher::create([
            'guest_id' => $this->guest->id,
            'code' => $code,
            'status' => 'unused',
        ]);

        $qrPng = QrCode::format('png')
            ->size(300)
            ->errorCorrection('H')
            ->generate($voucher->code);

        $qrBase64 = "data:image/png;base64," . base64_encode($qrPng);

        Mail::to($this->guest->email)
            ->send(new VoucherNotification($this->guest, $qrBase64, $voucher->code));
    }
}
