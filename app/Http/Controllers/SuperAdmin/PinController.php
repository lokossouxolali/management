<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Helpers\Qs;
use App\Http\Requests\Pin\PinCreate;
use App\Http\Requests\Pin\PinVerify;
use App\Repositories\PinRepo;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PinController extends Controller
{
    protected  $pin, $examIsLocked, $user;

    public function __construct(PinRepo $pin, UserRepo $user)
    {
        $this->pin = $pin;
        $this->user = $user;
        $this->middleware('examIsLocked');
    }

    public function index()
    {
        $d['pin_count'] = $this->pin->countValid();
        $d['valid_pins'] = $this->pin->getValid();
        $d['used_pins'] = $this->pin->getInValid();
        return view('pages.support_team.pins.index', $d);
    }

    public function create()
    {
        if($this->pin->countValid() > 500){
            return redirect()->route('pins.index')->with('flash_danger', __('msg.pin_max'));
        }

        return view('pages.support_team.pins.create');
    }

    public function store(PinCreate $req)
    {
        $num = $req->pin_count;
        $data = [];
        for($i = 0; $i < $num; $i++){
            $code = Str::random(5).'-'.Str::random(5).'-'.Str::random(6);
            $data[] = ['code' => strtoupper($code)];
        }

         $this->pin->create($data);
        return redirect()->route('pins.index')->with('flash_success', __('msg.pin_create'));
    }

    public function destroy()
    {
        $this->pin->deleteUsed();
        return back()->with('flash_success', 'Codes PIN supprimés avec succès');
    }
}
