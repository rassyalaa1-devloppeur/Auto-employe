<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployesImport;
use App\Exports\EmployesExport;
use App\Models\Mutation;

class EmployeController extends Controller
{
    public function index(Request $request)
    {
        $query = Employe::query();

        if ($request->search) {
            $query->where('nom', 'like', '%'.$request->search.'%')
                  ->orWhere('prenom', 'like', '%'.$request->search.'%')
                  ->orWhere('matricule', 'like', '%'.$request->search.'%');
        }

        $employes = $query->paginate(5);
        $total = Employe::count();

        return view('employes.index', compact('employes', 'total'));
    }

    public function create()
    {
        return view('employes.create');
    }

    public function store(Request $request)
    {
        Employe::create($request->all());

        return redirect()->route('employes.index')
            ->with('success', 'Employé ajouté');
    }

    public function edit(Employe $employe)
    {
        return view('employes.edit', compact('employe'));
    }

    public function update(Request $request, Employe $employe)
    {

    $ancien_site = $employe->site;
    $ancien_departement = $employe->departement;

    
    $employe->update($request->all());

    
    if (
        $ancien_site != $request->site ||
        $ancien_departement != $request->departement
    ) {
        Mutation::create([
            'employe_id' => $employe->id,
            'ancien_site' => $ancien_site,
            'nouveau_site' => $request->site,
            'ancien_departement' => $ancien_departement,
            'nouveau_departement' => $request->departement,
        ]);
    }

    return redirect()->route('employes.index')
        ->with('success', 'Employé modifié + mutation enregistrée');
    }

    public function destroy(Employe $employe)
    {
        $employe->delete();

        return redirect()->route('employes.index')
            ->with('success', 'Employé supprimé');
    }

    public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv'
    ]);

    try {
        Excel::import(new EmployesImport, $request->file('file'));

        return redirect()->route('employes.index')
            ->with('success', 'Import réussi 🎉');

    } catch (\Exception $e) {
        return redirect()->route('employes.index')
            ->with('error', 'Erreur import : ' . $e->getMessage());
    }
}
    public function export()
    {
        return Excel::download(new EmployesExport, 'employes.xlsx');
    }
}
