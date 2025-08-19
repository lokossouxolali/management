@extends('layouts.master')
@section('page_title', 'Edit Subject - '.$s->name. ' ('.$s->my_class->name.')')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Edit Subject - {{$s->my_class->name }}</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form class="ajax-update" method="post" action="{{ route('subjects.update', $s->id) }}">
                        @csrf @method('PUT')
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Name <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input name="name" value="{{ $s->name }}" required type="text" class="form-control" placeholder="Name of Subject">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Short Name</label>
                            <div class="col-lg-9">
                                <input name="slug" value="{{ $s->slug }}"  type="text" class="form-control" placeholder="Short Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Class <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select required data-placeholder="Sélectionner une classe" class="form-control select" name="my_class_id" id="my_class_id">
                                    @foreach($my_classes as $c)
                                        <option {{ $s->my_class_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="teacher_id" class="col-lg-3 col-form-label font-weight-semibold">Teacher</label>
                            <div class="col-lg-9">
                                <select data-placeholder="Sélectionner un professeur" class="form-control select-search" name="teacher_id" id="teacher_id">
                                    <option value=""></option>
                                    @foreach($teachers as $t)
                                        <option {{ $s->teacher_id == $t->id ? 'selected' : '' }} value="{{ Qs::hash($t->id) }}">{{ $t->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                                    <label for="coefficient" class="col-lg-3 col-form-label font-weight-semibold">Coefficient</label>
                                    <div class="col-lg-9">
                                        <input id="coefficient" name="coefficient" value="{{ old('coefficient', $s->coefficient) }}" type="number" min="1" max="6" step="1" class="form-control" placeholder="1" onchange="updateMaxScore()">
                                        <small class="form-text text-muted">Valeur entre 1 et 6. Défaut: 1</small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="max_score" class="col-lg-3 col-form-label font-weight-semibold">Score Maximum</label>
                                    <div class="col-lg-9">
                                        <input id="max_score" name="max_score" value="{{ old('max_score', $subject->max_score) }}" type="number" min="10" max="100" step="1" class="form-control" placeholder="20" readonly>
                                        <small class="form-text text-muted">Calculé automatiquement : Coefficient × 20</small>
                                    </div>
                                </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Matière Principale</label>
                            <div class="col-lg-9">
                                <div class="form-check">
                                    <input type="checkbox" name="is_core_subject" value="1" {{ $s->is_core_subject ? 'checked' : '' }} class="form-check-input" id="is_core_subject">
                                    <label class="form-check-label" for="is_core_subject">
                                        Marquer comme matière principale
                                    </label>
                                </div>
                                <small class="form-text text-muted">Les matières principales ont généralement un coefficient plus élevé</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Description</label>
                            <div class="col-lg-9">
                                <textarea name="description" rows="3" class="form-control" placeholder="Description optionnelle de la matière">{{ $s->description }}</textarea>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <div class="card bg-light">
                        <div class="card-header">
                            <h6 class="card-title">Aide - Coefficients</h6>
                        </div>
                        <div class="card-body">
                            <h6>Guide des coefficients :</h6>
                            <ul class="list-unstyled">
                                <li><span class="badge badge-danger">6</span> Matières très importantes (Maths, Français)</li>
                                <li><span class="badge badge-warning">4-5</span> Matières importantes (Sciences, Histoire)</li>
                                <li><span class="badge badge-info">3</span> Matières moyennes (Géo, Arts)</li>
                                <li><span class="badge badge-secondary">2</span> Matières secondaires (Sport, Musique)</li>
                                <li><span class="badge badge-light">1</span> Matières optionnelles</li>
                            </ul>
                            
                            <hr>
                            
                            <h6>Impact sur les calculs :</h6>
                            <p class="small">
                                <strong>Score pondéré = Note brute × Coefficient</strong><br>
                                <strong>Moyenne pondérée = Σ(Scores pondérés) ÷ Σ(Coefficients)</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--subject Edit Ends--}}

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
