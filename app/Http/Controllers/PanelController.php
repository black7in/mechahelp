<?php

namespace App\Http\Controllers;

use App\Models\Assistance;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    //
        /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Asistencias
    public function assistance(){
        return view('panel.assistance');
    }

    public function showAssistance($id){
        $assistance = Assistance::find($id);

        if(! $assistance){
            return abort(404);
        }
        
        return view('panel.show-assistance',compact('id'));
    }

    public function requests($id){
        $assistance = Assistance::find($id);

        if (!$assistance) {
            return abort(404);
        }

        return view('panel.requests', compact('id'));
    }

    public function vehicle()
    {
        return view('panel.vehicle');
    }

    public function profile()
    {
        return view('panel.profile');
    }

    public function paid($id){
        $assistance = Assistance::find($id);

        if (!$assistance) {
            return abort(404);
        }
        return view('panel.paid', compact('id'));
    }

    public function wallet(){
        return view('panel.wallet');
    }


}
