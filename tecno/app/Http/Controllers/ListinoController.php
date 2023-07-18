<?php

namespace App\Http\Controllers;

use App\Models\Listino;
use Illuminate\Http\Request;

class ListinoController extends Controller
{
    // Funzione per mostrare l'elenco dei listini
    public function index()
    {
        // Recupera i listini paginati con i servizi e i point associati
        $listinos = Listino::with(['servizi', 'point'])->paginate(10);

        // Mostra la vista degli elenco listini con i dati passati
        return view('listinos.index', compact('listinos'));
    }

    // Funzione per creare un nuovo listino
    public function create()
    {
        // Mostra la vista per creare un nuovo listino
        return view('listinos.create');
    }

    // Funzione per salvare un nuovo listino nel database
    public function store(Request $request)
    {
        // Crea un nuovo listino utilizzando i dati inviati dalla richiesta
        $listino = Listino::create($request->all());

        // Reindirizza all'elenco dei listini
        return redirect()->route('listinos.index');
    }

    // Funzione per mostrare i dettagli di un listino specifico
    public function show(Listino $listino)
    {
        // Mostra la vista dei dettagli del listino con i dati passati
        return view('listinos.show', compact('listino'));
    }

    // Funzione per modificare un listino esistente
    public function edit(Listino $listino)
    {
        // Mostra la vista per modificare il listino con i dati passati
        return view('listinos.edit', compact('listino'));
    }

    // Funzione per aggiornare un listino nel database
    public function update(Request $request, Listino $listino)
    {
        // Validazione dei campi richiesti
        $request->validate([
            'costo' => 'required',
            'prezzo_vendita' => 'required',
        ]);

        // Aggiorna il listino utilizzando i dati inviati dalla richiesta
        $listino->update($request->all());

        // Reindirizza all'elenco dei listini con un messaggio di successo
        return redirect()->route('listinos.index')->with('success', 'Listino updated successfully');
    }

    // Funzione per eliminare un listino
    public function destroy(Listino $listino)
    {
        // Elimina il listino dal database
        $listino->delete();

        // Reindirizza all'elenco dei listini con un messaggio di successo
        return redirect()->route('listinos.index')->with('status', 'Il record è stato eliminato con successo.');
    }
}