<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galerie extends Model
{
    use HasFactory;

    protected $fillable = [ 'image', 'principal', 'produit_id', 'point_de_vente_id' ];
}
