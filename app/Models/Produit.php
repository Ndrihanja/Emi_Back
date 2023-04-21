<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [ 'libelle', 'categorie', 'prix', 'quantite', 'etat', 'point_de_vente_id' ];
}
