<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Helpers\Qs;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingUpdate;
use App\Repositories\MyClassRepo;
use App\Repositories\SettingRepo;

class SettingController extends Controller
{
    protected $setting, $my_class;

    public function __construct(SettingRepo $setting, MyClassRepo $my_class)
    {
        $this->setting = $setting;
        $this->my_class = $my_class;
    }

    public function index()
    {
         $s = $this->setting->all();
         $d['class_types'] = $this->my_class->getTypes();
         $d['s'] = $s->flatMap(function($s){
            return [$s->type => $s->description];
        })->toArray();
        
        // S'assurer que toutes les clés nécessaires existent
        $required_keys = [
            'system_name', 'system_title', 'current_session', 'term_ends', 'term_begins',
            'phone', 'address', 'system_email', 'alt_email', 'email_host', 'email_pass',
            'lock_exam', 'logo'
        ];
        
        foreach ($required_keys as $key) {
            if (!isset($d['s'][$key])) {
                $d['s'][$key] = '';
            }
        }
        
        // S'assurer que les clés de frais existent pour tous les types de classes
        foreach ($d['class_types'] as $class_type) {
            $fee_key = 'next_term_fees_' . strtolower($class_type->code);
            if (!isset($d['s'][$fee_key])) {
                $d['s'][$fee_key] = '';
            }
        }
        
        return view('pages.super_admin.settings', $d);
    }

    public function update(SettingUpdate $req)
    {
        $sets = $req->except('_token', '_method', 'logo');
        $sets['lock_exam'] = $sets['lock_exam'] == 1 ? 1 : 0;
        $keys = array_keys($sets);
        $values = array_values($sets);
        for($i=0; $i<count($sets); $i++){
            $this->setting->update($keys[$i], $values[$i]);
        }

        if($req->hasFile('logo')) {
            $logo = $req->file('logo');
            $f = Qs::getFileMetaData($logo);
            $f['name'] = 'logo.' . $f['ext'];
            $f['path'] = $logo->storeAs(Qs::getPublicUploadPath(), $f['name']);
            $logo_path = asset('storage/' . $f['path']);
            $this->setting->update('logo', $logo_path);
        }

        return back()->with('flash_success', __('msg.update_ok'));

    }
}
