@extends('layouts.master')
@section('page_title', 'Détails de la Classe')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Détails de la Classe</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nom Complet</th>
                            <td>{{ $classSection->getFormattedName() }}</td>
                        </tr>
                        <tr>
                            <th>Nom Court</th>
                            <td>{{ $classSection->getShortName() }}</td>
                        </tr>
                        <tr>
                            <th>Code</th>
                            <td><code>{{ $classSection->code }}</code></td>
                        </tr>
                        <tr>
                            <th>Catégorie</th>
                            <td>{{ $classSection->getClassType()->name }}</td>
                        </tr>
                        <tr>
                            <th>Classe</th>
                            <td>{{ $classSection->getMyClass()->name }}</td>
                        </tr>
                        <tr>
                            <th>Section</th>
                            <td>{{ $classSection->section->name }}</td>
                        </tr>
                        @if($classSection->series)
                        <tr>
                            <th>Série</th>
                            <td>{{ $classSection->series->name }} ({{ $classSection->series->code }})</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Statut</th>
                            <td>
                                @if($classSection->active)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-secondary">Inactive</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Étudiants</th>
                            <td>
                                <span class="badge badge-info">{{ $classSection->getStudentCount() }}</span>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="col-md-6">
                    <div class="card bg-light">
                        <div class="card-header">
                            <h6 class="card-title">Actions</h6>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                <a href="{{ route('class-sections.toggle-status', $classSection->id) }}" class="list-group-item list-group-item-action">
                                    <i class="icon-{{ $classSection->active ? 'cross' : 'check' }}"></i> 
                                    {{ $classSection->active ? 'Désactiver' : 'Activer' }} la classe
                                </a>
                                
                                @if($classSection->getStudentCount() == 0)
                                    <a href="#" onclick="confirmDelete('{{ $classSection->id }}')" class="list-group-item list-group-item-action text-danger">
                                        <i class="icon-trash"></i> Supprimer la classe
                                    </a>
                                @else
                                    <div class="list-group-item list-group-item-secondary">
                                        <i class="icon-info"></i> Impossible de supprimer (contient des étudiants)
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card bg-info mt-3">
                        <div class="card-header">
                            <h6 class="card-title text-white">Informations</h6>
                        </div>
                        <div class="card-body">
                            <p class="text-white">
                                <strong>Description :</strong><br>
                                {{ $classSection->description ?: 'Aucune description disponible.' }}
                            </p>
                            <p class="text-white">
                                <strong>Créée le :</strong><br>
                                {{ $classSection->created_at->format('d/m/Y H:i') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-right mt-3">
                <a href="{{ route('class-sections.index') }}" class="btn btn-secondary">
                    <i class="icon-arrow-left8"></i> Retour à la liste
                </a>
            </div>
        </div>
    </div>

    <!-- Formulaire de suppression -->
    <form id="delete-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

@endsection

@section('scripts')
<script>
    function confirmDelete(id) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cette classe ?')) {
            var form = document.getElementById('delete-form');
            form.action = '{{ route("class-sections.index") }}/' + id;
            form.submit();
        }
    }
</script>
@endsection
