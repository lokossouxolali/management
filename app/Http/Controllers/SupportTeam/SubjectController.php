<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Requests\Subject\SubjectCreate;
use App\Http\Requests\Subject\SubjectUpdate;
use App\Repositories\MyClassRepo;
use App\Repositories\UserRepo;
use App\Repositories\CoefficientRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    protected $my_class, $user, $coefficient;

    public function __construct(MyClassRepo $my_class, UserRepo $user, CoefficientRepo $coefficient)
    {
        $this->middleware('teamSA', ['except' => ['destroy', 'coefficientStats'] ]);
        $this->middleware('super_admin', ['only' => ['destroy'] ]);

        $this->my_class = $my_class;
        $this->user = $user;
        $this->coefficient = $coefficient;
    }

    public function index()
    {
        $d['my_classes'] = $this->my_class->all();
        $d['teachers'] = $this->user->getUserByType('teacher');
        $d['subjects'] = $this->my_class->getAllSubjects();

        return view('pages.support_team.subjects.index', $d);
    }

    public function store(SubjectCreate $req)
    {
        $data = $req->validated();
        
        // Calculer automatiquement le score maximum basé sur le coefficient
        $data['max_score'] = $data['coefficient'] * 20;
        
        $subject = Subject::create($data);
        return redirect()->route('subjects.index')->with('flash_success', 'Matière créée avec succès');
    }

    public function edit($id)
    {
        $d['s'] = $sub = $this->my_class->findSubject($id);
        $d['my_classes'] = $this->my_class->all();
        $d['teachers'] = $this->user->getUserByType('teacher');

        return is_null($sub) ? Qs::goWithDanger('subjects.index') : view('pages.support_team.subjects.edit', $d);
    }

    public function update(SubjectUpdate $req, $id)
    {
        $subject = Subject::findOrFail(Qs::decodeHash($id));
        $data = $req->validated();
        
        // Calculer automatiquement le score maximum basé sur le coefficient
        $data['max_score'] = $data['coefficient'] * 20;
        
        $subject->update($data);
        return redirect()->route('subjects.index')->with('flash_success', 'Matière mise à jour avec succès');
    }

    public function destroy($id)
    {
        $this->my_class->deleteSubject($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }

    /**
     * NOUVELLE MÉTHODE : Afficher les statistiques des coefficients
     */
    public function coefficientStats(Request $req)
    {
        $class_id = $req->get('class_id');
        
        if (!$class_id) {
            $d['my_classes'] = $this->my_class->all();
            $d['stats'] = null;
            return view('pages.support_team.subjects.coefficient_stats', $d);
        }

        $d['my_classes'] = $this->my_class->all();
        $d['selected_class'] = $this->my_class->find($class_id);
        $d['stats'] = $this->coefficient->getClassCoefficientStats($class_id);
        $d['subjects'] = $this->my_class->findSubjectByClass($class_id);

        return view('pages.support_team.subjects.coefficient_stats', $d);
    }

    /**
     * NOUVELLE MÉTHODE : Mettre à jour les coefficients en lot
     */
    public function bulkUpdateCoefficients(Request $req)
    {
        $data = $req->all();
        
        foreach ($data['coefficients'] as $subject_id => $coefficient) {
            $coefficient = max(0.5, min(5.0, floatval($coefficient)));
            
            $this->my_class->updateSubject($subject_id, [
                'coefficient' => $coefficient,
                'is_core_subject' => isset($data['core_subjects'][$subject_id])
            ]);
        }

        return Qs::jsonUpdateOk();
    }

    /**
     * NOUVELLE MÉTHODE : Réinitialiser les coefficients
     */
    public function resetCoefficients(Request $req)
    {
        $class_id = $req->get('class_id');
        $subjects = $this->my_class->findSubjectByClass($class_id);

        foreach ($subjects as $subject) {
            $this->my_class->updateSubject($subject->id, [
                'coefficient' => 1.00,
                'is_core_subject' => false
            ]);
        }

        return back()->with('flash_success', 'Coefficients réinitialisés avec succès');
    }
}
