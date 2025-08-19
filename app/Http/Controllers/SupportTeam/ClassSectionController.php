<?php

namespace App\Http\Controllers\SupportTeam;

use App\Http\Controllers\Controller;
use App\Models\ClassSection;
use App\Models\ClassType;
use App\Models\MyClass;
use App\Models\Section;
use App\Models\Series;
use Illuminate\Http\Request;
use App\Helpers\Qs;

class ClassSectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('teamSA');
    }

    /**
     * Afficher la liste des classes complètes
     */
    public function index()
    {
        $classTypes = ClassType::getOrderedCategories();
        $classSections = ClassSection::getClassesByCategory();
        
        return view('pages.support_team.class_sections.index', compact('classTypes', 'classSections'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        $classTypes = ClassType::getOrderedCategories();
        $series = Series::getSeriesByDomain();
        
        return view('pages.support_team.class_sections.create', compact('classTypes', 'series'));
    }

    /**
     * Obtenir les classes d'une catégorie (AJAX)
     */
    public function getClasses(Request $request)
    {
        $classTypeId = $request->class_type_id;
        $classes = MyClass::where('class_type_id', $classTypeId)
                         ->where('active', true)
                         ->orderBy('order')
                         ->get();
        
        return response()->json($classes);
    }

    /**
     * Obtenir les sections d'une classe (AJAX)
     */
    public function getSections(Request $request)
    {
        $classId = $request->my_class_id;
        $sections = Section::where('my_class_id', $classId)
                          ->where('active', true)
                          ->orderBy('name')
                          ->get();
        
        return response()->json($sections);
    }

    /**
     * Obtenir les séries disponibles (AJAX)
     */
    public function getSeries(Request $request)
    {
        $series = Series::getSeriesByDomain();
        return response()->json($series);
    }

    /**
     * Créer une nouvelle classe complète
     */
    public function store(Request $request)
    {
        $request->validate([
            'section_id' => 'required|exists:sections,id',
            'series_id' => 'nullable|exists:series,id'
        ]);

        try {
            $section = Section::findOrFail($request->section_id);
            $myClass = $section->my_class;
            
            // Vérifier si la classe nécessite une série
            if ($myClass->requires_series && !$request->series_id) {
                return back()->withErrors(['series_id' => 'Une série est obligatoire pour cette classe.']);
            }
            
            // Vérifier si la combinaison existe déjà
            $existing = ClassSection::where('section_id', $request->section_id)
                                   ->where('series_id', $request->series_id)
                                   ->first();
            
            if ($existing) {
                return back()->withErrors(['section_id' => 'Cette classe existe déjà.']);
            }
            
            // Créer la classe complète
            $classSection = ClassSection::createClassSection($request->section_id, $request->series_id);
            
            return redirect()->route('class-sections.index')
                           ->with('flash_success', 'Classe créée avec succès : ' . $classSection->getFormattedName());
            
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erreur lors de la création : ' . $e->getMessage()]);
        }
    }

    /**
     * Afficher les détails d'une classe
     */
    public function show($id)
    {
        $classSection = ClassSection::with(['section.my_class.class_type', 'series'])
                                   ->findOrFail(Qs::decodeHash($id));
        
        return view('pages.support_team.class_sections.show', compact('classSection'));
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit($id)
    {
        $classSection = ClassSection::with(['section.my_class.class_type', 'series'])
                                   ->findOrFail(Qs::decodeHash($id));
        
        $classTypes = ClassType::getOrderedCategories();
        $myClasses = MyClass::getOrderedClasses();
        $sections = Section::getActiveSections();
        $series = Series::getSeriesByDomain();
        
        return view('pages.support_team.class_sections.edit', compact('classSection', 'classTypes', 'myClasses', 'sections', 'series'));
    }

    /**
     * Mettre à jour une classe complète
     */
    public function update(Request $request, $id)
    {
        $classSection = ClassSection::findOrFail(Qs::decodeHash($id));
        
        $request->validate([
            'description' => 'nullable|string|max:500',
            'active' => 'boolean'
        ]);
        
        $classSection->update([
            'description' => $request->description,
            'active' => $request->has('active')
        ]);
        
        return redirect()->route('class-sections.show', $classSection->id)
                       ->with('flash_success', 'Classe mise à jour avec succès.');
    }

    /**
     * Supprimer une classe complète
     */
    public function destroy($id)
    {
        $classSection = ClassSection::findOrFail(Qs::decodeHash($id));
        
        // Vérifier s'il y a des étudiants dans cette classe
        if ($classSection->getStudentCount() > 0) {
            return back()->withErrors(['error' => 'Impossible de supprimer cette classe car elle contient des étudiants.']);
        }
        
        $classSection->delete();
        
        return redirect()->route('class-sections.index')
                       ->with('flash_success', 'Classe supprimée avec succès.');
    }

    /**
     * Activer/Désactiver une classe
     */
    public function toggleStatus($id)
    {
        $classSection = ClassSection::findOrFail(Qs::decodeHash($id));
        $classSection->active = !$classSection->active;
        $classSection->save();
        
        $status = $classSection->active ? 'activée' : 'désactivée';
        
        return redirect()->route('class-sections.index')
                       ->with('flash_success', 'Classe ' . $status . ' avec succès.');
    }
}
