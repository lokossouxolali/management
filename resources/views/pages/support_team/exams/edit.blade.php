@extends('layouts.master')
@section('page_title', 'Modifier l\'Examen - '.$ex->name. ' ('.$ex->year.')')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title font-weight-semibold">Modifier l'Examen</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="{{ route('exams.update', $ex->id) }}">
                        @csrf @method('PUT')
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Nom <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input name="name" value="{{ $ex->name }}" required type="text" class="form-control" placeholder="Nom de l'Examen">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="class_type_id" class="col-lg-3 col-form-label font-weight-semibold">Type de Classe <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select data-placeholder="Sélectionner un type de classe" class="form-control select-search" name="class_type_id" id="class_type_id" required>
                                    <option value=""></option>
                                    @foreach($class_types as $ct)
                                        <option value="{{ $ct->id }}" 
                                            {{ (old('class_type_id', $ex->period_type === 'semestre' ? ($ct->code === 'S' ? $ct->id : '') : ($ct->code !== 'S' ? $ct->id : ''))) == $ct->id ? 'selected' : '' }}>
                                            {{ $ct->name }}
                                        </option>
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
                            <button type="submit" class="btn btn-primary">Enregistrer <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--Class Edit Ends--}}

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
        const currentTerm = {{ $ex->term }}; // Terme actuel de l'examen
        
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
                    const selected = key == currentTerm ? 'selected' : '';
                    termSelect.append(`<option value="${key}" ${selected}>${config.options[key]}</option>`);
                });
            }
        }
    }

    // Écouter les changements sur le select du type de classe
    $('#class_type_id').on('change', updatePeriodOptions);
    
    // Initialiser les options
    updatePeriodOptions();
});
</script>
@endsection
