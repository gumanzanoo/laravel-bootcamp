<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Inertia\Inertia;
use Inertia\Response;

class ChirpController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Chirps/Index');
    }

    public function create(Request $request): Redirector|Application|RedirectResponse
    {
        $validated = $request->validate([

            'message' => 'required|string|max:255',

        ]);

        $request->user()->chirps()->create($validated);

        return redirect(route('chirps.index'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Chirp $chirp)
    {
        //
    }

    public function edit(Chirp $chirp)
    {
        //
    }

    public function update(Request $request, Chirp $chirp)
    {
        //
    }

    public function destroy(Chirp $chirp)
    {
        //
    }
}
