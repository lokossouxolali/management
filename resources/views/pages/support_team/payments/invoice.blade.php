@extends('layouts.master')
@section('page_title', 'Gérer les paiements')
@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title font-weight-bold">Gérer les paiements pour {{ $sr->user->name }} </h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="#all-uc" class="nav-link active" data-toggle="tab">Paiements incomplets</a></li>
            <li class="nav-item"><a href="#all-cl" class="nav-link" data-toggle="tab">Paiements complets</a></li>
        </ul>

        <div class="tab-content">
            {{-- Paiements incomplets --}}
            <div class="tab-pane fade show active" id="all-uc">
                <table class="table datatable-button-html5-columns table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Réf. Paiement</th>
                            <th>Frais</th>
                            <th>Payé</th>
                            <th>Solde</th>
                            <th>Paiement</th>
                            <th>N° Reçu</th>
                            <th>Année</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($uncleared as $uc)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $uc->payment->title }}</td>
                            <td>{{ $uc->payment->ref_no }}</td>
                            <td class="font-weight-bold" id="amt-{{ Qs::hash($uc->id) }}" data-amount="{{ $uc->payment->amount }}">{{ $uc->payment->amount }}</td>
                            <td id="amt_paid-{{ Qs::hash($uc->id) }}" data-amount="{{ $uc->amt_paid ?: 0 }}" class="text-blue font-weight-bold">{{ $uc->amt_paid ?: '0.00' }}</td>
                            <td id="bal-{{ Qs::hash($uc->id) }}" class="text-danger font-weight-bold">{{ $uc->balance ?: $uc->payment->amount }}</td>
                            <td>
                                <form id="{{ Qs::hash($uc->id) }}" method="post" class="ajax-pay" action="{{ route('payments.pay_now', Qs::hash($uc->id)) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-7">
                                            <input min="1" max="{{ $uc->balance ?: $uc->payment->amount }}" id="val-{{ Qs::hash($uc->id) }}" class="form-control" required placeholder="Payer maintenant" title="Payer maintenant" name="amt_paid" type="number">
                                        </div>
                                        <div class="col-md-5">
                                            <button data-text="Pay" class="btn btn-danger" type="submit">Payer <i class="icon-paperplane ml-2"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <td>{{ $uc->ref_no }}</td>
                            <td>{{ $uc->year }}</td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                        <div class="dropdown-menu dropdown-menu-left">
                                            <a id="{{ Qs::hash($uc->id) }}" onclick="confirmReset(this.id)" href="#" class="dropdown-item"><i class="icon-reset"></i> Réinitialiser le paiement</a>
                                            <form method="post" id="item-reset-{{ Qs::hash($uc->id) }}" action="{{ route('payments.reset_record', Qs::hash($uc->id)) }}" class="hidden">@csrf @method('delete')</form>
                                            <a target="_blank" href="{{ route('payments.receipts', Qs::hash($uc->id)) }}" class="dropdown-item"><i class="icon-printer"></i> Imprimer le reçu</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Paiements complets --}}
            <div class="tab-pane fade" id="all-cl">
                <table class="table datatable-button-html5-columns table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Réf. Paiement</th>
                            <th>Montant</th>
                            <th>N° Reçu</th>
                            <th>Année</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cleared as $cl)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cl->payment->title }}</td>
                            <td>{{ $cl->payment->ref_no }}</td>
                            <td class="font-weight-bold">{{ $cl->payment->amount }}</td>
                            <td>{{ $cl->ref_no }}</td>
                            <td>{{ $cl->year }}</td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                        <div class="dropdown-menu dropdown-menu-left">
                                            <a id="{{ Qs::hash($cl->id) }}" onclick="confirmReset(this.id)" href="#" class="dropdown-item"><i class="icon-reset"></i> Réinitialiser le paiement</a>
                                            <form method="post" id="item-reset-{{ Qs::hash($cl->id) }}" action="{{ route('payments.reset_record', Qs::hash($cl->id)) }}" class="hidden">@csrf @method('delete')</form>
                                            <a target="_blank" href="{{ route('payments.receipts', Qs::hash($cl->id)) }}" class="dropdown-item"><i class="icon-printer"></i> Imprimer le reçu</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
