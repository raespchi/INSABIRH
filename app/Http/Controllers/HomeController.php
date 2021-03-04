<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; //Me permite llamar a la autenticacion de usuario para saber los datos.
use Illuminate\Http\Request;
use App\Models\Timbrado;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');          
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function home()
    {        
        $rfc = Auth::user()->rfc;
        $registros = Timbrado::where("rfc_t",$rfc)->get();
        return view('home',[
                    'registros' => $registros          
                    ]);         
    }

}
