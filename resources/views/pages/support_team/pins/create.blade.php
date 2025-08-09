@extends('layouts.master')
@section('page_title', 'Générer des Codes PIN')
@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title"><i class="icon-alarm mr-2"></i> Générer des Codes PIN</h5>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form method="post" action="{{ route('pins.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="pin_count" class="font-weight-bold col-form-label">Générer des Codes PIN (Entrez le nombre de codes dont vous avez besoin) </label>
                            <input class="form-control form-control-lg" placeholder="Entrez un nombre entre 10 et 500" required name="pin_count" type="text">
                        </div>

                        <div class="text-center mt-2">
                            <button type="submit" class="btn btn-primary btn-lg">Générer <i class="icon-paperplane ml-2"></i></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
