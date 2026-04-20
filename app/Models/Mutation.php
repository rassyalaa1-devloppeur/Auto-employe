<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mutation extends Model
{
    protected $fillable = [
        'employe_id',
        'ancien_site',
        'nouveau_site',
        'ancien_departement',
        'nouveau_departement',
    ];
}
