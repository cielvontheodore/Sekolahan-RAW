<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Inbox $inbox)
    {
        $inbox = Inbox::latest()->paginate(10);
        return view('inboxdir.index', compact('inbox'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inboxdir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);

        Inbox::create($validate);
        return redirect()->route('admin-inbox.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inbox $inbox)
    {
        //
    }

    public function storepublic(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);

        $response = Http::asForm()->post(
            'https://challenges.cloudflare.com/turnstile/v0/siteverify',
            [
                'secret' => config('services.turnstile.secret_key'),
                'response' => $request->input('cf-turnstile-response'),
                'remoteip' => $request->ip(),
            ]
        );

        if (! $response->json('success')) {
            return back()
                ->withErrors(['captcha' => 'CAPTCHA verification failed.'])
                ->withInput();
        }

        Inbox::create($validate);

        Http::post('http://127.0.0.1:3001/send', [
            'message' =>
                "Pesan Baru dari Website\n\n" .
                "Nama: {$validate['name']}\n" .
                "Email: {$validate['email']}\n" .
                "Program: {$validate['program']}\n" .
                "Pesan: {$validate['message']}",
        ]);

        return redirect('/');
    }

    // todo : bang limit form ke 255 di front end

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inbox $inbox)
    {
        return view('inboxdir.edit', compact('inbox'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inbox $inbox)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);

        $inbox->update($validated);
        return redirect()->route('admin-inbox.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inbox $inbox)
    {
        $inbox->delete();
        return redirect()->route('admin-inbox.index');
    }
}
