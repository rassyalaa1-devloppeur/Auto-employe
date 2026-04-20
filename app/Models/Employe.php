<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $fillable = [
    'societe',
    'site',
    'departement',
    'matricule',
    'activite_fonction',
    'categorie',
    'nom',
    'prenom',
];
}
