<?php

namespace App\Http\Controllers;

use App\Models\Assistance;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        return view("tech.task");
    }


    public function makeReport($id){
        $assistance = Assistance::find($id);

        if (!$assistance) {
            return abort(404);
        }

        return view("tech.make-report", compact("id"));
    }
}
