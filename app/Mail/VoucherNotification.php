<?php

namespace App\Mail;

use App\Models\Guest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VoucherNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $guest;
    public $qrBase64;
    public $voucherCode;

    public function __construct(Guest $guest, string $qrBase64, string $voucherCode)
    {
        $this->guest = $guest;
        $this->qrBase64 = $qrBase64;
        $this->voucherCode = $voucherCode;
    }

    public function build()
    {
        return $this->subject("Voucher Diskon 10% Anda")
                    ->view('emails.voucher');
    }
}
