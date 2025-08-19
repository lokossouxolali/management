<?php

namespace App\Models;

use App\User;
use Eloquent;

class ClassSection extends Eloquent
{
    protected $fillable = [
        'section_id',
        'series_id',
        'full_name',
        'code',
        'description',
        'active'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    /**
     * Relation avec la section
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * Relation avec la série (optionnelle)
     */
    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    /**
     * Relation avec les étudiants (via la section)
     */
    public function student_records()
    {
        return $this->section->student_record();
    }

    /**
     * Obtenir le nombre d'étudiants dans cette classe complète
     */
    public function getStudentCount()
    {
        return $this->section->student_record()->count();
    }

    /**
     * Relation avec les matières (via la section)
     */
    public function subjects()
    {
        return $this->section->my_class->subjects();
    }

    /**
     * Obtenir la classe parente
     */
    public function getMyClass()
    {
        return $this->section->my_class;
    }

    /**
     * Obtenir le type de classe
     */
    public function getClassType()
    {
        return $this->section->my_class->class_type;
    }

    /**
     * Obtenir le nom complet formaté
     */
    public function getFormattedName()
    {
        $classType = $this->getClassType();
        $myClass = $this->getMyClass();
        $section = $this->section;
        
        $name = $classType->name . ' → ' . $myClass->name . ' → Section ' . $section->name;
        
        if ($this->series) {
            $name .= ' → ' . $this->series->name;
        }
        
        return $name;
    }

    /**
     * Obtenir le nom court
     */
    public function getShortName()
    {
        $myClass = $this->getMyClass();
        $section = $this->section;
        
        $name = $myClass->name . ' ' . $section->name;
        
        if ($this->series) {
            $name .= ' ' . $this->series->code;
        }
        
        return $name;
    }

    /**
     * Vérifier si c'est une classe de lycée
     */
    public function isLycée()
    {
        return $this->getClassType()->code === 'LYCEE';
    }

    /**
     * Vérifier si la classe nécessite une série
     */
    public function requiresSeries()
    {
        return $this->getMyClass()->requires_series;
    }

    /**
     * Obtenir toutes les classes actives
     */
    public static function getActiveClasses()
    {
        return self::with(['section.my_class.class_type', 'series'])
                   ->where('active', true)
                   ->orderBy('id')
                   ->get();
    }

    /**
     * Obtenir les classes par catégorie
     */
    public static function getClassesByCategory()
    {
        return self::with(['section.my_class.class_type', 'series'])
                   ->where('active', true)
                   ->get()
                   ->groupBy(function($classSection) {
                       return $classSection->getClassType()->id;
                   });
    }

    /**
     * Créer une nouvelle classe complète
     */
    public static function createClassSection($sectionId, $seriesId = null)
    {
        $section = Section::findOrFail($sectionId);
        $myClass = $section->my_class;
        $classType = $myClass->class_type;
        
        // Générer le nom complet
        $fullName = $classType->name . ' → ' . $myClass->name . ' → Section ' . $section->name;
        if ($seriesId) {
            $series = Series::findOrFail($seriesId);
            $fullName .= ' → ' . $series->name;
        }
        
        // Générer le code unique
        $code = $classType->code . '_' . $myClass->name . '_' . $section->name;
        if ($seriesId) {
            $series = Series::findOrFail($seriesId);
            $code .= '_' . $series->code;
        }
        
        return self::create([
            'section_id' => $sectionId,
            'series_id' => $seriesId,
            'full_name' => $fullName,
            'code' => $code,
            'description' => $fullName
        ]);
    }
}
