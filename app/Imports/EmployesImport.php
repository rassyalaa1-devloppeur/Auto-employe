<?php

namespace App\Imports;

use App\Models\Employe;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class EmployesImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
     * العمود اللي كيتحدد به التكرار
     */
    public function uniqueBy()
    {
        return 'matricule';
    }

    /**
     * إنشاء أو تحديث الموظف
     */
    public function model(array $row)
    {
        return new Employe([
            'societe' => $row['societe'],
            'site' => $row['site'],
            'departement' => $row['departement'],
            'matricule' => $row['matricule'],
            'activite_fonction' => $row['activite_fonction'],
            'categorie' => $row['categorie'],
            'nom' => $row['nom'],
            'prenom' => $row['prenom'],
        ]);
    }
}