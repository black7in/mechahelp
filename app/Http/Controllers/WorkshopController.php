<?php

namespace App\Http\Controllers;

use App\Models\Assistance;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('workshop.assistance');
    }

    public function misTecnicos(){
        return view('workshop.tecnicos');
    }

    public function preVisualizarSolicitud($id){
        $assistance = Assistance::find($id);

        if (!$assistance) {
            return abort(404);
        }

        return view('workshop.preview', compact('id'));
    }

    public function show($id)
    {
        $assistance = Assistance::find($id);

        if (!$assistance) {
            return abort(404);
        }

        return view('workshop.show-assistance', compact('id'));
    }

    public function profile()
    {
        return view('workshop.profile');
    }

    public function wallet(){
        return view('workshop.wallet');
    }
}
