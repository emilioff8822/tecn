<?php

namespace App\Http\Controllers;

use App\Models\Vendita;
use Illuminate\Http\Request;

class VenditaController extends Controller
{
    public function index()
    {
        $venditas = Vendita::all();
        return view('venditas.index', compact('venditas'));
    }

    public function create()
    {
        return view('venditas.create');
    }

    public function store(Request $request)
    {
        $vendita = Vendita::create($request->all());
        return redirect()->route('venditas.index');
    }

    public function show(Vendita $vendita)
    {
        return view('venditas.show', compact('vendita'));
    }

    public function edit(Vendita $vendita)
    {
        return view('venditas.edit', compact('vendita'));
    }

    public function update(Request $request, Vendita $vendita)
    {
        $vendita->update($request->all());
        return redirect()->route('venditas.index');
    }

    public function destroy(Vendita $vendita)
    {
        $vendita->delete();
        return redirect()->route('venditas.index');
    }
}