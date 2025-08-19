<?php

namespace App\Models;

use App\User;
use Eloquent;

class Section extends Eloquent
{
    protected $fillable = [
        'name', 
        'my_class_id', 
        'teacher_id',
        'description',
        'active'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function my_class()
    {
        return $this->belongsTo(MyClass::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function student_record()
    {
        return $this->hasMany(StudentRecord::class);
    }

    public function class_sections()
    {
        return $this->hasMany(ClassSection::class);
    }

    /**
     * Obtenir le nom complet de la section
     */
    public function getFullName()
    {
        return $this->my_class->name . ' → Section ' . $this->name;
    }

    /**
     * Obtenir le nom avec catégorie
     */
    public function getFullNameWithCategory()
    {
        return $this->my_class->class_type->name . ' → ' . $this->my_class->name . ' → Section ' . $this->name;
    }

    /**
     * Vérifier si la section nécessite une série
     */
    public function requiresSeries()
    {
        return $this->my_class->requires_series;
    }

    /**
     * Obtenir les classes complètes de cette section
     */
    public function getClassSections()
    {
        return $this->class_sections()->where('active', true)->get();
    }
}
