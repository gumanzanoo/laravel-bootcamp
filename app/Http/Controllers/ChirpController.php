<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ChirpController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Chirps/Index');
    }

    public function create()
    {
        //
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
