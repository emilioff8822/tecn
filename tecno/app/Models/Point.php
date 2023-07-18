<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;  // Permette di utilizzare factories per creare dati di prova

    protected $table = 'points';  // Nome della tabella nel database

    public function listinos()
    {
        return $this->hasMany(Listino::class, 'id_point');  // Relazione 1 a molti con la tabella listinos
    }

    public function venditas()
    {
        return $this->hasMany(Vendita::class, 'id_point');  // Relazione 1 a molti con la tabella venditas
    }
}