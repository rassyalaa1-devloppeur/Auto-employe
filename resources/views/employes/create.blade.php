@extends('layout')

@section('content')

<style>
    .form-card {
        background: var(--bg-primary);
        border: 0.5px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        max-width: 680px;
    }
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: .875rem;
    }
    .form-grid .full { grid-column: 1 / -1; }
    .section-divider {
        font-size: 11px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: .06em;
        color: var(--text-secondary);
        padding: .5rem 0 .25rem;
        border-bottom: 0.5px solid var(--border);
        margin: .5rem 0 .75rem;
        grid-column: 1 / -1;
    }
    .form-actions {
        display: flex;
        gap: 8px;
        align-items: center;
        margin-top: 1.25rem;
        padding-top: 1rem;
        border-top: 0.5px solid var(--border);
    }
    .error-msg { font-size: 11px; color: var(--text-danger); margin-top: 4px; }
    @media (max-width: 520px) {
        .form-grid { grid-template-columns: 1fr; }
        .form-grid .full { grid-column: 1; }
    }
</style>

<div style="margin-bottom:1.25rem;display:flex;align-items:center;gap:10px">
    <a href="{{ route('employes.index') }}" style="color:var(--text-secondary);text-decoration:none;font-size:13px">
        ← Retour
    </a>
    <span style="color:var(--border-md)">/</span>
    <h2 style="font-size:18px;font-weight:500">Ajouter un employé</h2>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('employes.store') }}">
        @csrf

        <div class="form-grid">

            <div class="section-divider">Identité</div>

            <div class="form-group">
                <label class="form-label" for="nom">Nom *</label>
                <input type="text" id="nom" name="nom" class="form-control"
                       value="{{ old('nom') }}" placeholder="Amrani" required>
                @error('nom')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="prenom">Prénom *</label>
                <input type="text" id="prenom" name="prenom" class="form-control"
                       value="{{ old('prenom') }}" placeholder="Omar" required>
                @error('prenom')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="matricule">Matricule *</label>
                <input type="text" id="matricule" name="matricule" class="form-control"
                       value="{{ old('matricule') }}" placeholder="EMP-00001" required>
                @error('matricule')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="site">Site *</label>
                <input type="text" id="site" name="site" class="form-control"
                       value="{{ old('site') }}" placeholder="Casablanca" required>
                @error('site')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

            <div class="section-divider">Affectation</div>

            <div class="form-group">
                <label class="form-label" for="societe">Société</label>
                <input type="text" id="societe" name="societe" class="form-control"
                       value="{{ old('societe') }}" placeholder="Acme SA">
                @error('societe')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="departement">Département</label>
                <input type="text" id="departement" name="departement" class="form-control"
                       value="{{ old('departement') }}" placeholder="Informatique">
                @error('departement')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="categorie">Catégorie</label>
                <input type="text" id="categorie" name="categorie" class="form-control"
                       value="{{ old('categorie') }}" placeholder="Cadre">
                @error('categorie')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="activite_fonction">Fonction</label>
                <input type="text" id="activite_fonction" name="activite_fonction" class="form-control"
                       value="{{ old('activite_fonction') }}" placeholder="Ingénieur">
                @error('activite_fonction')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('employes.index') }}" class="btn">Annuler</a>
        </div>

    </form>
</div>

@endsection