<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendita extends Model
{
    use HasFactory;  // Permette di utilizzare factories per creare dati di prova

    protected $table = 'venditas';  // Nome della tabella nel database

    public function servizi()
    {
        return $this->belongsTo(Servizi::class, 'id_servizio');  // Relazione molti a uno con la tabella servizis
    }

    public function point()
    {
        return $this->belongsTo(Point::class, 'id_point');  // Relazione molti a uno con la tabella points
    }
}