<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Requests\Exam\ExamCreate;
use App\Http\Requests\Exam\ExamUpdate;
use App\Repositories\ExamRepo;
use App\Repositories\MyClassRepo;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    protected $exam, $my_class;
    public function __construct(ExamRepo $exam, MyClassRepo $my_class)
    {
        $this->middleware('teamSA', ['except' => ['destroy',] ]);
        $this->middleware('super_admin', ['only' => ['destroy',] ]);

        $this->exam = $exam;
        $this->my_class = $my_class;
    }

    public function index()
    {
        $d['exams'] = $this->exam->all();
        $d['class_types'] = $this->my_class->getTypes();
        return view('pages.support_team.exams.index', $d);
    }

    public function store(ExamCreate $req)
    {
        $data = $req->only(['name', 'term', 'class_type_id']);
        $data['year'] = Qs::getSetting('current_session');
        
        // Déterminer le type de période selon le type de classe
        $class_type = $this->my_class->findType($data['class_type_id']);
        $data['period_type'] = \App\Models\Exam::getPeriodTypeForClass($class_type->code);
        
        // Supprimer class_type_id car il n'est pas dans le modèle Exam
        unset($data['class_type_id']);

        $this->exam->create($data);
        return back()->with('flash_success', __('msg.store_ok'));
    }

    public function edit($id)
    {
        $d['ex'] = $this->exam->find($id);
        $d['class_types'] = $this->my_class->getTypes();
        return view('pages.support_team.exams.edit', $d);
    }

    public function update(ExamUpdate $req, $id)
    {
        $data = $req->only(['name', 'term', 'class_type_id']);
        
        // Déterminer le type de période selon le type de classe
        $class_type = $this->my_class->findType($data['class_type_id']);
        $data['period_type'] = \App\Models\Exam::getPeriodTypeForClass($class_type->code);
        
        // Supprimer class_type_id car il n'est pas dans le modèle Exam
        unset($data['class_type_id']);

        $this->exam->update($id, $data);
        return back()->with('flash_success', __('msg.update_ok'));
    }

    public function destroy($id)
    {
        $this->exam->delete($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }
}
