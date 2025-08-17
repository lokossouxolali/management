<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $fillable = ['name', 'code', 'type', 'description', 'active'];

    /**
     * Relation avec les classes
     */
    public function my_classes()
    {
        return $this->hasMany(MyClass::class);
    }

    /**
     * Obtenir toutes les séries actives
     */
    public static function getActiveSeries()
    {
        return self::where('active', true)->orderBy('type')->orderBy('name')->get();
    }

    /**
     * Obtenir les séries générales
     */
    public static function getGeneralSeries()
    {
        return self::where('active', true)
                   ->where('type', 'générale')
                   ->orderBy('name')
                   ->get();
    }

    /**
     * Obtenir les séries techniques
     */
    public static function getTechnicalSeries()
    {
        return self::where('active', true)
                   ->where('type', 'technique')
                   ->orderBy('name')
                   ->get();
    }

    /**
     * Obtenir le nom complet de la série
     */
    public function getFullName()
    {
        return $this->name . ' (' . $this->code . ')';
    }
}
