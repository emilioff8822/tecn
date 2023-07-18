<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listino extends Model
{
    use HasFactory;

    // Definizione del nome della tabella nel database
    protected $table = 'listinos';

    // Definizione dei campi che possono essere riempiti in modo massivo
    protected $fillable = [
        'id_servizio',
        'id_point',
        'costo',
        'prezzo_vendita',
    ];

    public function servizi()
    {
        // Il Listino appartiene a un Servizio (relazione one to many)
        return $this->belongsTo(Servizi::class, 'id_servizio');
    }

    // Definizione della relazione con il modello Point
    public function point()
    {
        // Il Listino appartiene a un Point (relazione one to many
        return $this->belongsTo(Point::class, 'id_point');
    }
}