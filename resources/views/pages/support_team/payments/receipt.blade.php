
<html>
<head>
    <title>Receipt_{{ $pr->ref_no.'_'.$sr->user->name }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/receipt.css') }}"/>
</head>
<body>
<div class="container">
    <div id="print" xmlns:margin-top="http://www.w3.org/1999/xhtml">
        {{--  Détails de l’école --}}
        <table width="100%">
            <tr>
                <td>
                    <strong><span
                                style="color: #1b0c80; font-size: 25px;">{{ strtoupper(Qs::getSetting('system_name')) }}</span></strong><br/>
                    <strong><span
                                style="color: #000; font-size: 15px;"><i>{{ ucwords($s['address']) }}</i></span></strong>
                    <br/> <br/>

                     <span style="color: #000; font-weight: bold; font-size: 25px;"> REÇU DE PAIEMENT</span>
                </td>
            </tr>
        </table>

        {{-- N° de reçu --}}
    <div class="bold arial" style="text-align: center; float:right; width: 200px; padding: 5px; margin-right:30px">
        <div style="padding: 10px 20px; width: 200px; background-color: lightcyan;">
            <span  style="font-size: 16px;">Référence du reçu</span>
        </div>
        <div  style="padding: 10px 20px; width: 200px; background-color: lightyellow;">
            <span  style="font-size: 25px;">{{ $pr->ref_no }}</span>
        </div>
    </div>

        <div style="clear: both"></div>

        {{-- Infos étudiant --}}
        <div style="margin-top:5px; display: block; background-color: rgba(92, 172, 237, 0.12); padding: 5px; ">
            <span style="font-weight:bold; font-size: 20px; color: #000; padding-left: 10px">INFORMATIONS DE L’ÉTUDIANT</span>
        </div>

        {{--Photo--}}
        <div style="margin: 15px;">
            <img style="width: 100px; height: 100px; float: left;" src="{{ $sr->user->photo }}" alt="...">
        </div>

       <div style="float: left; margin-left: 20px">
           <table style="font-size: 16px" class="td-left" cellspacing="5" cellpadding="5">
               <tr>
                   <td class="bold">NOM :</td>
                   <td>{{ $sr->user->name }}</td>
               </tr>
               <tr>
                   <td class="bold">N° MATRICULE :</td>
                   <td>{{ $sr->adm_no }}</td>
               </tr>
               <tr>
                   <td class="bold">CLASSE :</td>
                   <td>{{ $sr->my_class->name }}</td>
               </tr>
           </table>
       </div>
        <div class="clear"></div>

        {{-- Infos paiement --}}
        <div style="margin-top:5px; display: block; background-color: rgba(92, 172, 237, 0.12); padding: 5px; ">
            <span style="font-weight:bold; font-size: 20px; color: #000; padding-left: 10px">INFORMATIONS DE PAIEMENT</span>
        </div>

        <table class="td-left" style="font-size: 16px" cellspacing="2" cellpadding="2">
                <tr>
                    <td class="bold">RÉFÉRENCE :</td>
                    <td>{{ $payment->ref_no }}</td>
                    <td class="bold">TITRE :</td>
                    <td>{{ $payment->title }}</td>
                </tr>
                <tr>
                    <td class="bold">MONTANT :</td>
                    <td>{{ $payment->amount }}</td>
                    <td class="bold">DESCRIPTION :</td>
                    <td>{{ $payment->description }}</td>
                </tr>
            </table>

        {{-- Détails du paiement --}}
        <div style="margin-top:5px; display: block; background-color: rgba(92, 172, 237, 0.12); padding: 5px; ">
            <span style="font-weight:bold; font-size: 20px; color: #000; padding-left: 10px">DÉTAILS DU PAIEMENT</span>
        </div>

        <table class="td-left" style="font-size: 16px" width="100%" cellspacing="2" cellpadding="2">
           <thead>
           <tr>
               <td class="bold">Date</td>
               <td class="bold">Montant payé <del style="text-decoration-style: double">N</del></td>
               <td class="bold">Solde <del style="text-decoration-style: double">N</del></td>
           </tr>
           </thead>
            <tbody>
            @foreach($receipts as $r)
                <tr>
                    <td>{{ date('D\, j F\, Y', strtotime($r->created_at)) }}</td>
                    <td>{{ $r->amt_paid }}</td>
                    <td>{{ $r->balance }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <hr>
        <div class="bold arial" style="text-align: center; float:right; width: 200px; padding: 5px; margin-right:30px">
            <div style="padding: 10px 20px; width: 200px; background-color: lightcyan;">
                <span  style="font-size: 16px;">{{ $pr->paid ? 'STATUT DU PAIEMENT' : 'TOTAL DÛ' }}</span>
            </div>
            <div  style="padding: 10px 20px; width: 200px; background-color: lightyellow;">
                <span  style="font-size: 25px;">{{ $pr->paid ? 'RÉGLÉ' : $pr->balance }}</span>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script>
window.print();
</script>
</body>
</html>
