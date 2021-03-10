<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Filiacione;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Session; //PARA USAR SESSIONES Y MANDAR MENSAJE EN MISMA PANTALLA

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/response';//RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
    //Funcion que genera el código
    function generarCodigo($longitud) {
     $key = '';
     $pattern = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
     $max = strlen($pattern)-1;
     for($i=0;$i < $longitud;$i++) $key .= $pattern[mt_rand(0,$max)];
     return $key;
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [            
            'rfc2' => ['required', 'string', 'min:13'],                                            
            'email' => ['required', 'string', 'email', 'max:255'],           
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
       
       if($data['rfc2']!=null){

        $code = $this->generarCodigo(6);       
        $email = $data['email'];
        $dates = array('name' => $data['name'],'code' => $code);
        $this->Email($dates,$email);

        // ACTUALIZO SU ACTIVACION A 2 EN LA TABLA filiaciones
        Filiacione::where('rfc',$data['rfc2'])->update(['active' => '2']); 

        return User::create([
            'rfc' => strtoupper($data['rfc2']),  //strtoupper convierte a mayusculas la cadena mandada         
            'name' => strtoupper($data['name']),
            'last_name' => strtoupper($data['last_name']),
            'email' => $data['email'],
            'code' => $code,
            //'password' => Hash::make($data['password']),
        ]);

        
        }
    }

    function Email($dates,$email){
        Mail::send('emails.plantilla', $dates, function($message) use ($email){
            $message->subject('Active su cuenta');
            $message->to($email);
            $message->from('rh@insabi.com','RH-INSABI');
        });
    }

}
