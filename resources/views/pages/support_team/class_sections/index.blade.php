@extends('layouts.master')
@section('page_title', 'Gestion des Classes Complètes')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Gestion des Classes Complètes</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12">
                    <a href="{{ route('class-sections.create') }}" class="btn btn-primary">
                        <i class="icon-plus2 mr-2"></i>Créer une Nouvelle Classe
                    </a>
                </div>
            </div>

            <ul class="nav nav-tabs nav-tabs-highlight">
                @foreach($classTypes as $classType)
                    <li class="nav-item">
                        <a href="#category-{{ $classType->id }}" class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab">
                            {{ $classType->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach($classTypes as $classType)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="category-{{ $classType->id }}">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Classe Complète</th>
                                        <th>Code</th>
                                        <th>Étudiants</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($classSections[$classType->id]))
                                        @foreach($classSections[$classType->id] as $classSection)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <strong>{{ $classSection->getFormattedName() }}</strong>
                                                    <br>
                                                    <small class="text-muted">{{ $classSection->getShortName() }}</small>
                                                </td>
                                                <td>
                                                    <code>{{ $classSection->code }}</code>
                                                </td>
                                                <td>
                                                    <span class="badge badge-info">{{ $classSection->getStudentCount() }}</span>
                                                </td>
                                                <td>
                                                    @if($classSection->active)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-secondary">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="list-icons">
                                                        <div class="dropdown">
                                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                <i class="icon-menu9"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-left">
                                                                <a href="{{ route('class-sections.show', $classSection->id) }}" class="dropdown-item">
                                                                    <i class="icon-eye"></i> Voir détails
                                                                </a>
                                                                
                                                                <a href="{{ route('class-sections.toggle-status', $classSection->id) }}" class="dropdown-item">
                                                                    <i class="icon-{{ $classSection->active ? 'cross' : 'check' }}"></i> 
                                                                    {{ $classSection->active ? 'Désactiver' : 'Activer' }}
                                                                </a>
                                                                
                                                                @if($classSection->getStudentCount() == 0)
                                                                    <div class="dropdown-divider"></div>
                                                                    <a href="#" onclick="confirmDelete('{{ $classSection->id }}')" class="dropdown-item text-danger">
                                                                        <i class="icon-trash"></i> Supprimer
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">
                                                Aucune classe complète trouvée pour cette catégorie.
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
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
