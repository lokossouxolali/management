@extends('layouts.master')
@section('page_title', 'Gérer les Examens')

@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title font-weight-semibold">Gérer les Examens</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-exams" class="nav-link active" data-toggle="tab">Gérer les Examens</a></li>
                <li class="nav-item"><a href="#new-exam" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i> Ajouter un Examen</a></li>
            </ul>

            <div class="tab-content">
                    <div class="tab-pane fade show active" id="all-exams">
                        <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Période</th>
                                <th>Session</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exams as $ex)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ex->name }}</td>
                                    <td>{{ $ex->getPeriodLabel() }}</td>
                                    <td>{{ $ex->year }}</td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-left">
                                                    @if(Qs::userIsTeamSA())
                                                    {{--Edit--}}
                                                    <a href="{{ route('exams.edit', $ex->id) }}" class="dropdown-item"><i class="icon-pencil"></i> Modifier</a>
                                                   @endif
                                                    @if(Qs::userIsSuperAdmin())
                                                    {{--Delete--}}
                                                    <a id="{{ $ex->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Supprimer</a>
                                                    <form method="post" id="item-delete-{{ $ex->id }}" action="{{ route('exams.destroy', $ex->id) }}" class="hidden">@csrf @method('delete')</form>
                                                        @endif

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                <div class="tab-pane fade" id="new-exam">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info border-0 alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>

                                <span>Vous créez un Examen pour la Session Actuelle <strong>{{ Qs::getSetting('current_session') }}</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <form method="post" action="{{ route('exams.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Nom <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input name="name" value="{{ old('name') }}" required type="text" class="form-control" placeholder="Nom de l'Examen">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="class_type_id" class="col-lg-3 col-form-label font-weight-semibold">Type de Classe <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select data-placeholder="Sélectionner un type de classe" class="form-control select-search" name="class_type_id" id="class_type_id" required>
                                            <option value=""></option>
                                            @foreach($class_types as $ct)
                                                <option {{ old('class_type_id') == $ct->id ? 'selected' : '' }} value="{{ $ct->id }}">{{ $ct->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="term" class="col-lg-3 col-form-label font-weight-semibold">Période <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select data-placeholder="Sélectionner une période" class="form-control select-search" name="term" id="term" required>
                                            <option value=""></option>
                                            <!-- Les options seront remplies dynamiquement via JavaScript -->
                                        </select>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Soumettre <i class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Class List Ends--}}

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Configuration des périodes selon le type de classe
    const periodConfig = {
        'C': { // Crèche
            type: 'trimestre',
            options: {
                1: 'Premier Trimestre',
                2: 'Deuxième Trimestre',
                3: 'Troisième Trimestre'
            }
        },
        'PS': { // Petite section
            type: 'trimestre',
            options: {
                1: 'Premier Trimestre',
                2: 'Deuxième Trimestre',
                3: 'Troisième Trimestre'
            }
        },
        'MS': { // Moyenne section
            type: 'trimestre',
            options: {
                1: 'Premier Trimestre',
                2: 'Deuxième Trimestre',
                3: 'Troisième Trimestre'
            }
        },
        'GS': { // Grande section
            type: 'trimestre',
            options: {
                1: 'Premier Trimestre',
                2: 'Deuxième Trimestre',
                3: 'Troisième Trimestre'
            }
        },
        'P': { // Primaire
            type: 'trimestre',
            options: {
                1: 'Premier Trimestre',
                2: 'Deuxième Trimestre',
                3: 'Troisième Trimestre'
            }
        },
        'J': { // Collège
            type: 'trimestre',
            options: {
                1: 'Premier Trimestre',
                2: 'Deuxième Trimestre',
                3: 'Troisième Trimestre'
            }
        },
        'S': { // Lycée
            type: 'semestre',
            options: {
                1: 'Premier Semestre',
                2: 'Deuxième Semestre'
            }
        }
    };

    // Fonction pour mettre à jour les options de période
    function updatePeriodOptions() {
        const classTypeSelect = $('#class_type_id');
        const termSelect = $('#term');
        const selectedClassTypeId = classTypeSelect.val();
        
        // Vider les options actuelles
        termSelect.empty().append('<option value=""></option>');
        
        if (selectedClassTypeId) {
            // Trouver le code du type de classe sélectionné
            const classTypeOption = classTypeSelect.find('option:selected');
            const classTypeName = classTypeOption.text();
            
            // Déterminer le code selon le nom
            let classTypeCode = 'C'; // Par défaut
            if (classTypeName.includes('Lycée') || classTypeName.includes('2e cycle')) {
                classTypeCode = 'S';
            } else if (classTypeName.includes('Collège') || classTypeName.includes('1er cycle')) {
                classTypeCode = 'J';
            } else if (classTypeName.includes('Primaire')) {
                classTypeCode = 'P';
            } else if (classTypeName.includes('Grande section')) {
                classTypeCode = 'GS';
            } else if (classTypeName.includes('Moyenne section')) {
                classTypeCode = 'MS';
            } else if (classTypeName.includes('Petite section')) {
                classTypeCode = 'PS';
            }
            
            // Ajouter les options appropriées
            const config = periodConfig[classTypeCode];
            if (config) {
                Object.keys(config.options).forEach(function(key) {
                    termSelect.append(`<option value="${key}">${config.options[key]}</option>`);
                });
            }
        }
    }

    // Écouter les changements sur le select du type de classe
    $('#class_type_id').on('change', updatePeriodOptions);
    
    // Initialiser les options si une valeur est déjà sélectionnée
    if ($('#class_type_id').val()) {
        updatePeriodOptions();
    }
});
</script>
@endsection
