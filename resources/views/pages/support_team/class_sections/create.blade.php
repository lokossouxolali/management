@extends('layouts.master')
@section('page_title', 'Créer une Nouvelle Classe')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Créer une Nouvelle Classe</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('class-sections.store') }}" id="create-class-form">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="class_type_id" class="col-lg-4 col-form-label font-weight-semibold">Catégorie <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select required id="class_type_id" name="class_type_id" class="form-control select" onchange="loadClasses()">
                                    <option value="">Sélectionner une catégorie</option>
                                    @foreach($classTypes as $classType)
                                        <option value="{{ $classType->id }}">{{ $classType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="my_class_id" class="col-lg-4 col-form-label font-weight-semibold">Classe <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select required id="my_class_id" name="my_class_id" class="form-control select" onchange="loadSections()" disabled>
                                    <option value="">Sélectionner une classe</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="section_id" class="col-lg-4 col-form-label font-weight-semibold">Section <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select required id="section_id" name="section_id" class="form-control select" onchange="checkSeriesRequirement()" disabled>
                                    <option value="">Sélectionner une section</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" id="series-group" style="display: none;">
                            <label for="series_id" class="col-lg-4 col-form-label font-weight-semibold">Série <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select id="series_id" name="series_id" class="form-control select">
                                    <option value="">Sélectionner une série</option>
                                </select>
                                <small class="form-text text-muted">Obligatoire pour 1ère et Terminale</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-light">
                            <div class="card-header">
                                <h6 class="card-title">Aperçu de la Classe</h6>
                            </div>
                            <div class="card-body">
                                <div id="class-preview">
                                    <p class="text-muted">Sélectionnez une catégorie, classe et section pour voir l'aperçu.</p>
                                </div>
                            </div>
                        </div>

                        <div class="card bg-info mt-3">
                            <div class="card-header">
                                <h6 class="card-title text-white">Guide</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-white">Structure des Classes :</h6>
                                <ul class="text-white">
                                    <li><strong>Jardin d'enfant :</strong> 1ère Crèche, 2ème Crèche</li>
                                    <li><strong>Primaire :</strong> CI, CP1, CP2, CE1, CE2, CM1, CM2</li>
                                    <li><strong>Collège :</strong> 6ème, 5ème, 4ème, 3ème</li>
                                    <li><strong>Lycée :</strong> Seconde, Première, Terminale</li>
                                </ul>
                                
                                <h6 class="text-white mt-3">Séries du Lycée :</h6>
                                <ul class="text-white">
                                    <li><strong>Scientifiques :</strong> C, D</li>
                                    <li><strong>Littéraires :</strong> A4</li>
                                    <li><strong>Techniques :</strong> F1, F2, F3, F4, G1, G2, G3</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <a href="{{ route('class-sections.index') }}" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-primary">Créer la Classe <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    function loadClasses() {
        const classTypeId = document.getElementById('class_type_id').value;
        const classSelect = document.getElementById('my_class_id');
        const sectionSelect = document.getElementById('section_id');
        
        // Réinitialiser les sélections
        classSelect.innerHTML = '<option value="">Sélectionner une classe</option>';
        sectionSelect.innerHTML = '<option value="">Sélectionner une section</option>';
        classSelect.disabled = true;
        sectionSelect.disabled = true;
        
        if (!classTypeId) {
            updatePreview();
            return;
        }
        
        // Charger les classes
        fetch(`{{ url('ajax/get_classes') }}/${classTypeId}`)
            .then(response => response.json())
            .then(classes => {
                classes.forEach(classItem => {
                    const option = document.createElement('option');
                    option.value = classItem.id;
                    option.textContent = classItem.name;
                    classSelect.appendChild(option);
                });
                classSelect.disabled = false;
                updatePreview();
            });
    }
    
    function loadSections() {
        const classId = document.getElementById('my_class_id').value;
        const sectionSelect = document.getElementById('section_id');
        
        // Réinitialiser les sections
        sectionSelect.innerHTML = '<option value="">Sélectionner une section</option>';
        sectionSelect.disabled = true;
        
        if (!classId) {
            updatePreview();
            return;
        }
        
        // Charger les sections
        fetch(`{{ url('ajax/get_sections') }}/${classId}`)
            .then(response => response.json())
            .then(sections => {
                sections.forEach(section => {
                    const option = document.createElement('option');
                    option.value = section.id;
                    option.textContent = 'Section ' + section.name;
                    sectionSelect.appendChild(option);
                });
                sectionSelect.disabled = false;
                updatePreview();
            });
    }
    
    function checkSeriesRequirement() {
        const classId = document.getElementById('my_class_id').value;
        const seriesGroup = document.getElementById('series-group');
        const seriesSelect = document.getElementById('series_id');
        
        if (!classId) {
            seriesGroup.style.display = 'none';
            updatePreview();
            return;
        }
        
        // Vérifier si la classe nécessite une série
        fetch(`{{ url('ajax/get_classes') }}/${document.getElementById('class_type_id').value}`)
            .then(response => response.json())
            .then(classes => {
                const selectedClass = classes.find(c => c.id == classId);
                if (selectedClass && selectedClass.requires_series) {
                    seriesGroup.style.display = 'block';
                    loadSeries();
                } else {
                    seriesGroup.style.display = 'none';
                }
                updatePreview();
            });
    }
    
    function loadSeries() {
        const seriesSelect = document.getElementById('series_id');
        seriesSelect.innerHTML = '<option value="">Sélectionner une série</option>';
        
        fetch('{{ url("ajax/get_series") }}')
            .then(response => response.json())
            .then(seriesData => {
                Object.keys(seriesData).forEach(domain => {
                    const optgroup = document.createElement('optgroup');
                    optgroup.label = domain;
                    
                    seriesData[domain].forEach(series => {
                        const option = document.createElement('option');
                        option.value = series.id;
                        option.textContent = series.name + ' (' + series.code + ')';
                        optgroup.appendChild(option);
                    });
                    
                    seriesSelect.appendChild(optgroup);
                });
            });
    }
    
    function updatePreview() {
        const preview = document.getElementById('class-preview');
        const classType = document.getElementById('class_type_id');
        const myClass = document.getElementById('my_class_id');
        const section = document.getElementById('section_id');
        const series = document.getElementById('series_id');
        
        let previewText = '';
        
        if (classType.value) {
            const classTypeText = classType.options[classType.selectedIndex].text;
            previewText += '<strong>' + classTypeText + '</strong>';
            
            if (myClass.value) {
                const myClassText = myClass.options[myClass.selectedIndex].text;
                previewText += ' → <strong>' + myClassText + '</strong>';
                
                if (section.value) {
                    const sectionText = section.options[section.selectedIndex].text;
                    previewText += ' → <strong>' + sectionText + '</strong>';
                    
                    if (series.value && series.style.display !== 'none') {
                        const seriesText = series.options[series.selectedIndex].text;
                        previewText += ' → <strong>' + seriesText + '</strong>';
                    }
                }
            }
        }
        
        if (previewText) {
            preview.innerHTML = '<h5 class="text-primary">' + previewText + '</h5>';
        } else {
            preview.innerHTML = '<p class="text-muted">Sélectionnez une catégorie, classe et section pour voir l\'aperçu.</p>';
        }
    }
    
    // Initialiser l'aperçu
    document.addEventListener('DOMContentLoaded', function() {
        updatePreview();
    });
</script>
@endsection
