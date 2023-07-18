<?php

namespace App\Http\Controllers;

use App\Models\Servizi;
use Illuminate\Http\Request;

class ServiziController extends Controller
{
    // Funzione per mostrare l'elenco dei Servizi
    public function index()
    {
        // Recupera tutti i Servizi dal database paginati con 10 elementi per pagina
        $servizis = Servizi::paginate(10);

        // Mostra la vista dell'elenco dei Servizi con i dati passati
        return view('servizis.index', compact('servizis'));
    }

    // Funzione per creare un nuovo Servizio
    public function create()
    {
        // Mostra la vista per creare un nuovo Servizio
        return view('servizis.create');
    }

    // Funzione per salvare un nuovo Servizio nel database
    public function store(Request $request)
    {
        // Crea un nuovo Servizio utilizzando i dati inviati dalla richiesta
        $servizi = Servizi::create($request->all());

        // Reindirizza all'elenco dei Servizi
        return redirect()->route('servizis.index');
    }

    // Funzione per mostrare i dettagli di un Servizio specifico
    public function show(Servizi $servizi)
    {
        // Mostra la vista dei dettagli del Servizio con i dati passati
        return view('servizis.show', compact('servizi'));
    }

    // Funzione per modificare un Servizio esistente
    public function edit(Servizi $servizi)
    {
        // Mostra la vista per modificare il Servizio con i dati passati
        return view('servizis.edit', compact('servizi'));
    }

    // Funzione per aggiornare un Servizio nel database
    public function update(Request $request, Servizi $servizi)
    {
        // Valida i dati inviati dalla richiesta
        $request->validate([
            'nome_servizio' => 'required',
            'descrizione' => 'required',
        ]);

        // Aggiorna il Servizio utilizzando i dati inviati dalla richiesta
        $servizi->update($request->all());

        // Reindirizza all'elenco dei Servizi con un messaggio di successo
        return redirect()->route('servizis.index')->with('success', 'Servizi updated successfully');
    }

    // Funzione per eliminare un Servizio
    public function destroy(Servizi $servizi)
    {
        // Elimina il Servizio dal database
        $servizi->delete();

        // Prepara un messaggio di notifica con il nome del Servizio eliminato
        $message = $servizi->nome_servizio . " eliminato correttamente.";

        // Reindirizza all'elenco dei Servizi con il messaggio di notifica
        return redirect()->route('servizis.index')->with('status', $message);
    }
}