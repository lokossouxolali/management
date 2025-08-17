@extends('layouts.master')
@section('page_title', 'Gérer les Classes')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title font-weight-semibold">Gérer les Classes</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">Gérer les Classes</a></li>
                <li class="nav-item"><a href="#new-class" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i> Créer une Nouvelle Classe</a></li>
            </ul>

            <div class="tab-content">
                    <div class="tab-pane fade show active" id="all-classes">
                        <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Nom</th>
                                <th>Type de Classe</th>
                                <th>Série</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($my_classes as $c)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $c->getFullName() }}</td>
                                    <td>{{ $c->class_type->name }}</td>
                                    <td>
                                        @if($c->series)
                                            <span class="badge badge-{{ $c->series->type === 'générale' ? 'primary' : 'success' }}">
                                                {{ $c->series->name }}
                                            </span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-left">
                                                    @if(Qs::userIsTeamSA())
                                                    {{--Edit--}}
                                                    <a href="{{ route('classes.edit', $c->id) }}" class="dropdown-item"><i class="icon-pencil"></i> Modifier</a>
                                                   @endif
                                                        @if(Qs::userIsSuperAdmin())
                                                    {{--Delete--}}
                                                    <a id="{{ $c->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Supprimer</a>
                                                    <form method="post" id="item-delete-{{ $c->id }}" action="{{ route('classes.destroy', $c->id) }}" class="hidden">@csrf @method('delete')</form>
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

                <div class="tab-pane fade" id="new-class">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info border-0 alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>

                                <span>Lorsqu'une classe est créée, une Section sera automatiquement créée pour la classe. Vous pouvez la modifier ou ajouter plus de sections à la classe dans <a target="_blank" href="{{ route('sections.index') }}">Gérer les Sections</a></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <form class="ajax-store" method="post" action="{{ route('classes.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Nom <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input name="name" value="{{ old('name') }}" required type="text" class="form-control" placeholder="Nom de la Classe">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="class_type_id" class="col-lg-3 col-form-label font-weight-semibold">Type de Classe <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required data-placeholder="Sélectionner un type de classe" class="form-control select" name="class_type_id" id="class_type_id">
                                            @foreach($class_types as $ct)
                                                <option {{ old('class_type_id') == $ct->id ? 'selected' : '' }} value="{{ $ct->id }}">{{ $ct->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row" id="series_group" style="display: none;">
                                    <label for="series_id" class="col-lg-3 col-form-label font-weight-semibold">Série</label>
                                    <div class="col-lg-9">
                                        <select data-placeholder="Sélectionner une série" class="form-control select" name="series_id" id="series_id">
                                            <option value=""></option>
                                            @foreach($series as $serie)
                                                <option {{ old('series_id') == $serie->id ? 'selected' : '' }} value="{{ $serie->id }}">{{ $serie->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button id="ajax-btn" type="submit" class="btn btn-primary">Soumettre <i class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Fonction pour afficher/masquer le champ série selon le type de classe
    function toggleSeriesField() {
        const classTypeSelect = $('#class_type_id');
        const seriesGroup = $('#series_group');
        const selectedOption = classTypeSelect.find('option:selected');
        const classTypeName = selectedOption.text();
        
        // Afficher le champ série seulement pour les classes de Lycée
        if (classTypeName.includes('Lycée') || classTypeName.includes('2e cycle')) {
            seriesGroup.show();
        } else {
            seriesGroup.hide();
            $('#series_id').val('').trigger('change');
        }
    }

    // Écouter les changements sur le select du type de classe
    $('#class_type_id').on('change', toggleSeriesField);
    
    // Initialiser l'état du champ série
    toggleSeriesField();
});
</script>
@endsection
