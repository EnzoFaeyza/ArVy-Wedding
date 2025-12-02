<?php

namespace Database\Seeders;

use App\Models\Guest;
use App\Models\Voucher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VoucherSeeder extends Seeder
{
    public function run(): void
    {
        
        $comingGuests = Guest::where('rsvp_status', 'coming')->get();

        foreach ($comingGuests as $guest) {
            
            $code = 'WEDD-VOUCHER-' . Str::upper(Str::random(10));

            Voucher::create([
                'guest_id' => $guest->id,
                'code' => $code,
                'discount_percentage' => 10,
                'status' => 'unused',
                'used_at' => null,
                'redeemed_by' => null,
                'expires_at' => now()->addDays(30),
            ]);
        }

        // Mark some vouchers as used (for testing)
        $usedVouchers = Voucher::take(3)->get();
        foreach ($usedVouchers as $voucher) {
            $voucher->update([
                'status' => 'used',
                'used_at' => now()->subDays(rand(1, 5)),
            ]);
        }
    }
}
