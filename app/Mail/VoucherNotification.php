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
    public $qrCodeBinary;
    public $voucherCode;
    public $UseWhatsApp = true;

    public function __construct(Guest $guest, string $qrCodeBinary, string $voucherCode)
    {
        $this->guest = $guest;
        $this->qrCodeBinary = $qrCodeBinary;
        $this->voucherCode = $voucherCode;
    }

    public function build()
    {
        return $this->subject('Voucher Diskon 10% Anda')
            ->view('emails.voucher');
    }
}
