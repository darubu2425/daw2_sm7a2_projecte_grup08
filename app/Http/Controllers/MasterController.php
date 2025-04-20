<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    // Index (para admin y consultor)
    public function index()
    {
        $masters = Master::all();
        return view('masters.index', compact('masters'));
    }

    // Create (solo admin)
    public function create()
    {
        return view('masters.create');
    }

    // Store (solo admin)
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'hores' => 'required|numeric',
            'director' => 'required'
        ]);

        Master::create($request->all());
        return redirect()->route('masters.index')->with('success', 'Màster creat!');
    }

    // Show (para admin y consultor)
    public function show(Master $master)
    {
        return view('masters.show', compact('master'));
    }

    // Edit (solo admin)
    public function edit(Master $master)
    {
        return view('masters.edit', compact('master'));
    }

    // Update (solo admin)
    public function update(Request $request, Master $master)
    {
        $request->validate([
            'nom' => 'required',
            'hores' => 'required|numeric',
            'director' => 'required'
        ]);

        $master->update($request->all());
        return redirect()->route('masters.index')->with('success', 'Màster actualitzat!');
    }

    // Destroy (solo admin)
    public function destroy(Master $master)
    {
        $master->delete();
        return redirect()->route('masters.index')->with('success', 'Màster esborrat!');
    }
}