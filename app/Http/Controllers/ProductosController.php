<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Modelos\Producto;
use DB;

class ProductosController extends Controller
{
    
    public function __construct()
    {
            $this->middleware('isAdmin');   
    }

    
    public function index(){

        return view('admin.productos.index')->with([
            'productos' => Producto::all()
        ]);
    }


    public function create(){
        return view('admin.productos.create');
    }

    public function store(Request $request){
        $rules = [
            'nombre' => ['required','max:250'],
            'precio' => ['required','min:0.10','numeric'],
            'imagen' => ['required','mimes:jpeg,bmp,jpg,png','max:10000'],
            'descripcion' => ['required','max:500'],
            'estatus' => ['required','in:Activado,Desactivado'],
            'stock' => ['required','min:1','numeric'],
            'medida' => ['required','numeric','min:1']
        ];


        $request->validate($rules);

        $file = $request->imagen;
        $namefile = uniqid();
        $file->move(public_path().'/backend/img-products',$namefile.".".$file->getClientOriginalExtension());

        $producto = new Producto;
        $producto->nombre =$request->get('nombre');
        $producto->precio = $request->get('precio');
        $producto->unidad_medida = $request->get('unidadmedida');
        $producto->medida = $request->get('medida');
        $producto->imagen = $namefile.".".$file->getClientOriginalExtension();
        $producto->descripcion = $request->get('descripcion');
        $producto->marca = $request->get('marca');
        $producto->estatus = $request->get('estatus');
        $producto->stock = $request->get('stock');
        $timestamp = date('Y-m-d H:i:s');
        $producto->create_at = $timestamp;

        $producto->save();
        return redirect()->route('productos.index');
    }


    public function edit($id){
        return view('admin.productos.edit')->with([
            'producto' => Producto::findOrFail($id)
        ]);
    }

    public function update(Request $request,$id){
        $producto = Producto::findOrFail($id);
        if($request->imagen != null)
        {
            $image_path = public_path()."/backend/img-products/".$producto->imagen;
            if (file_exists($image_path)) 
               {
                unlink($image_path); 
              }

            $file = $request->imagen;
            $namefile = uniqid();
            $file->move(public_path().'/backend/img-products',$namefile.".".$file->getClientOriginalExtension());
            $producto->imagen  = $namefile.".".$file->getClientOriginalExtension();
        }

        $producto->nombre =$request->get('nombre');
        $producto->precio = $request->get('precio');
        $producto->unidad_medida = $request->get('unidadmedida');
        $producto->medida = $request->get('medida');
        $producto->descripcion = $request->get('descripcion');
        $producto->marca = $request->get('marca');
        $producto->estatus = $request->get('estatus');
        $producto->stock = $request->get('stock');
        $timestamp = date('Y-m-d H:i:s');
        $producto->update_at = $timestamp;

        $producto->update();


        return redirect()->route('productos.index');
        
    }

    public function destroy($id){
        $producto = Producto::findOrFail($id);

        $image_path = public_path()."/backend/img-products/".$producto->imagen;
            if (file_exists($image_path)) 
               {
                unlink($image_path); 
              }
              
        
        $producto->delete();
        
        return redirect()->route('productos.index');
    }

}
