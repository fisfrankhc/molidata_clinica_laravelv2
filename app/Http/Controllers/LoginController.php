<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Carbon;

class LoginController extends Controller
{
    //
    public function register(Request $request)
    {
        //VALIDAR LOS DATOS
        //...
         $now = Carbon::now();
         $user = new User();
         $user->user_name = $request->user_name;
         $user->user_nombre = $request->user_nombre;
         $user->user_correo = $request->user_correo;
         $user->password = Hash::make($request->password);
         $user->fecha_registro = $now->format('Y-m-d');
         $user->save();

         Auth::login($user);
         return redirect(route('home'));

    }


    public function login(Request $request)
    {
        //Validación
        //...
        $credentials = [
            "user_correo" => $request->user_correo,
            "password" => $request->password
        ];
        //MANTENER INICIADA LA SESION UNA VEZ MARCADA EL CHECK
        $remember = ($request->has('remember') ? true : false);

        if(Auth::attempt($credentials,$remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }else{
            /* return redirect('login'); */
            return "ALGO SALIO MAL";
        }

    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
