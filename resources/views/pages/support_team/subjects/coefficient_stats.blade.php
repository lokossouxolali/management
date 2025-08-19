@extends('layouts.master')
@section('page_title', 'Statistiques des Coefficients')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title font-weight-bold">Statistiques des Coefficients par Classe</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <form method="GET" action="{{ route('coefficients.stats') }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Sélectionner une classe :</label>
                            <select name="class_id" class="form-control" onchange="this.form.submit()">
                                <option value="">-- Choisir une classe --</option>
                                @foreach($my_classes as $class)
                                    <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>
                                        {{ $class->getFullName() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>

            @if($stats)
                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body text-center">
                                <h4>{{ $stats['total_subjects'] }}</h4>
                                <p>Total Matières</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body text-center">
                                <h4>{{ $stats['core_subjects'] }}</h4>
                                <p>Matières Principales</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-info text-white">
                            <div class="card-body text-center">
                                <h4>{{ $stats['total_coefficients'] }}</h4>
                                <p>Total Coefficients</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body text-center">
                                <h4>{{ $stats['average_coefficient'] }}</h4>
                                <p>Moyenne Coefficient</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">Détail des Matières - {{ $selected_class->getFullName() }}</h6>
                                <div class="header-elements">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#bulkUpdateModal">
                                        <i class="icon-pencil"></i> Modifier en Lot
                                    </button>
                                    <form method="POST" action="{{ route('coefficients.reset') }}" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="class_id" value="{{ $selected_class->id }}">
                                        <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Réinitialiser tous les coefficients à 1.00 ?')">
                                            <i class="icon-refresh"></i> Réinitialiser
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Matière</th>
                                            <th>Enseignant</th>
                                            <th>Coefficient</th>
                                            <th>Principal</th>
                                            <th>Score Max</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subjects as $subject)
                                            <tr>
                                                <td>
                                                    <span class="{{ $subject->getCoefficientColor() }}">
                                                        {{ $subject->name }}
                                                    </span>
                                                </td>
                                                <td>{{ $subject->teacher ? $subject->teacher->name : 'Non assigné' }}</td>
                                                <td>
                                                    <span class="badge badge-{{ $subject->coefficient >= 3 ? 'danger' : ($subject->coefficient >= 2 ? 'warning' : 'info') }}">
                                                        {{ $subject->getFormattedCoefficient() }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if($subject->is_core_subject)
                                                        <span class="badge badge-success">Oui</span>
                                                    @else
                                                        <span class="badge badge-secondary">Non</span>
                                                    @endif
                                                </td>
                                                <td>{{ $subject->max_score }}</td>
                                                <td>
                                                    <a href="{{ route('subjects.edit', Qs::hash($subject->id)) }}" class="btn btn-sm btn-primary">
                                                        <i class="icon-pencil"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal pour modification en lot -->
                <div class="modal fade" id="bulkUpdateModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modifier les Coefficients en Lot</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{ route('coefficients.bulk_update') }}" class="ajax-update">
                                @csrf
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Matière</th>
                                                    <th>Coefficient</th>
                                                    <th>Principal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($subjects as $subject)
                                                    <tr>
                                                        <td>{{ $subject->name }}</td>
                                                        <td>
                                                            <input type="number" 
                                                                   name="coefficients[{{ $subject->id }}]" 
                                                                   value="{{ $subject->coefficient }}" 
                                                                   min="0.5" 
                                                                   max="5.0" 
                                                                   step="0.1" 
                                                                   class="form-control form-control-sm">
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" 
                                                                       name="core_subjects[{{ $subject->id }}]" 
                                                                       value="1" 
                                                                       {{ $subject->is_core_subject ? 'checked' : '' }}
                                                                       class="form-check-input">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
