<?php

namespace App\Models;

use Eloquent;

class MyClass extends Eloquent
{
    protected $fillable = [
        'name', 
        'class_type_id', 
        'description',
        'order',
        'active',
        'requires_series'
    ];

    protected $casts = [
        'active' => 'boolean',
        'requires_series' => 'boolean',
        'order' => 'integer'
    ];

    public function section()
    {
        return $this->hasMany(Section::class);
    }

    public function class_type()
    {
        return $this->belongsTo(ClassType::class);
    }

    public function student_record()
    {
        return $this->hasMany(StudentRecord::class);
    }

    /**
     * Obtenir le nom complet de la classe
     */
    public function getFullName()
    {
        return $this->class_type->name . ' → ' . $this->name;
    }

    /**
     * Obtenir le nom de la classe avec catégorie
     */
    public function getFullNameWithCategory()
    {
        return $this->class_type->name . ' → ' . $this->name;
    }

    /**
     * Vérifier si la classe est de niveau lycée
     */
    public function isLycée()
    {
        return $this->class_type && $this->class_type->isLycée();
    }

    /**
     * Vérifier si la classe nécessite une série (1ère et Terminale)
     */
    public function requiresSeries()
    {
        return $this->requires_series;
    }

    /**
     * Obtenir les sections actives
     */
    public function getActiveSections()
    {
        return $this->section()->where('active', true)->orderBy('name')->get();
    }

    /**
     * Obtenir toutes les classes ordonnées
     */
    public static function getOrderedClasses()
    {
        return self::with(['class_type'])
                   ->where('active', true)
                   ->orderBy('class_type_id')
                   ->orderBy('order')
                   ->get();
    }

    /**
     * Obtenir les classes par catégorie
     */
    public static function getClassesByCategory()
    {
        return self::with(['class_type'])
                   ->where('active', true)
                   ->get()
                   ->groupBy('class_type_id');
    }

    /**
     * Obtenir les classes qui nécessitent une série
     */
    public static function getClassesRequiringSeries()
    {
        return self::where('requires_series', true)
                   ->where('active', true)
                   ->get();
    }
}
