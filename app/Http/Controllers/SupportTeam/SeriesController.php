<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('teamSA');
    }

    public function index()
    {
        $d['series'] = Series::orderBy('name')->get();
        $d['general_series'] = Series::where('type', 'générale')->orderBy('name')->get();
        $d['technical_series'] = Series::where('type', 'technique')->orderBy('name')->get();
        
        return view('pages.support_team.series.index', $d);
    }

    public function create()
    {
        return view('pages.support_team.series.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'code' => 'required|string|max:10|unique:series,code',
            'type' => 'required|in:générale,technique',
            'description' => 'nullable|string',
        ], [
            'name.required' => 'Le nom de la série est requis.',
            'code.required' => 'Le code de la série est requis.',
            'code.unique' => 'Ce code de série existe déjà.',
            'type.required' => 'Le type de série est requis.',
            'type.in' => 'Le type doit être "générale" ou "technique".',
        ]);

        $data = $request->only(['name', 'code', 'type', 'description']);
        $data['active'] = true;

        Series::create($data);

        return redirect()->route('series.index')->with('flash_success', 'Série créée avec succès !');
    }

    public function edit($id)
    {
        $d['serie'] = Series::findOrFail(Qs::decodeHash($id));
        
        return view('pages.support_team.series.edit', $d);
    }

    public function update(Request $request, $id)
    {
        $serie = Series::findOrFail(Qs::decodeHash($id));

        $request->validate([
            'name' => 'required|string|max:100',
            'code' => 'required|string|max:10|unique:series,code,' . $serie->id,
            'type' => 'required|in:générale,technique',
            'description' => 'nullable|string',
            'active' => 'boolean',
        ], [
            'name.required' => 'Le nom de la série est requis.',
            'code.required' => 'Le code de la série est requis.',
            'code.unique' => 'Ce code de série existe déjà.',
            'type.required' => 'Le type de série est requis.',
            'type.in' => 'Le type doit être "générale" ou "technique".',
        ]);

        $data = $request->only(['name', 'code', 'type', 'description', 'active']);
        $data['active'] = $request->has('active');

        $serie->update($data);

        return redirect()->route('series.index')->with('flash_success', 'Série mise à jour avec succès !');
    }

    public function destroy($id)
    {
        $serie = Series::findOrFail(Qs::decodeHash($id));

        // Vérifier si la série est utilisée par des classes complètes
        $classesUsingSeries = $serie->class_sections()->count();
        
        if ($classesUsingSeries > 0) {
            return redirect()->route('series.index')->with('flash_danger', 'Impossible de supprimer cette série car elle est utilisée par ' . $classesUsingSeries . ' classe(s).');
        }

        $serie->delete();

        return redirect()->route('series.index')->with('flash_success', 'Série supprimée avec succès !');
    }

    public function getSeriesByType(Request $request)
    {
        $type = $request->get('type');
        
        if ($type === 'générale') {
            $series = Series::where('type', 'générale')->where('active', true)->orderBy('name')->get();
        } elseif ($type === 'technique') {
            $series = Series::where('type', 'technique')->where('active', true)->orderBy('name')->get();
        } else {
            $series = Series::where('active', true)->orderBy('name')->get();
        }
        
        return response()->json($series);
    }

    public function getClassesBySeries(Request $request)
    {
        $series_id = $request->get('series_id');
        $classes = Series::find($series_id)->class_sections()->with(['section.my_class.class_type'])->get();
        
        return response()->json($classes);
    }
}
