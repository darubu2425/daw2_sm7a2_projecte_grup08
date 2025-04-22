<?php

namespace App\Http\Controllers;

use App\Models\Alumne;
use App\Models\Master;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AlumneController extends Controller
{
    /**
     * Mostrar llista d'alumnes.
     */
    public function index()
    {
        $alumnes = Alumne::with('master')->get();
        return view('alumnes.index', compact('alumnes'));
    }

    /**
     * Mostrar formulari de creació.
     */
    public function create()
    {
        $masters = Master::all(); // Per al dropdown de màsters
        return view('alumnes.create', compact('masters'));
    }

    /**
     * Emmagatzemar nou alumne.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'correu' => 'required|email|unique:alumnes,correu',
            'adreça' => 'required|string',
            'ciutat' => 'required|string',
            'pais' => 'required|string',
            'telefon' => 'required|string',
            'master_id' => 'required|exists:masters,identificador'
        ]);

        Alumne::create($request->all());

        return redirect()->route('alumnes.index')
            ->with('success', 'Alumne creat correctament!');
    }

    /**
     * Mostrar detalls d'un alumne.
     */
    public function show(Alumne $alumne)
    {
        return view('alumnes.show', compact('alumne'));
    }

    /**
     * Mostrar formulari d'edició.
     */
    public function edit(Alumne $alumne)
    {
        $masters = Master::all();
        return view('alumnes.edit', compact('alumne', 'masters'));
    }

    /**
     * Actualitzar alumne existent.
     */
    public function update(Request $request, Alumne $alumne)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'correu' => 'required|email|unique:alumnes,correu,' . $alumne->identificador . ',identificador',
            'adreça' => 'required|string',
            'ciutat' => 'required|string',
            'pais' => 'required|string',
            'telefon' => 'required|string',
            'master_id' => 'required|exists:masters,identificador'
        ]);

        $alumne->update($request->all());

        return redirect()->route('alumnes.index')
            ->with('success', 'Alumne actualitzat correctament!');
    }

    /**
     * Esborrar alumne.
     */
    public function destroy(Alumne $alumne)
    {
        $alumne->delete();
        return redirect()->route('alumnes.index')
            ->with('success', 'Alumne esborrat correctament!');
    }

    public function exportPdf($id)
    {
        $alumne = Alumne::with('master')->findOrFail($id);
        $pdf = Pdf::loadView('alumnes.pdf', compact('alumne'));
        
        return $pdf->download('alumne-'.$alumne->identificador.'.pdf');
    }
}