<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [ 'quantite_totale', 'prix_totale', 'point_de_vente_id', 'group_facture' ];

}
