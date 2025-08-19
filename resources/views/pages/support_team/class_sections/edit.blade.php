@extends('layouts.master')
@section('page_title', 'Modifier la Classe')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Modifier la Classe</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-info">
                        <h6><i class="icon-info"></i> Informations</h6>
                        <p class="mb-0">
                            <strong>Classe actuelle :</strong> {{ $classSection->getFormattedName() }}<br>
                            <strong>Code :</strong> {{ $classSection->code }}<br>
                            <strong>Étudiants :</strong> {{ $classSection->getStudentCount() }}
                        </p>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('class-sections.update', $classSection->id) }}">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label font-weight-semibold">Description</label>
                            <div class="col-lg-8">
                                <textarea name="description" rows="3" class="form-control" placeholder="Description optionnelle de la classe">{{ old('description', $classSection->description) }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label font-weight-semibold">Statut</label>
                            <div class="col-lg-8">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="active" id="active" value="1" {{ old('active', $classSection->active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="active">
                                        Classe active
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <a href="{{ route('class-sections.show', $classSection->id) }}" class="btn btn-secondary">
                        <i class="icon-arrow-left8"></i> Annuler
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="icon-checkmark"></i> Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
