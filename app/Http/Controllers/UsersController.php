<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Modelos\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function __construct()
    {
            $this->middleware('isAdmin');   
    }

    
    public function index(){
        
        return view('admin.users.index')->with([
            'users' => User::all()
        ]);
    }

    
    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request){
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'genero' => ['required','in:Hombre,Mujer'],
            'imagen' => ['required','mimes:jpeg,bmp,jpg,png','max:10000']
        ];


        if($request->imagen == null){
            array_pop($rules);
        }

        $request->validate($rules);

        $user = new User;
        $user->name =$request->get('name');
        $user->apellidos = $request->get('lastname');
        $user->email = $request->get('email');
        $user->genero = $request->get('genero');
        $user->password =  Hash::make($request->get('password'));

        if($request->imagen == null){
            if($request->get('genero') == 'Hombre'){
                $user->imagen = 'male.png';
            }else{
                $user->imagen = 'female.png';
            }
        }else{
            $file = $request->imagen;
            $namefile = uniqid();
            $file->move(public_path().'/backend/img/users/',$namefile.".".$file->getClientOriginalExtension());
            $user->imagen  = $namefile.".".$file->getClientOriginalExtension();
        }
        

        $user->save();
        return redirect()->route('users.index');
    }


    public function edit($id){
        return view('admin.users.edit')->with([
            'user' => User::findOrFail($id)
        ]);
    }

    public function update(Request $request,$id){
        $user = User::findOrFail($id);

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'genero' => ['required','in:Hombre,Mujer'],
            'imagen' => ['required','mimes:jpeg,bmp,jpg,png','max:10000'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ];


        if($request->imagen == null){
            unset($rules["imagen"]);
        }

        if($request->password == ""){
            unset($rules["password"]);
         }

        if($request->email == $user->email){
            unset($rules["email"]);
        }

         $request->validate($rules);
        
        if($request->imagen != null)
        {
                
                $image_path = public_path()."/backend/img/users/".$user->imagen;
                if (file_exists($image_path)) 
                {
                    
                    if($user->imagen != 'male.png' && $user->imagen != 'female.png'){
                        unlink($image_path);   
                    }
                        $file = $request->imagen;
                        $namefile = uniqid();
                        $file->move(public_path().'/backend/img/users',$namefile.".".$file->getClientOriginalExtension());
                        $user->imagen  = $namefile.".".$file->getClientOriginalExtension();
                 
                }

        }
        
        $user->name =$request->get('name');
        $user->apellidos = $request->get('lastname');
        $user->email = $request->get('email');
        $user->genero = $request->get('genero');
        
        if($request->password != ''){
            $user->password =  Hash::make($request->get('password'));
        }

        
        $user->update();


        return redirect()->route('users.index');
        
    }

    public function destroy($id){
        $user = User::findOrFail($id);

       if($user->imagen != "male.png" && $user->imagen != "female.png"){
            $image_path = public_path()."/backend/img/users/".$user->imagen;
            if (file_exists($image_path)) 
            {
                unlink($image_path); 
            } 
       }
        
        $user->delete();
        
        return redirect()->route('users.index');
    }
}
