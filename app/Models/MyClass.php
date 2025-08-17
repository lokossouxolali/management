<?php

namespace App\Models;

use Eloquent;

class MyClass extends Eloquent
{
    protected $fillable = ['name', 'class_type_id', 'series_id'];

    public function section()
    {
        return $this->hasMany(Section::class);
    }

    public function class_type()
    {
        return $this->belongsTo(ClassType::class);
    }

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function student_record()
    {
        return $this->hasMany(StudentRecord::class);
    }

    /**
     * Obtenir le nom complet de la classe avec série
     */
    public function getFullName()
    {
        $name = $this->name;
        if ($this->series) {
            $name .= ' - ' . $this->series->name;
        }
        return $name;
    }

    /**
     * Vérifier si la classe est de niveau lycée
     */
    public function isLycée()
    {
        return $this->class_type && $this->class_type->code === 'S';
    }
}
