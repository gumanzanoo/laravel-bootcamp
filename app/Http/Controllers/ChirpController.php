<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChirpRequest;
use App\Models\Chirp;
use Illuminate\Auth\Access\AuthorizationException;
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
        return Inertia::render('Chirps/Index', [
            'chirps' => Chirp::with('user:id,name')
                ->latest()
                ->get()
        ]);
    }

    public function store(StoreChirpRequest $request): Redirector|Application|RedirectResponse
    {
        $validated = $request->validated();

        $request->user()->chirps()->create($validated);

        return redirect(route('chirps.index'));
    }

    /**
     * @throws AuthorizationException
     */
    public function update(StoreChirpRequest $request, Chirp $chirp): Redirector|Application|RedirectResponse
    {
        $this->authorize('update', $chirp);

        $validated = $request->validated();

        $chirp->update($validated);

        return redirect(route('chirps.index'));
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(Chirp $chirp): Redirector|Application|RedirectResponse
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();

        return redirect(route('chirps.index'));
    }
}
