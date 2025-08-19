<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $fillable = [
        'name', 
        'code', 
        'type', 
        'domain', 
        'description', 
        'active', 
        'order'
    ];

    protected $casts = [
        'active' => 'boolean',
        'order' => 'integer'
    ];

    /**
     * Relation avec les classes complètes
     */
    public function class_sections()
    {
        return $this->hasMany(ClassSection::class);
    }

    /**
     * Obtenir toutes les séries actives
     */
    public static function getActiveSeries()
    {
        return self::where('active', true)->orderBy('domain')->orderBy('order')->get();
    }

    /**
     * Obtenir les séries par domaine
     */
    public static function getSeriesByDomain()
    {
        return self::where('active', true)
                   ->orderBy('domain')
                   ->orderBy('order')
                   ->get()
                   ->groupBy('domain');
    }

    /**
     * Obtenir les séries scientifiques
     */
    public static function getScientificSeries()
    {
        return self::where('active', true)
                   ->where('domain', 'Scientifique')
                   ->orderBy('order')
                   ->get();
    }

    /**
     * Obtenir les séries littéraires
     */
    public static function getLiterarySeries()
    {
        return self::where('active', true)
                   ->where('domain', 'Littéraire')
                   ->orderBy('order')
                   ->get();
    }

    /**
     * Obtenir les séries techniques industrielles
     */
    public static function getTechnicalIndustrialSeries()
    {
        return self::where('active', true)
                   ->where('domain', 'Technique Industrielle')
                   ->orderBy('order')
                   ->get();
    }

    /**
     * Obtenir les séries techniques administratives
     */
    public static function getTechnicalAdministrativeSeries()
    {
        return self::where('active', true)
                   ->where('domain', 'Technique Administrative')
                   ->orderBy('order')
                   ->get();
    }

    /**
     * Obtenir le nom complet de la série
     */
    public function getFullName()
    {
        return $this->name . ' (' . $this->code . ')';
    }

    /**
     * Obtenir le nom avec domaine
     */
    public function getFullNameWithDomain()
    {
        return $this->domain . ' → ' . $this->name . ' (' . $this->code . ')';
    }

    /**
     * Vérifier si c'est une série scientifique
     */
    public function isScientific()
    {
        return $this->domain === 'Scientifique';
    }

    /**
     * Vérifier si c'est une série technique
     */
    public function isTechnical()
    {
        return in_array($this->domain, ['Technique Industrielle', 'Technique Administrative']);
    }

    /**
     * Obtenir les séries par type
     */
    public static function getSeriesByType($type)
    {
        return self::where('active', true)
                   ->where('type', $type)
                   ->orderBy('domain')
                   ->orderBy('order')
                   ->get();
    }
}
