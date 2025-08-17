<?php

namespace App\Models;

use Eloquent;

class Exam extends Eloquent
{
    protected $fillable = ['name', 'term', 'year', 'period_type'];

    /**
     * Détermine si une classe utilise les semestres ou les trimestres
     * Les classes de Lycée (code 'S') utilisent les semestres
     * Les autres classes utilisent les trimestres
     */
    public static function getPeriodTypeForClass($class_type_code)
    {
        return $class_type_code === 'S' ? 'semestre' : 'trimestre';
    }

    /**
     * Retourne les options de périodes selon le type de classe
     */
    public static function getPeriodOptions($class_type_code)
    {
        $period_type = self::getPeriodTypeForClass($class_type_code);
        
        if ($period_type === 'semestre') {
            return [
                1 => 'Premier Semestre',
                2 => 'Deuxième Semestre'
            ];
        } else {
            return [
                1 => 'Premier Trimestre',
                2 => 'Deuxième Trimestre',
                3 => 'Troisième Trimestre'
            ];
        }
    }

    /**
     * Retourne le libellé de la période
     */
    public function getPeriodLabel()
    {
        $options = self::getPeriodOptions($this->period_type === 'semestre' ? 'S' : 'J');
        return $options[$this->term] ?? "Période {$this->term}";
    }
}
