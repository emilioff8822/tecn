<?php

namespace App\Http\Controllers;

use App\Models\Servizi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiziController extends Controller
{
    // Funzione per mostrare l'elenco dei Servizi
     public function index(Request $request)
    {
        // Ottieni il parametro di ordinamento dalla query string
        $order = $request->query('order', 'asc');

        // Recupera tutti i Servizi dal database ordinati
        $servizis = Servizi::orderBy('id', $order)->paginate(10);

        // Inverti l'ordine se il parametro di ordinamento è "desc"
        if ($order === 'desc') {
            $servizis->withPath('/servizis?order=asc');
        }

        // Mostra la vista dell'elenco dei Servizi con i dati passati
        return view('servizis.index', compact('servizis', 'order'));
    }

    // Funzione per creare un nuovo Servizio
 public function create()
{
    // Mostra la vista per creare un nuovo Servizio
    return view('servizis.create');
}

public function store(Request $request)
{
    // Validazione dei dati
    $request->validate([
        'nome_servizio' => 'required',
        'descrizione' => 'required',
    ]);

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
    // Definisci le regole di validazione
    $rules = [
        'nome_servizio' => 'required|min:3|max:255',
        'descrizione' => 'required|min:10',
    ];

    // Definisci i messaggi di errore personalizzati
    $messages = [
        'nome_servizio.required' => 'Il nome del servizio è un campo obbligatorio',
        'nome_servizio.min' => 'Il nome del servizio deve avere almeno :min caratteri',
        'nome_servizio.max' => 'Il nome del servizio può avere al massimo :max caratteri',
        'descrizione.required' => 'La descrizione è un campo obbligatorio',
        'descrizione.min' => 'La descrizione deve avere almeno :min caratteri',
    ];

    // Valida i dati inviati dalla richiesta
    $validator = Validator::make($request->all(), $rules, $messages);

    // Controlla se la validazione è passata
    if ($validator->fails()) {
        // Reindirizza indietro con gli errori
        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Aggiorna il Servizio utilizzando i dati inviati dalla richiesta
    $servizi->update($request->all());

    // Reindirizza all'elenco dei Servizi con un messaggio di successo
    return redirect()->route('servizis.index')->with('success', 'Servizio aggiornato con successo');
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