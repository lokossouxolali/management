<?php

namespace App\Models;

use Eloquent;

class ClassType extends Eloquent
{
    protected $fillable = ['name', 'code', 'description', 'order', 'active'];

    protected $casts = [
        'active' => 'boolean',
        'order' => 'integer'
    ];

    /**
     * Relation avec les classes
     */
    public function my_classes()
    {
        return $this->hasMany(MyClass::class);
    }

    /**
     * Obtenir toutes les catégories ordonnées
     */
    public static function getOrderedCategories()
    {
        return self::where('active', true)->orderBy('order')->get();
    }

    /**
     * Vérifier si c'est le lycée (pour les séries)
     */
    public function isLycée()
    {
        return $this->code === 'LYCEE';
    }

    /**
     * Obtenir le nom formaté
     */
    public function getFormattedName()
    {
        return $this->name;
    }

    /**
     * Obtenir les classes de cette catégorie
     */
    public function getClasses()
    {
        return $this->my_classes()->where('active', true)->orderBy('order')->get();
    }

    /**
     * Obtenir les classes avec sections
     */
    public function getClassesWithSections()
    {
        return $this->my_classes()
                   ->with(['section' => function($query) {
                       $query->where('active', true);
                   }])
                   ->where('active', true)
                   ->orderBy('order')
                   ->get();
    }
}
