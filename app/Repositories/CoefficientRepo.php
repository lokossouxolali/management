<?php

namespace App\Repositories;

use App\Models\Mark;
use App\Models\Subject;
use App\Models\Exam;
use Illuminate\Support\Facades\DB;

class CoefficientRepo
{
    /**
     * Calculer le score pondéré d'une matière pour un élève
     */
    public function getSubjectWeightedScore($student_id, $subject_id, $exam_id, $year)
    {
        $mark = Mark::where([
            'student_id' => $student_id,
            'subject_id' => $subject_id,
            'exam_id' => $exam_id,
            'year' => $year
        ])->first();

        if (!$mark) {
            return 0;
        }

        $subject = Subject::find($subject_id);
        if (!$subject) {
            return 0;
        }

        $exam = Exam::find($exam_id);
        $tex = 'tex' . $exam->term;
        $rawScore = $mark->$tex;

        return $subject->getWeightedScore($rawScore);
    }

    /**
     * Calculer le total pondéré d'un élève pour un examen
     */
    public function getStudentWeightedTotal($student_id, $exam_id, $class_id, $year)
    {
        $marks = Mark::where([
            'student_id' => $student_id,
            'exam_id' => $exam_id,
            'my_class_id' => $class_id,
            'year' => $year
        ])->get();

        $total = 0;
        $totalCoefficients = 0;

        foreach ($marks as $mark) {
            $subject = Subject::find($mark->subject_id);
            if ($subject && $subject->coefficient > 0) {
                $exam = Exam::find($exam_id);
                $tex = 'tex' . $exam->term;
                $rawScore = $mark->$tex;
                
                if ($rawScore > 0) {
                    $total += $subject->getWeightedScore($rawScore);
                    $totalCoefficients += $subject->coefficient;
                }
            }
        }

        return [
            'weighted_total' => round($total, 2),
            'total_coefficients' => round($totalCoefficients, 2)
        ];
    }

    /**
     * Calculer la moyenne pondérée d'un élève
     */
    public function getStudentWeightedAverage($student_id, $exam_id, $class_id, $year)
    {
        $result = $this->getStudentWeightedTotal($student_id, $exam_id, $class_id, $year);
        
        if ($result['total_coefficients'] > 0) {
            return round($result['weighted_total'] / $result['total_coefficients'], 2);
        }
        
        return 0;
    }

    /**
     * Calculer la moyenne pondérée de la classe
     */
    public function getClassWeightedAverage($exam_id, $class_id, $year)
    {
        $students = Mark::where([
            'exam_id' => $exam_id,
            'my_class_id' => $class_id,
            'year' => $year
        ])->select('student_id')->distinct()->get();

        if ($students->count() == 0) {
            return 0;
        }

        $totalAverage = 0;
        $validStudents = 0;

        foreach ($students as $student) {
            $avg = $this->getStudentWeightedAverage($student->student_id, $exam_id, $class_id, $year);
            if ($avg > 0) {
                $totalAverage += $avg;
                $validStudents++;
            }
        }

        return $validStudents > 0 ? round($totalAverage / $validStudents, 2) : 0;
    }

    /**
     * Calculer la position pondérée d'un élève
     */
    public function getStudentWeightedPosition($student_id, $exam_id, $class_id, $section_id, $year)
    {
        $students = Mark::where([
            'exam_id' => $exam_id,
            'my_class_id' => $class_id,
            'section_id' => $section_id,
            'year' => $year
        ])->select('student_id')->distinct()->get();

        $studentAverages = [];

        foreach ($students as $student) {
            $avg = $this->getStudentWeightedAverage($student->student_id, $exam_id, $class_id, $year);
            if ($avg > 0) {
                $studentAverages[] = [
                    'student_id' => $student->student_id,
                    'average' => $avg
                ];
            }
        }

        // Trier par moyenne décroissante
        usort($studentAverages, function($a, $b) {
            return $b['average'] <=> $a['average'];
        });

        // Trouver la position
        foreach ($studentAverages as $index => $student) {
            if ($student['student_id'] == $student_id) {
                return $index + 1;
            }
        }

        return null;
    }

    /**
     * Obtenir les statistiques des coefficients pour une classe
     */
    public function getClassCoefficientStats($class_id)
    {
        $subjects = Subject::where('my_class_id', $class_id)->get();
        
        return [
            'total_subjects' => $subjects->count(),
            'core_subjects' => $subjects->where('is_core_subject', true)->count(),
            'total_coefficients' => $subjects->sum('coefficient'),
            'average_coefficient' => round($subjects->avg('coefficient'), 2),
            'max_coefficient' => $subjects->max('coefficient'),
            'min_coefficient' => $subjects->min('coefficient')
        ];
    }

    /**
     * Obtenir le détail des scores pondérés pour un élève
     */
    public function getStudentWeightedDetails($student_id, $exam_id, $class_id, $year)
    {
        $marks = Mark::where([
            'student_id' => $student_id,
            'exam_id' => $exam_id,
            'my_class_id' => $class_id,
            'year' => $year
        ])->with('subject')->get();

        $details = [];
        $totalRaw = 0;
        $totalWeighted = 0;
        $totalCoefficients = 0;

        foreach ($marks as $mark) {
            $subject = $mark->subject;
            $exam = Exam::find($exam_id);
            $tex = 'tex' . $exam->term;
            $rawScore = $mark->$tex;
            $weightedScore = $subject->getWeightedScore($rawScore);

            $details[] = [
                'subject' => $subject->name,
                'coefficient' => $subject->coefficient,
                'raw_score' => $rawScore,
                'weighted_score' => $weightedScore,
                'is_core' => $subject->is_core_subject
            ];

            if ($rawScore > 0) {
                $totalRaw += $rawScore;
                $totalWeighted += $weightedScore;
                $totalCoefficients += $subject->coefficient;
            }
        }

        return [
            'details' => $details,
            'total_raw' => $totalRaw,
            'total_weighted' => $totalWeighted,
            'total_coefficients' => $totalCoefficients,
            'weighted_average' => $totalCoefficients > 0 ? round($totalWeighted / $totalCoefficients, 2) : 0
        ];
    }
}
