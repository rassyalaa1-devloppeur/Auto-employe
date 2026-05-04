<?php

namespace App\Imports;

use App\Models\Employe;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class EmployesImport implements ToModel, WithHeadingRow, WithUpserts
{
    public function uniqueBy()
    {
        return 'matricule';
    }

    public function model(array $row)
    {
        if (empty($row['matricule'])) {
            return null;
        }

        return new Employe([
            'societe' => $row['societe'] ?? $row['société'] ?? $row['societe_'] ?? null,
            'site' => $row['site'] ?? null,
            'departement' => $row['departement'] ?? $row['département'] ?? null,
            'matricule' => $row['matricule'],
            'activite_fonction' => $row['activite_fonction'] ?? $row['activité_fonction'] ?? $row['activitefonction'] ?? null,
            'categorie' => $row['categorie'] ?? $row['catégorie'] ?? null,
            'nom' => $row['nom'] ?? null,
            'prenom' => $row['prenom'] ?? $row['prénom'] ?? null,
        ]);
    }
}
