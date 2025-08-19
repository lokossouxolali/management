<table class="table table-bordered table-responsive text-center">
    <thead>
    <tr>
        <th rowspan="2">S/N</th>
        <th rowspan="2">SUBJECTS</th>
        <th rowspan="2">COEF</th>
        <th rowspan="2">CA1<br>(20)</th>
        <th rowspan="2">CA2<br>(20)</th>
        <th rowspan="2">EXAMS<br>(60)</th>
        <th rowspan="2">TOTAL<br>(100)</th>
        <th rowspan="2">SCORE<br>PONDÉRÉ</th>

        {{--@if($ex->term == 3) --}}{{-- 3rd Term --}}{{--
        <th rowspan="2">TOTAL <br>(100%) 3<sup>RD</sup> TERM</th>
        <th rowspan="2">1<sup>ST</sup> <br> TERM</th>
        <th rowspan="2">2<sup>ND</sup> <br> TERM</th>
        <th rowspan="2">CUM (300%) <br> 1<sup>ST</sup> + 2<sup>ND</sup> + 3<sup>RD</sup></th>
        <th rowspan="2">CUM AVE</th>
        @endif--}}

        <th rowspan="2">GRADE</th>
        <th rowspan="2">SUBJECT <br> POSITION</th>
        <th rowspan="2">REMARKS</th>
    </tr>
    </thead>

    <tbody>
    @foreach($subjects as $sub)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <span class="{{ $sub->getCoefficientColor() }}">
                    {{ $sub->name }}
                    @if($sub->is_core_subject)
                        <span class="badge badge-success">Principal</span>
                    @endif
                </span>
            </td>
            <td>
                <span class="badge badge-{{ $sub->coefficient >= 3 ? 'danger' : ($sub->coefficient >= 2 ? 'warning' : 'info') }}">
                    {{ $sub->getFormattedCoefficient() }}
                </span>
            </td>
            @foreach($marks->where('subject_id', $sub->id)->where('exam_id', $ex->id) as $mk)
                <td>{{ ($mk->t1) ?: '-' }}</td>
                <td>{{ ($mk->t2) ?: '-' }}</td>
                <td>{{ ($mk->exm) ?: '-' }}</td>
                <td>
                    @if($ex->term === 1) {{ ($mk->tex1) }}
                    @elseif ($ex->term === 2) {{ ($mk->tex2) }}
                    @elseif ($ex->term === 3) {{ ($mk->tex3) }}
                    @else {{ '-' }}
                    @endif
                </td>
                <td>
                    @php
                        $tex = 'tex' . $ex->term;
                        $rawScore = $mk->$tex;
                        $weightedScore = $sub->getWeightedScore($rawScore);
                    @endphp
                    <span class="font-weight-bold {{ $sub->getCoefficientColor() }}">
                        {{ $weightedScore > 0 ? number_format($weightedScore, 2) : '-' }}
                    </span>
                </td>

                {{--3rd Term--}}
                {{-- @if($ex->term == 3)
                     <td>{{ $mk->tex3 ?: '-' }}</td>
                     <td>{{ Mk::getSubTotalTerm($student_id, $sub->id, 1, $mk->my_class_id, $year) }}</td>
                     <td>{{ Mk::getSubTotalTerm($student_id, $sub->id, 2, $mk->my_class_id, $year) }}</td>
                     <td>{{ $mk->cum ?: '-' }}</td>
                     <td>{{ $mk->cum_ave ?: '-' }}</td>
                 @endif--}}

                {{--Grade, Subject Position & Remarks--}}
                <td>{{ ($mk->grade) ? $mk->grade->name : '-' }}</td>
                <td>{!! ($mk->grade) ? Mk::getSuffix($mk->sub_pos) : '-' !!}</td>
                <td>{{ ($mk->grade) ? $mk->grade->remark : '-' }}</td>
            @endforeach
        </tr>
    @endforeach
    <tr class="table-info">
        <td colspan="7"><strong>TOTAL SCORES BRUTS: </strong> {{ $exr->total }}</td>
        <td>
            <strong>
                @php
                    $totalWeighted = 0;
                    $totalCoefficients = 0;
                    foreach($marks->where('exam_id', $ex->id) as $mk) {
                        $subject = $subjects->where('id', $mk->subject_id)->first();
                        if ($subject) {
                            $tex = 'tex' . $ex->term;
                            $rawScore = $mk->$tex;
                            if ($rawScore > 0) {
                                $totalWeighted += $subject->getWeightedScore($rawScore);
                                $totalCoefficients += $subject->coefficient;
                            }
                        }
                    }
                @endphp
                {{ number_format($totalWeighted, 2) }}
            </strong>
        </td>
        <td colspan="3">
            <strong>COEF TOTAL: {{ number_format($totalCoefficients, 2) }}</strong>
        </td>
    </tr>
    <tr class="table-success">
        <td colspan="7"><strong>MOYENNE BRUTE: </strong> {{ $exr->ave }}</td>
        <td colspan="4">
            <strong>
                @php
                    $weightedAverage = $totalCoefficients > 0 ? $totalWeighted / $totalCoefficients : 0;
                @endphp
                MOYENNE PONDÉRÉE: {{ number_format($weightedAverage, 2) }}
            </strong>
        </td>
    </tr>
    <tr class="table-warning">
        <td colspan="11">
            <strong>MOYENNE DE CLASSE: </strong> {{ $exr->class_ave }} | 
            <strong>POSITION: </strong> {{ $exr->pos ? Mk::getSuffix($exr->pos) : '-' }}
        </td>
    </tr>
    </tbody>
</table>
