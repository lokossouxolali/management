<?php

namespace App\Models;

use App\User;
use Eloquent;

class Subject extends Eloquent
{
    protected $fillable = [
        'name',
        'my_class_id',
        'teacher_id',
        'slug',
        'coefficient',
        'is_core_subject',
        'max_score',
        'description'
    ];

    protected $casts = [
        'coefficient' => 'integer',
        'is_core_subject' => 'boolean',
        'max_score' => 'decimal:2'
    ];

    public function my_class()
    {
        return $this->belongsTo(MyClass::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * Obtenir le score pondéré pour une note brute
     */
    public function getWeightedScore($rawScore)
    {
        return round($rawScore * $this->coefficient, 2);
    }

    /**
     * Obtenir le coefficient formaté
     */
    public function getFormattedCoefficient()
    {
        return number_format($this->coefficient, 2);
    }

    /**
     * Vérifier si c'est une matière principale
     */
    public function isCore()
    {
        return $this->is_core_subject;
    }

    /**
     * Obtenir le nom complet avec classe
     */
    public function getFullName()
    {
        return $this->name . ' (' . ($this->my_class ? $this->my_class->name : 'N/A') . ')';
    }

    /**
     * Obtenir la couleur CSS selon le coefficient
     */
    public function getCoefficientColor()
    {
        if ($this->coefficient >= 6) {
            return 'text-danger font-weight-bold';
        } elseif ($this->coefficient >= 4) {
            return 'text-warning font-weight-semibold';
        } elseif ($this->coefficient >= 3) {
            return 'text-info';
        } else {
            return 'text-muted';
        }
    }

    /**
     * Calculer automatiquement le score maximum basé sur le coefficient
     */
    public function getCalculatedMaxScore()
    {
        return $this->coefficient * 20;
    }

    /**
     * Vérifier si le score maximum est cohérent avec le coefficient
     */
    public function isMaxScoreConsistent()
    {
        return $this->max_score == $this->getCalculatedMaxScore();
    }

    /**
     * Mettre à jour le score maximum selon le coefficient
     */
    public function updateMaxScoreFromCoefficient()
    {
        $this->max_score = $this->getCalculatedMaxScore();
        $this->save();
    }
}
