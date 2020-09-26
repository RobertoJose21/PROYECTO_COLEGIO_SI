<?php

namespace App\Http\Controllers;
use App\User;
use App\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    //
    public function login(Request $request)
    {  $data=request()->validate([
        'name'=>'required',
        'password'=>'required' ],
        [
            'name.required'=>'Ingrese Usuario',
            'password.required'=>'Ingrese Contraseña',

        ]);

        if(Auth::attempt($data))
        {
          $con='OK'  ;
        }
        
        $name=$request->get('name');
        $query=User::where('name','=',$name)->get();
        if($query->count() !=0)
        {
            $hashp=$query[0]->password;
            $password=$request->get('password');
            if(password_verify($password,$hashp))
            {   return view('inicio');
            }
            else
            {   return back()->withErrors(['password'=>'Contraseña no valida'])->withImput([request('password')]);
            }
        }
        else{
            return back()->withErrors(['name'=>'Usuario no Valido'])->withImput([request('name')]);
        }
        
    }


    public function create()
    {
        return view('cuenta');
    }

    public function integrantes()
    {
        return view('integrantes');
    }

    public function store(Request $request)
    {   
        $data=request()->validate([
            'name'=>'required|max:30',
            'password'=>'required|max:30'
        ],[
            'name.required'=>'Ingrese un nombre de usuario',
            'name.max'=>'maximo de 30 caracteres para nombre',
            'password.required'=>'Ingrese una contraseña  ',
            'password.max'=>'maximo de 30 caracteres para contraseña',
        ]);


        if(Auth::attempt($data))
        {
          $con='OK'  ;
        }
        
        $codigo=$request->get('codigo');
        $query=Docente::where('codigo','=',$codigo)->get();
        if($query->count() !=0)
        {
            $usuario= new User();
            $usuario->name=$request->name;
            $usuario->password=$request->password;
            $usuario->estado='1';
            $usuario->save();
            return view('index');
          
        }
        else{
            return back()->withErrors(['codigo'=>'Codigo de Docente no Valido'])->withImput([request('codigo')]);
        }

       
      //  return redirect()->route('/');
    }




}
