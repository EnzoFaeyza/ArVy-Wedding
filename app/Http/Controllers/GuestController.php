<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Voucher;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function store(Request $request)
    {
        $guest = Guest::create($request->all());

        // generate voucher
        $voucher = Voucher::create([
            'guest_id' => $guest->id,
            'code' => strtoupper(uniqid("VC-")),
            'status' => 'unused'
        ]);

        return back()->with('success', 'Guest added & voucher generated!');
    }
}
