<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commander extends Model
{
    use HasFactory;
    protected $fillable = [ 'quantite_cmd', 'group_cmd', 'user_id', 'produit_id' ];
}
