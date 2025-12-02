<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateVoucherJob;
use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::with('voucher')->latest()->paginate(10);
        return view('dashboard', compact('guests'));
    }

    public function create()
    {
        return view('guests.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:guests,email',
            'phone' => 'nullable|string|max:20',
            'rsvp_status' => 'required|in:coming,not_coming',
        ]);

        $guest = Guest::create($validated);

        if ($guest->rsvp_status === 'coming') {
            GenerateVoucherJob::dispatch($guest);
        }

        return redirect()->route('dashboard')->with('success', 'Tamu berhasil ditambahkan!');
    }

    public function show(Guest $guest)
    {
        $guest->load('voucher');
        return view('guests.show', compact('guest'));
    }

    public function edit(Guest $guest)
    {
        return view('guests.edit', compact('guest'));
    }

    public function update(Request $request, Guest $guest)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:guests,email,' . $guest->id,
            'phone' => 'nullable|string|max:20',
            'rsvp_status' => 'required|in:coming,not_coming',
        ]);

        $guest->update($validated);

        return redirect()->route('dashboard')->with('success', 'Data tamu berhasil diperbarui!');
    }

    public function destroy(Guest $guest)
    {
        $guest->voucher?->delete();
        $guest->delete();

        return redirect()->route('dashboard')->with('success', 'Data tamu berhasil dihapus!');
    }
}
