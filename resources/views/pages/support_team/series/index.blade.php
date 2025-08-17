@extends('layouts.master')
@section('page_title', 'Gérer les Séries')

@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title font-weight-semibold">Gérer les Séries du Lycée</h6>
            <div class="header-elements">
                <a href="{{ route('series.create') }}" class="btn btn-primary btn-sm">
                    <i class="icon-plus2 mr-2"></i> Créer une Nouvelle Série
                </a>
            </div>
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-series" class="nav-link active" data-toggle="tab">Toutes les Séries</a></li>
                <li class="nav-item"><a href="#general-series" class="nav-link" data-toggle="tab">Séries Générales</a></li>
                <li class="nav-item"><a href="#technical-series" class="nav-link" data-toggle="tab">Séries Techniques</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-series">
                    <div class="row">
                        @foreach($series as $serie)
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">
                                            <span class="badge badge-{{ $serie->type === 'générale' ? 'primary' : 'success' }} mr-2">
                                                {{ ucfirst($serie->type) }}
                                            </span>
                                            {{ $serie->name }}
                                        </h6>
                                        <div class="header-elements">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{ route('series.edit', $serie->id) }}" class="dropdown-item">
                                                        <i class="icon-pencil"></i> Modifier
                                                    </a>
                                                    @if($serie->active)
                                                        <div class="dropdown-divider"></div>
                                                        <span class="dropdown-item-text text-success">
                                                            <i class="icon-checkmark3"></i> Série active
                                                        </span>
                                                    @else
                                                        <div class="dropdown-divider"></div>
                                                        <span class="dropdown-item-text text-danger">
                                                            <i class="icon-cross2"></i> Série inactive
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{ $serie->description ?: 'Aucune description disponible.' }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="badge badge-info">{{ $serie->code }}</span>
                                            <small class="text-muted">
                                                @if($serie->created_at)
                                                    Créée le {{ $serie->created_at->format('d/m/Y') }}
                                                @else
                                                    Série existante
                                                @endif
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane fade" id="general-series">
                    <div class="row">
                        @foreach($general_series as $serie)
                            <div class="col-md-6 col-lg-4">
                                <div class="card border-primary">
                                    <div class="card-header bg-primary text-white">
                                        <h6 class="card-title mb-0">{{ $serie->name }}</h6>
                                        <div class="header-elements">
                                            <a href="{{ route('series.edit', $serie->id) }}" class="text-white">
                                                <i class="icon-pencil"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{ $serie->description ?: 'Aucune description disponible.' }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="badge badge-primary">{{ $serie->code }}</span>
                                            <small class="text-muted">Série Générale</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane fade" id="technical-series">
                    <div class="row">
                        @foreach($technical_series as $serie)
                            <div class="col-md-6 col-lg-4">
                                <div class="card border-success">
                                    <div class="card-header bg-success text-white">
                                        <h6 class="card-title mb-0">{{ $serie->name }}</h6>
                                        <div class="header-elements">
                                            <a href="{{ route('series.edit', $serie->id) }}" class="text-white">
                                                <i class="icon-pencil"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{ $serie->description ?: 'Aucune description disponible.' }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="badge badge-success">{{ $serie->code }}</span>
                                            <small class="text-muted">Série Technique</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
