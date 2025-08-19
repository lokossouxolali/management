@extends('layouts.master')
@section('page_title', 'Manage Subjects')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Subjects</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#new-subject" class="nav-link active" data-toggle="tab">Ajouter une Matière</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Manage Subjects</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach($my_classes as $c)
                            <a href="#c{{ $c->id }}" class="dropdown-item" data-toggle="tab">{{ $c->name }}</a>
                        @endforeach
                    </div>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane show  active fade" id="new-subject">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="ajax-store" method="post" action="{{ route('subjects.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Nom <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="name" name="name" value="{{ old('name') }}" required type="text" class="form-control" placeholder="Nom de la matière">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="slug" class="col-lg-3 col-form-label font-weight-semibold">Nom Court <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="slug" required name="slug" value="{{ old('slug') }}" type="text" class="form-control" placeholder="Eg. B.Eng">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Select Class <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required data-placeholder="Sélectionner une classe" class="form-control select" name="my_class_id" id="my_class_id">
                                            <option value=""></option>
                                            @foreach($my_classes as $c)
                                                <option {{ old('my_class_id') == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="teacher_id" class="col-lg-3 col-form-label font-weight-semibold">Teacher <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required data-placeholder="Sélectionner un professeur" class="form-control select-search" name="teacher_id" id="teacher_id">
                                            <option value=""></option>
                                            @foreach($teachers as $t)
                                                <option {{ old('teacher_id') == Qs::hash($t->id) ? 'selected' : '' }} value="{{ Qs::hash($t->id) }}">{{ $t->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="coefficient" class="col-lg-3 col-form-label font-weight-semibold">Coefficient</label>
                                    <div class="col-lg-9">
                                        <input id="coefficient" name="coefficient" value="{{ old('coefficient', 1) }}" type="number" min="1" max="6" step="1" class="form-control" placeholder="1" onchange="updateMaxScore()">
                                        <small class="form-text text-muted">Valeur entre 1 et 6. Défaut: 1</small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="max_score" class="col-lg-3 col-form-label font-weight-semibold">Score Maximum</label>
                                    <div class="col-lg-9">
                                        <input id="max_score" name="max_score" value="{{ old('max_score', 20) }}" type="number" min="10" max="100" step="1" class="form-control" placeholder="20" readonly>
                                        <small class="form-text text-muted">Calculé automatiquement : Coefficient × 20</small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="is_core_subject" class="col-lg-3 col-form-label font-weight-semibold">Matière Principale</label>
                                    <div class="col-lg-9">
                                        <div class="form-check">
                                            <input type="checkbox" name="is_core_subject" value="1" {{ old('is_core_subject') ? 'checked' : '' }} class="form-check-input" id="is_core_subject">
                                            <label class="form-check-label" for="is_core_subject">
                                                Marquer comme matière principale
                                            </label>
                                        </div>
                                        <small class="form-text text-muted">Les matières principales ont généralement un coefficient plus élevé</small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description" class="col-lg-3 col-form-label font-weight-semibold">Description</label>
                                    <div class="col-lg-9">
                                        <textarea id="description" name="description" rows="3" class="form-control" placeholder="Description optionnelle de la matière">{{ old('description') }}</textarea>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Enregistrer <i class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-header">
                                    <h6 class="card-title">Guide des Coefficients</h6>
                                </div>
                                <div class="card-body">
                                    <h6>Recommandations par type de matière :</h6>
                                    <ul class="list-unstyled">
                                        <li><span class="badge badge-danger">6</span> <strong>Matières fondamentales :</strong> Mathématiques, Français, Anglais <small>(Score max: 120)</small></li>
                                        <li><span class="badge badge-warning">4-5</span> <strong>Matières importantes :</strong> Sciences, Histoire, Géographie <small>(Score max: 80-100)</small></li>
                                        <li><span class="badge badge-info">3</span> <strong>Matières moyennes :</strong> Arts, Musique, Informatique <small>(Score max: 60)</small></li>
                                        <li><span class="badge badge-secondary">2</span> <strong>Matières secondaires :</strong> Sport, Dessin <small>(Score max: 40)</small></li>
                                        <li><span class="badge badge-light">1</span> <strong>Matières optionnelles :</strong> Activités extra-scolaires <small>(Score max: 20)</small></li>
                                    </ul>
                                    
                                    <hr>
                                    
                                    <h6>Impact sur les calculs :</h6>
                                    <p class="small">
                                        <strong>Score pondéré = Note brute × Coefficient</strong><br>
                                        <strong>Moyenne pondérée = Σ(Scores pondérés) ÷ Σ(Coefficients)</strong><br>
                                        <strong>Score maximum = Coefficient × 20</strong>
                                    </p>
                                    
                                    <div class="alert alert-info">
                                        <strong>Nouveau système :</strong> Le score maximum est automatiquement calculé selon le coefficient.<br>
                                        <strong>Exemple :</strong> Coefficient 6 = Score max 120, Coefficient 3 = Score max 60
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($my_classes as $c)
                    <div class="tab-pane fade" id="c{{ $c->id }}">                         <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Nom</th>
                                <th>Nom Court</th>
                                <th>Classe</th>
                                <th>Professeur</th>
                                <th>Coefficient</th>
                                <th>Principal</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subjects->where('my_class.id', $c->id) as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <span class="{{ $s->getCoefficientColor() }}">
                                            {{ $s->name }}
                                        </span>
                                    </td>
                                    <td>{{ $s->slug }} </td>
                                    <td>{{ $s->my_class->name }}</td>
                                    <td>{{ $s->teacher->name }}</td>
                                    <td>
                                        <span class="badge badge-{{ $s->coefficient >= 6 ? 'danger' : ($s->coefficient >= 4 ? 'warning' : ($s->coefficient >= 3 ? 'info' : 'secondary')) }}">
                                            {{ $s->getFormattedCoefficient() }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($s->is_core_subject)
                                            <span class="badge badge-success">Oui</span>
                                        @else
                                            <span class="badge badge-secondary">Non</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-left">
                                                    {{--edit--}}
                                                    @if(Qs::userIsTeamSA())
                                                        <a href="{{ route('subjects.edit', $s->id) }}" class="dropdown-item"><i class="icon-pencil"></i> Modifier</a>
                                                    @endif
                                                    {{--Delete--}}
                                                    @if(Qs::userIsSuperAdmin())
                                                        <a id="{{ $s->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Supprimer</a>
                                                        <form method="post" id="item-delete-{{ $s->id }}" action="{{ route('subjects.destroy', $s->id) }}" class="hidden">@csrf @method('delete')</form>
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
                @endforeach

            </div>
        </div>
    </div>

    {{--subject List Ends--}}

@endsection

@section('scripts')
<script>
    function updateMaxScore() {
        const coefficient = parseInt(document.getElementById('coefficient').value) || 1;
        const maxScore = coefficient * 20;
        document.getElementById('max_score').value = maxScore;
    }

    // Initialiser le score maximum au chargement de la page
    document.addEventListener('DOMContentLoaded', function() {
        updateMaxScore();
    });
</script>
@endsection
