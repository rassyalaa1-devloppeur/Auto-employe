@extends('layout')

@section('content')

<style>
    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 1.25rem;
    }
    .section-title { font-size: 18px; font-weight: 500; color: var(--text-primary); }

    .stat-card {
        background: var(--bg-info);
        border-radius: var(--radius-md);
        padding: .625rem 1.25rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .stat-num   { font-size: 22px; font-weight: 500; color: var(--text-info); }
    .stat-label { font-size: 12px; color: var(--text-info); opacity: .8; }

    /* TOOLBAR */
    .toolbar {
        background: var(--bg-primary);
        border: 0.5px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 1rem;
        margin-bottom: 1rem;
        display: flex;
        flex-direction: column;
        gap: .75rem;
    }
    .toolbar-row {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        align-items: center;
    }
    .toolbar-row .form-control { flex: 1; min-width: 180px; }
    .btn-group { display: flex; gap: 8px; flex-wrap: wrap; }

    .import-row {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        padding: .6rem .875rem;
        background: var(--bg-secondary);
        border-radius: var(--radius-md);
        border: 0.5px solid var(--border);
        font-size: 13px;
        color: var(--text-secondary);
    }
    .import-row input[type="file"] { font-size: 12px; color: var(--text-secondary); flex: 1; min-width: 0; }

    /* TABLE */
    .table-wrap { margin-bottom: 1rem; }
    table { width: 100%; border-collapse: collapse; font-size: 13px; }
    thead th {
        text-align: left;
        padding: 10px 14px;
        font-size: 11px;
        font-weight: 500;
        color: var(--text-secondary);
        text-transform: uppercase;
        letter-spacing: .05em;
        border-bottom: 0.5px solid var(--border);
        background: var(--bg-secondary);
        white-space: nowrap;
    }
    tbody td {
        padding: 11px 14px;
        border-bottom: 0.5px solid var(--border);
        color: var(--text-primary);
        vertical-align: middle;
    }
    tbody tr:last-child td { border-bottom: none; }
    tbody tr:hover td { background: var(--bg-secondary); }

    .avatar {
        width: 34px; height: 34px;
        border-radius: 50%;
        background: var(--bg-info);
        color: var(--text-info);
        display: flex; align-items: center; justify-content: center;
        font-size: 11px; font-weight: 500;
        flex-shrink: 0;
    }
    .emp-name  { font-weight: 500; font-size: 13px; }
    .emp-role  { font-size: 11px; color: var(--text-secondary); margin-top: 1px; }
    .mono      { font-family: var(--mono); font-size: 12px; color: var(--text-secondary); }

    .badge-site {
        display: inline-block;
        padding: 2px 8px;
        border-radius: 100px;
        font-size: 11px;
        font-weight: 500;
        background: var(--bg-tertiary);
        color: var(--text-secondary);
        border: 0.5px solid var(--border);
        white-space: nowrap;
    }
    .actions { display: flex; gap: 6px; align-items: center; justify-content: flex-end; }

    /* MOBILE CARDS */
    .mobile-cards { display: none; flex-direction: column; gap: 10px; margin-bottom: 1rem; }
    .emp-card {
        background: var(--bg-primary);
        border: 0.5px solid var(--border);
        border-radius: var(--radius-lg);
        padding: .875rem 1rem;
    }
    .emp-card-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 10px; }
    .emp-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 10px;
        border-top: 0.5px solid var(--border);
        font-size: 12px;
        color: var(--text-secondary);
    }

    /* PAGINATION */
    .pagination-wrap {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        padding: 14px 0 4px;
        font-size: 13px;
        color: var(--text-secondary);
    }
    .pagination-wrap strong {
        color: var(--text-primary);
        font-weight: 500;
    }
    .pagination-wrap .pagination {
        display: flex;
        gap: 5px;
        list-style: none;
        flex-wrap: wrap;
        align-items: center;
        margin: 0;
        padding: 0;
    }
    .pagination-wrap .pagination li a,
    .pagination-wrap .pagination li span {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 36px;
        height: 36px;
        padding: 0 12px;
        border-radius: var(--radius-md);
        font-size: 13px;
        font-weight: 500;
        border: 0.5px solid var(--border-md);
        background: var(--bg-primary);
        color: var(--text-primary);
        text-decoration: none;
        transition: background .15s;
        white-space: nowrap;
        line-height: 1;
    }
    .pagination-wrap .pagination li a:hover {
        background: var(--bg-secondary);
    }
    .pagination-wrap .pagination li.active span {
        background: var(--bg-info);
        color: var(--text-info);
        border-color: var(--text-info);
        font-weight: 600;
    }
    .pagination-wrap .pagination li.disabled span {
        background: transparent;
        border-color: transparent;
        color: var(--text-secondary);
        opacity: .35;
        cursor: default;
    }

    /* RESPONSIVE */
    @media (max-width: 680px) {
        .desktop-table { display: none; }
        .mobile-cards  { display: flex; }
        .toolbar-row   { flex-direction: column; align-items: stretch; }
        .toolbar-row .form-control { min-width: 0; }
        .btn-group .btn { flex: 1; justify-content: center; }
        .page-header    { flex-direction: column; align-items: flex-start; }
    }
</style>

{{-- HEADER --}}
<div class="page-header">
    <h2 class="section-title">Gestion des employés</h2>
    <div class="stat-card">
        <div>
            <div class="stat-num">{{ $total }}</div>
            <div class="stat-label">Total employés</div>
        </div>
    </div>
</div>

{{-- FLASH MESSAGE --}}
@if(session('success'))
    <div class="alert-success">✓ {{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert-danger">✕ {{ session('error') }}</div>
@endif

{{-- TOOLBAR --}}
<div class="toolbar">
    <div class="toolbar-row">
        <form method="GET" style="flex:1;min-width:180px;display:flex;">
            <input type="text" name="search" class="form-control"
                   placeholder="Rechercher par nom, matricule, site…"
                   value="{{ request('search') }}">
        </form>
        <div class="btn-group">
            <a href="{{ route('employes.create') }}" class="btn btn-primary">+ Ajouter</a>
            <a href="{{ route('employes.export') }}" class="btn btn-success">↓ Export CSV</a>
        </div>
    </div>

    <form action="{{ route('employes.import') }}" method="POST"
          enctype="multipart/form-data" class="import-row">
        @csrf
        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" style="flex-shrink:0">
            <path d="M2 11v2h12v-2M8 2v8M5 7l3 3 3-3"
                  stroke="currentColor" stroke-width="1.4"
                  stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span>Importer CSV / Excel</span>
        <input type="file" name="file" accept=".csv,.xlsx,.xls">
        <button type="submit" class="btn btn-dark">Importer</button>
    </form>
</div>

{{-- TABLE DESKTOP --}}
@if($employes->count() == 0)

    <div class="card">
        <div class="card-body" style="text-align:center;padding:2rem">

            <h3 style="margin-bottom:10px">📭 Aucun employé</h3>

            <p style="color:var(--text-secondary);margin-bottom:15px">
                Veuillez importer un fichier Excel pour afficher les données.
            </p>
        </div>
    </div>

@else

<div class="card table-wrap desktop-table">
    <table>
        <thead>
            <tr>
                <th>Employé</th>
                <th>Matricule</th>
                <th>Site</th>
                <th>Société</th>
                <th>Département</th>
                <th style="text-align:right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employes as $e)
            <tr>
                <td>
                    <div style="display:flex;align-items:center;gap:10px">
                        <div class="avatar">
                            {{ strtoupper(substr($e->prenom,0,1).substr($e->nom,0,1)) }}
                        </div>
                        <div>
                            <div class="emp-name">{{ $e->prenom }} {{ $e->nom }}</div>
                            @if($e->activite_fonction)
                                <div class="emp-role">{{ $e->activite_fonction }}</div>
                            @endif
                        </div>
                    </div>
                </td>
                <td class="mono">{{ $e->matricule }}</td>
                <td><span class="badge-site">{{ $e->site }}</span></td>
                <td style="font-size:12px;color:var(--text-secondary)">{{ $e->societe ?? '—' }}</td>
                <td style="font-size:12px;color:var(--text-secondary)">{{ $e->departement ?? '—' }}</td>
                <td>
                    <div class="actions">
                        <a class="btn btn-warning" href="{{ route('employes.edit', $e->id) }}">Modifier</a>
                        <form method="POST" action="{{ route('employes.destroy', $e->id) }}"
                              onsubmit="return confirm('Supprimer cet employé ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center;padding:2rem;color:var(--text-secondary);">
                    Aucun employé trouvé.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endif

{{-- CARDS MOBILE --}}
<div class="mobile-cards">
    @foreach($employes as $e)
    <div class="emp-card">
        <div class="emp-card-header">
            <div style="display:flex;align-items:center;gap:10px">
                <div class="avatar">
                    {{ strtoupper(substr($e->prenom,0,1).substr($e->nom,0,1)) }}
                </div>
                <div>
                    <div class="emp-name">{{ $e->prenom }} {{ $e->nom }}</div>
                    <div class="emp-role">{{ $e->matricule }}</div>
                </div>
            </div>
            <span class="badge-site">{{ $e->site }}</span>
        </div>
        <div class="emp-card-footer">
            <span>{{ $e->departement ?? '' }}{{ $e->societe ? ' · '.$e->societe : '' }}</span>
            <div class="actions">
                <a class="btn btn-warning" href="{{ route('employes.edit', $e->id) }}">Modifier</a>
                <form method="POST" action="{{ route('employes.destroy', $e->id) }}"
                      onsubmit="return confirm('Supprimer ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- PAGINATION --}}
<div class="pagination-wrap">
    <span>
        Affichage <strong>{{ $employes->firstItem() }}–{{ $employes->lastItem() }}</strong>
        sur <strong>{{ $employes->total() }}</strong> employés
    </span>
    {{ $employes->appends(request()->query())->links('pagination.custom') }}
</div>

@endsection