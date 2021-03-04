<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Redirect;
use App\Http\Requests\UserRequest; //aqui mando a llamar al request que cree
use Session; //PARA USAR SESSIONES Y MANDAR MENSAJE EN MISMA PANTALLA


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validarRFC(request $request)
    {        
       
        $validator = Validator::make($request->all(), [
            'rfc' => ['required', 'string', 'min:13','unique:users'],  
        ]);
               
        if ($validator->fails()) {           
                return Redirect('register')
                            ->withErrors($validator)
                            ->withInput();
        }else{
            Session::flash('mensaje',"El RFC escrito no se encuenta en nuestros registros de empleados.");        
        return Redirect::to('register')  ;
        }       
    }

    public function activate($code)
    {
        $users = User::where('code',$code);
        $exist = $users->count();
        $user = $users->first();
        if($exist == 1 and $user->active == 0)
        {
            $id = $user->id;
            return view('date_complete',compact('id'));
        }else{
            return redirect::to('/');
        }
    }

    public function complete(UserRequest $request,$id)
    {

        $user = User::find($id);
        $user->password = bcrypt($request->password);  
        $user->active = 1;
        $user->save();
        Session::flash('mensaje',"concluyó con su registro, ya puede acceder al portal."); //PARA ENVIAR MENSAJES EN LA MISMA PANTALLA
        return redirect::to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
