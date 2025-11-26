<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateVoucherJob;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RsvpController extends Controller
{

    /**
     * Menampilkan form RSVP
     */
    /*public function index()
{
return view('rsvp.index');
}*/

    //TESTING STUFF

    /**
     * Menampilkan form main dengan RSVP
     */
    public function index()
    {
        $UseWhatsApp = config('rsvp.use_whatsapp', false);

        return view('main', compact('UseWhatsApp'));
    }

    /**
     * Menyimpan data RSVP
     */
    public function store(Request $request)
    {
        $useWhatsApp = config('rsvp.use_whatsapp', false);

        $rules = [
            'name' => 'required|string|max:255',
            'rsvp_status' => 'required|in:coming,not_coming',
        ];

        if ($useWhatsApp) {
            $rules['phone'] = 'required|string|max:20';
            $rules['email'] = [
                'nullable',
                'email',
                'max:255',
                Rule::unique('guests', 'email'),
            ];
        } else {
            $rules['email'] = 'required|email|max:255|unique:guests,email';
            $rules['phone'] = 'nullable|string|max:20';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('main')
                ->withErrors($validator)
                ->withInput();
        }
        $data = $validator->validated();

        if ($useWhatsApp && empty($data['email'])) {
            $data['email'] = sprintf(
                'wa_%s@autogen.local',
                Str::uuid()
            );
        }

        if (empty($data['phone'])) {
            $data['phone'] = 'not-provided';
        }

        // Simpan data tamu
        $guest = Guest::create($data);
        // Jika tamu konfirmasi "Hadir", panggil Job
        if ($guest->rsvp_status == 'coming') {
            GenerateVoucherJob::dispatch($guest);
        }
        return redirect()->route('main')
            ->with('success', 'Terima kasih telah melakukan RSVP!');
    }


//END OF TESTING STUFF

    /**
     * Menyimpan data RSVP
     */
    /*public function store(Request $request)
{
$validator = Validator::make($request->all(), [
'name' => 'required|string|max:255',
'email' => 'required|email|max:255|unique:guests,email',
'phone' => 'required|string|max:20',
'rsvp_status' => 'required|in:coming,not_coming',
]);
if ($validator->fails()) {
return redirect()->route('rsvp.index')
->withErrors($validator)
->withInput();
}
// Simpan data tamu
$guest = Guest::create($request->all());
// Jika tamu konfirmasi "Hadir", panggil Job
if ($guest->rsvp_status == 'coming') {
GenerateVoucherJob::dispatch($guest);
}
return redirect()->route('rsvp.index')
->with('success', 'Terima kasih telah melakukan RSVP!');
}*/
}
