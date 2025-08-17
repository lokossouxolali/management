<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Controllers\Controller;
use App\Repositories\MyClassRepo;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    protected $my_class;

    public function __construct(MyClassRepo $my_class)
    {
        $this->middleware('teamSA');
        $this->my_class = $my_class;
    }

    public function index()
    {
        $d['series'] = $this->my_class->getAllSeries();
        $d['general_series'] = $this->my_class->getGeneralSeries();
        $d['technical_series'] = $this->my_class->getTechnicalSeries();
        
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

        $this->my_class->createSeries($data);

        return redirect()->route('series.index')->with('flash_success', 'Série créée avec succès !');
    }

    public function edit($id)
    {
        $d['serie'] = $this->my_class->findSeries($id);
        
        if (!$d['serie']) {
            return redirect()->route('series.index')->with('flash_danger', 'Série non trouvée.');
        }

        return view('pages.support_team.series.edit', $d);
    }

    public function update(Request $request, $id)
    {
        $serie = $this->my_class->findSeries($id);
        
        if (!$serie) {
            return redirect()->route('series.index')->with('flash_danger', 'Série non trouvée.');
        }

        $request->validate([
            'name' => 'required|string|max:100',
            'code' => 'required|string|max:10|unique:series,code,' . $id,
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

        $this->my_class->updateSeries($id, $data);

        return redirect()->route('series.index')->with('flash_success', 'Série mise à jour avec succès !');
    }

    public function destroy($id)
    {
        $serie = $this->my_class->findSeries($id);
        
        if (!$serie) {
            return redirect()->route('series.index')->with('flash_danger', 'Série non trouvée.');
        }

        // Vérifier si la série est utilisée par des classes
        $classesUsingSeries = $this->my_class->getClassesBySeries($id);
        
        if ($classesUsingSeries->count() > 0) {
            return redirect()->route('series.index')->with('flash_danger', 'Impossible de supprimer cette série car elle est utilisée par ' . $classesUsingSeries->count() . ' classe(s).');
        }

        $this->my_class->deleteSeries($id);

        return redirect()->route('series.index')->with('flash_success', 'Série supprimée avec succès !');
    }

    public function getSeriesByType(Request $request)
    {
        $type = $request->get('type');
        
        if ($type === 'générale') {
            $series = $this->my_class->getGeneralSeries();
        } elseif ($type === 'technique') {
            $series = $this->my_class->getTechnicalSeries();
        } else {
            $series = $this->my_class->getAllSeries();
        }
        
        return response()->json($series);
    }

    public function getClassesBySeries(Request $request)
    {
        $series_id = $request->get('series_id');
        $classes = $this->my_class->getClassesBySeries($series_id);
        
        return response()->json($classes);
    }
}
