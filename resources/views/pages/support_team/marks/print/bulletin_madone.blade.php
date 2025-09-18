<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin de Notes - {{ $sr->user->name }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background: white;
            color: #000;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
        }
        
        /* Header Styles */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
            border-bottom: 2px solid #1b0c80;
            padding-bottom: 20px;
        }
        
        .school-info {
            flex: 1;
        }
        
        .school-logo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
        }
        
        .school-name {
            font-size: 24px;
            font-weight: bold;
            color: #1b0c80;
            margin-bottom: 5px;
            font-style: italic;
        }
        
        .school-details {
            font-size: 12px;
            line-height: 1.4;
            color: #333;
        }
        
        .student-photo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #1b0c80;
        }
        
        /* Student Info Table */
        .student-info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        
        .student-info-table td {
            padding: 8px;
            border: 1px solid #ddd;
            font-size: 14px;
        }
        
        .student-info-table .label {
            font-weight: bold;
            background-color: #f5f5f5;
            width: 25%;
        }
        
        /* Main Title */
        .main-title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin: 20px 0;
            color: #1b0c80;
        }
        
        /* Grades Table */
        .grades-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 12px;
        }
        
        .grades-table th,
        .grades-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            vertical-align: middle;
        }
        
        .grades-table th {
            background-color: #1b0c80;
            color: white;
            font-weight: bold;
            font-size: 11px;
        }
        
        .grades-table .subject-name {
            text-align: left;
            font-weight: bold;
            width: 25%;
        }
        
        .grades-table .teacher-name {
            font-size: 10px;
            font-style: italic;
            color: #666;
        }
        
        .grades-table .notes-col {
            width: 8%;
        }
        
        .grades-table .coef-col {
            width: 6%;
        }
        
        .grades-table .rang-col {
            width: 8%;
        }
        
        .grades-table .appreciation-col {
            width: 20%;
            text-align: left;
            font-size: 10px;
        }
        
        /* Section Headers */
        .section-header {
            background-color: #e8e8e8;
            font-weight: bold;
            text-align: center;
        }
        
        /* Summary Rows */
        .summary-row {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        
        .total-row {
            background-color: #d0d0d0;
            font-weight: bold;
        }
        
        /* Footer */
        .footer {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }
        
        .date-location {
            text-align: right;
            font-size: 12px;
        }
        
        .signature-area {
            text-align: center;
            margin-top: 20px;
        }
        
        .signature-stamp {
            width: 120px;
            height: 120px;
            border: 2px solid #1b0c80;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-size: 10px;
            text-align: center;
            line-height: 1.2;
        }
        
        .motto {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            color: #1b0c80;
            margin-top: 20px;
            font-style: italic;
        }
        
        /* Print Styles */
        @media print {
            body {
                margin: 0;
                padding: 10px;
            }
            
            .container {
                max-width: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <div class="school-info">
                <div style="display: flex; align-items: center; margin-bottom: 10px;">
                    <img src="{{ $s['logo'] }}" alt="Logo" class="school-logo">
                    <div>
                        <div class="school-name">{{ strtoupper(Qs::getSetting('system_name')) }}</div>
                        <div class="school-details">
                            PRESCOLAIRE - PRIMAIRE - SECONDAIRE<br>
                            {{ ucwords($s['address'] ?? 'Adresse de l\'école') }}<br>
                            Tél: {{ $s['phone'] ?? '(+228) 22 25 68 06' }}<br>
                            E-mail: {{ $s['email'] ?? 'info@ecole-lamadone.net' }}<br>
                            Site web: {{ $s['website'] ?? 'www.ecole-lamadone.net' }}
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <img src="{{ $sr->user->photo }}" alt="Photo élève" class="student-photo">
            </div>
        </div>

        <!-- Student Information Table -->
        <table class="student-info-table">
            <tr>
                <td class="label">NOM</td>
                <td>{{ strtoupper($sr->user->name) }}</td>
                <td class="label">ANNÉE SCOLAIRE</td>
                <td>{{ $ex->year }}</td>
            </tr>
            <tr>
                <td class="label">PRÉNOMS</td>
                <td>{{ strtoupper($sr->user->name) }}</td>
                <td class="label">CLASSE</td>
                <td>{{ $sr->my_class->name }}</td>
            </tr>
            <tr>
                <td class="label">N° MATRICULE</td>
                <td>{{ $sr->adm_no }}</td>
                <td class="label">EFFECTIF</td>
                <td>-</td>
            </tr>
            <tr>
                <td class="label">DATE NAISSANCE</td>
                <td>{{ $sr->user->dob ? date('d/m/Y', strtotime($sr->user->dob)) : '-' }}</td>
                <td class="label">TITULAIRE</td>
                <td>-</td>
            </tr>
        </table>

        <!-- Main Title -->
        <div class="main-title">
            BULLETIN DE NOTES DU MOIS DE {{ strtoupper(Mk::getSuffix($ex->term)) }} TRIMESTRE
        </div>

        <!-- Grades Table -->
        <table class="grades-table">
            <thead>
                <tr>
                    <th rowspan="2">MATIÈRES DE BASE</th>
                    <th rowspan="2">NOTES {{ strtoupper(Mk::getSuffix($ex->term)) }}</th>
                    <th rowspan="2">NOTES PRÉCÉDENTES</th>
                    <th colspan="2">MOYENNES EXTREMES</th>
                    <th rowspan="2">COEF</th>
                    <th rowspan="2">RANG</th>
                    <th rowspan="2">APPRÉCIATIONS GÉNÉRALES</th>
                </tr>
                <tr>
                    <th>MAX</th>
                    <th>MIN</th>
                </tr>
            </thead>
            <tbody>
                <!-- Matières de Base -->
                <tr class="section-header">
                    <td colspan="8">MATIÈRES DE BASE</td>
                </tr>
                
                @php
                    // Diviser les matières en deux groupes (première moitié = matières de base, seconde moitié = complémentaires)
                    $totalSubjects = $subjects->count();
                    $coreSubjects = $subjects->take(ceil($totalSubjects / 2));
                    $complementarySubjects = $subjects->skip(ceil($totalSubjects / 2));
                    $totalCore = 0;
                    $totalCorePrev = 0;
                    $coreCount = 0;
                @endphp
                
                @foreach($coreSubjects as $sub)
                    @foreach($marks->where('subject_id', $sub->id)->where('exam_id', $ex->id) as $mk)
                        @php
                            $currentMark = $mk->$tex ?? 0;
                            $prevMark = 0; // Pas de données de notes précédentes dans le modèle actuel
                            $totalCore += $currentMark;
                            $totalCorePrev += $prevMark;
                            $coreCount++;
                        @endphp
                        <tr>
                            <td class="subject-name">
                                {{ strtoupper($sub->name) }}
                                <div class="teacher-name">{{ $sub->teacher->name ?? '' }}</div>
                            </td>
                            <td class="notes-col">{{ $currentMark ?: '-' }}</td>
                            <td class="notes-col">{{ $prevMark ?: '-' }}</td>
                            <td class="notes-col">-</td>
                            <td class="notes-col">-</td>
                            <td class="coef-col">1,0</td>
                            <td class="rang-col">{{ $mk->sub_pos ? Mk::getSuffix($mk->sub_pos) : '-' }}</td>
                            <td class="appreciation-col">{{ $mk->grade ? $mk->grade->remark : '-' }}</td>
                        </tr>
                    @endforeach
                @endforeach
                
                <!-- Total Matières de Base -->
                <tr class="summary-row">
                    <td class="subject-name">TOT. MATIÈRES DE BASE</td>
                    <td class="notes-col">{{ number_format($totalCore, 2) }}</td>
                    <td class="notes-col">{{ number_format($totalCorePrev, 2) }}</td>
                    <td class="notes-col">-</td>
                    <td class="notes-col">-</td>
                    <td class="coef-col">-</td>
                    <td class="rang-col">-</td>
                    <td class="appreciation-col">-</td>
                </tr>
                
                <tr class="summary-row">
                    <td class="subject-name">MOY. MATIÈRES DE BASE</td>
                    <td class="notes-col">{{ $coreCount > 0 ? number_format($totalCore / $coreCount, 2) : '-' }}</td>
                    <td class="notes-col">{{ $coreCount > 0 ? number_format($totalCorePrev / $coreCount, 2) : '-' }}</td>
                    <td class="notes-col">-</td>
                    <td class="notes-col">-</td>
                    <td class="coef-col">{{ $coreCount }}</td>
                    <td class="rang-col">{{ $exr->pos ? Mk::getSuffix($exr->pos) : '-' }}</td>
                    <td class="appreciation-col">-</td>
                </tr>

                <!-- Matières Complémentaires -->
                <tr class="section-header">
                    <td colspan="8">MATIÈRES COMPLÉMENTAIRES</td>
                </tr>
                
                @php
                    $totalComplementary = 0;
                    $totalComplementaryPrev = 0;
                    $complementaryCount = 0;
                @endphp
                
                @foreach($complementarySubjects as $sub)
                    @foreach($marks->where('subject_id', $sub->id)->where('exam_id', $ex->id) as $mk)
                        @php
                            $currentMark = $mk->$tex ?? 0;
                            $prevMark = 0; // Pas de données de notes précédentes dans le modèle actuel
                            $totalComplementary += $currentMark;
                            $totalComplementaryPrev += $prevMark;
                            $complementaryCount++;
                        @endphp
                        <tr>
                            <td class="subject-name">
                                {{ strtoupper($sub->name) }}
                                <div class="teacher-name">{{ $sub->teacher->name ?? '' }}</div>
                            </td>
                            <td class="notes-col">{{ $currentMark ?: '-' }}</td>
                            <td class="notes-col">{{ $prevMark ?: '-' }}</td>
                            <td class="notes-col">-</td>
                            <td class="notes-col">-</td>
                            <td class="coef-col">1,0</td>
                            <td class="rang-col">{{ $mk->sub_pos ? Mk::getSuffix($mk->sub_pos) : '-' }}</td>
                            <td class="appreciation-col">{{ $mk->grade ? $mk->grade->remark : '-' }}</td>
                        </tr>
                    @endforeach
                @endforeach

                <!-- Total Général -->
                @php
                    $totalGeneral = $totalCore + $totalComplementary;
                    $totalGeneralPrev = $totalCorePrev + $totalComplementaryPrev;
                    $totalCount = $coreCount + $complementaryCount;
                @endphp
                
                <tr class="total-row">
                    <td class="subject-name">TOTAL GÉNÉRAL</td>
                    <td class="notes-col">{{ number_format($totalGeneral, 2) }}</td>
                    <td class="notes-col">{{ number_format($totalGeneralPrev, 2) }}</td>
                    <td class="notes-col">-</td>
                    <td class="notes-col">-</td>
                    <td class="coef-col">-</td>
                    <td class="rang-col">-</td>
                    <td class="appreciation-col">-</td>
                </tr>
                
                <tr class="total-row">
                    <td class="subject-name">MOYENNE GÉNÉRALE</td>
                    <td class="notes-col">{{ $totalCount > 0 ? number_format($totalGeneral / $totalCount, 2) : '-' }}</td>
                    <td class="notes-col">{{ $totalCount > 0 ? number_format($totalGeneralPrev / $totalCount, 2) : '-' }}</td>
                    <td class="notes-col">-</td>
                    <td class="notes-col">-</td>
                    <td class="coef-col">{{ $totalCount }}</td>
                    <td class="rang-col">{{ $exr->pos ? Mk::getSuffix($exr->pos) : '-' }}</td>
                    <td class="appreciation-col">-</td>
                </tr>
            </tbody>
        </table>

        <!-- Footer -->
        <div class="footer">
            <div class="date-location" style="text-align: right; width: 100%;">
                {{ $s['city'] ?? 'Lomé' }}, le {{ date('d/m/Y') }}
            </div>
        </div>

        <!-- Motto -->
        <div class="motto" style="margin-top: 10px;">
            Devise: {{ $s['motto'] ?? 'SCIENCE & CONSCIENCE' }}
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>
</html>
