<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servizi extends Model
{
    use HasFactory;  // Permette di utilizzare factories per creare dati di prova

    protected $table = 'servizis';  // Nome della tabella nel database

    protected $fillable = ['nome_servizio', 'descrizione'];  // Campi modificabili con assegnazione di massa

    public function listinos()
    {
        return $this->hasMany(Listino::class, 'id_servizio');  // Relazione 1 a molti con la tabella listinos
    }

    public function venditas()
    {
        return $this->hasMany(Vendita::class, 'id_servizio');  // Relazione 1 a molti con la tabella venditas
    }
}