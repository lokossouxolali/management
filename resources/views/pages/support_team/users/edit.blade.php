@extends('layouts.master')
@section('page_title', "Modifier l'utilisateur")
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Modifier les informations de l'utilisateur</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-update" action="{{ route('users.update', Qs::hash($user->id)) }}" data-fouc>
                @csrf @method('PUT')
                <h6>Informations Personnelles</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="user_type"> Type d'utilisateur: <span class="text-danger">*</span></label>
                                <select disabled="disabled" class="form-control select" id="user_type">
                                    <option value="">{{ strtoupper($user->user_type) }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nom Complet: <span class="text-danger">*</span></label>
                                <input value="{{ $user->name }}" required type="text" name="name" placeholder="Nom Complet" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Adresse: <span class="text-danger">*</span></label>
                                <input value="{{ $user->address }}" class="form-control" placeholder="Adresse" name="address" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Adresse email: </label>
                                <input value="{{ $user->email }}" type="email" name="email" class="form-control" placeholder="your@email.com">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Fix:</label>
                                <input value="{{ $user->phone }}" type="text" name="phone" class="form-control" placeholder="" >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Telephone:</label>
                                <input value="{{ $user->phone2 }}" type="text" name="phone2" class="form-control" placeholder="" >
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        @if(in_array($user->user_type, Qs::getStaff()))
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date d'embauche:</label>
                                    <input autocomplete="off" name="emp_date" value="{{ $user->staff->first()->emp_date ?? '' }}" type="text" class="form-control date-pick" placeholder="Sélectionner une date...">

                                </div>
                            </div>
                        @endif

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender">Genre: <span class="text-danger">*</span></label>
                                <select class="select form-control" id="gender" name="gender" required data-fouc data-placeholder="Choisir..">
                                    <option value=""></option>
                                    <option {{ ($user->gender == 'Male') ? 'selected' : '' }} value="Male">Homme</option>
                                    <option {{ ($user->gender == 'Female') ? 'selected' : '' }} value="Female">Femme</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nal_id">Nationalité: <span class="text-danger">*</span></label>
                                <select data-placeholder="Choisir..." required name="nal_id" id="nal_id" class="select-search form-control">
                                    <option value=""></option>
                                    @foreach($nationals as $nal)
                                        <option {{ ($user->nal_id == $nal->id) ? 'selected' : '' }} value="{{ $nal->id }}">{{ $nal->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <label for="state_id">État: <span class="text-danger">*</span></label>
                            <select required data-placeholder="Choisir.." class="select-search form-control" name="state_id" id="state_id">
                                <option value=""></option>
                                @foreach($states as $st)
                                    <option {{ ($user->state_id == $st->id ? 'selected' : '') }} value="{{ $st->id }}">{{ $st->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bg_id">Groupe Sanguin: </label>
                                <select class="select form-control" id="bg_id" name="bg_id" data-fouc data-placeholder="Choisir..">
                                    <option value=""></option>
                                    @foreach($blood_groups as $bg)
                                        <option {{ ($user->bg_id == $bg->id ? 'selected' : '') }} value="{{ $bg->id }}">{{ $bg->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    {{--Passport--}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="d-block">Télécharger la photo du passeport:</label>
                                <input value="{{ old('photo') }}" accept="image/*" type="file" name="photo" class="form-input-styled" data-fouc>
                                <span class="form-text text-muted">Images acceptées: jpeg, png. Taille maximale du fichier 2Mo</span>
                            </div>
                        </div>
                    </div>

                </fieldset>



            </form>
        </div>

    </div>
@endsection
