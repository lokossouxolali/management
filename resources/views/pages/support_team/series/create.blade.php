@extends('layouts.master')
@section('page_title', 'Créer une Nouvelle Série')

@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title font-weight-semibold">Créer une Nouvelle Série</h6>
            <div class="header-elements">
                <a href="{{ route('series.index') }}" class="btn btn-primary btn-sm">
                    <i class="icon-arrow-left8 mr-2"></i> Retour aux Séries
                </a>
            </div>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('series.store') }}">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label font-weight-semibold">Nom de la Série <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input name="name" value="{{ old('name') }}" required type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Ex: Série S - Scientifique">
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label font-weight-semibold">Code <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input name="code" value="{{ old('code') }}" required type="text" class="form-control @error('code') is-invalid @enderror" placeholder="Ex: S, ES, STI2D" maxlength="10">
                                @error('code')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label font-weight-semibold">Type de Série <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select name="type" required class="form-control @error('type') is-invalid @enderror">
                                    <option value="">Sélectionner un type</option>
                                    <option value="générale" {{ old('type') == 'générale' ? 'selected' : '' }}>Générale</option>
                                    <option value="technique" {{ old('type') == 'technique' ? 'selected' : '' }}>Technique</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label font-weight-semibold">Description</label>
                    <div class="col-lg-10">
                        <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Description détaillée de la série...">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info border-0 alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            <h6><i class="icon-info22 mr-2"></i> Informations importantes :</h6>
                            <ul class="mb-0">
                                <li>Le <strong>nom</strong> doit être descriptif (ex: "Série S - Scientifique")</li>
                                <li>Le <strong>code</strong> doit être court et unique (ex: "S", "ES", "STI2D")</li>
                                <li>Le <strong>type</strong> détermine si c'est une série générale ou technique</li>
                                <li>La <strong>description</strong> est optionnelle mais recommandée</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <a href="{{ route('series.index') }}" class="btn btn-secondary mr-2">Annuler</a>
                    <button type="submit" class="btn btn-primary">Créer la Série <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>

@endsection
