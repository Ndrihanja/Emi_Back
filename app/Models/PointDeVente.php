<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointDeVente extends Model
{
    use HasFactory;

    protected $fillable = [ 'nom', 'longitude', 'latitude', 'region_id' ];
}
