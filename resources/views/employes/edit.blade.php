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
    .emp-badge {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: .75rem 1rem;
        background: var(--bg-secondary);
        border-radius: var(--radius-md);
        margin-bottom: 1.25rem;
    }
    .avatar-lg {
        width: 42px; height: 42px;
        border-radius: 50%;
        background: var(--bg-info);
        color: var(--text-info);
        display: flex; align-items: center; justify-content: center;
        font-size: 14px; font-weight: 500;
        flex-shrink: 0;
    }
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
    <h2 style="font-size:18px;font-weight:500">Modifier l'employé</h2>
</div>

<div class="form-card">

    {{-- Badge récapitulatif --}}
    <div class="emp-badge">
        <div class="avatar-lg">
            {{ strtoupper(substr($employe->prenom,0,1).substr($employe->nom,0,1)) }}
        </div>
        <div>
            <div style="font-weight:500;font-size:14px">{{ $employe->prenom }} {{ $employe->nom }}</div>
            <div style="font-size:12px;color:var(--text-secondary)">
                {{ $employe->matricule }} · {{ $employe->site }}
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('employes.update', $employe->id) }}">
        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="section-divider">Identité</div>

            <div class="form-group">
                <label class="form-label" for="nom">Nom *</label>
                <input type="text" id="nom" name="nom" class="form-control"
                       value="{{ old('nom', $employe->nom) }}" required>
                @error('nom')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="prenom">Prénom *</label>
                <input type="text" id="prenom" name="prenom" class="form-control"
                       value="{{ old('prenom', $employe->prenom) }}" required>
                @error('prenom')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="matricule">Matricule *</label>
                <input type="text" id="matricule" name="matricule" class="form-control"
                       value="{{ old('matricule', $employe->matricule) }}" required>
                @error('matricule')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="site">Site *</label>
                <input type="text" id="site" name="site" class="form-control"
                       value="{{ old('site', $employe->site) }}" required>
                @error('site')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

            <div class="section-divider">Affectation</div>

            <div class="form-group">
                <label class="form-label" for="societe">Société</label>
                <input type="text" id="societe" name="societe" class="form-control"
                       value="{{ old('societe', $employe->societe) }}">
                @error('societe')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="departement">Département</label>
                <input type="text" id="departement" name="departement" class="form-control"
                       value="{{ old('departement', $employe->departement) }}">
                @error('departement')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="categorie">Catégorie</label>
                <input type="text" id="categorie" name="categorie" class="form-control"
                       value="{{ old('categorie', $employe->categorie) }}">
                @error('categorie')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="activite_fonction">Fonction</label>
                <input type="text" id="activite_fonction" name="activite_fonction" class="form-control"
                       value="{{ old('activite_fonction', $employe->activite_fonction) }}">
                @error('activite_fonction')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('employes.index') }}" class="btn">Annuler</a>
        </div>

    </form>
</div>

@endsection