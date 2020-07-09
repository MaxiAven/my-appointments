<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Specialty;
use App\Http\Controllers\Controller;

class SpecialtyController extends Controller
{
    //el middleware me dice que todas las ruta que resuelva este controlador 
    //el usuario que ingresa necesita iniciar sesion
    public function __construct()
    {
        //middleware de autenticacion
        $this->middleware('auth');
    }

    public function index()
    {
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));//paso los datos de la variable
    }

    public function create()
    {
        return view('specialties.create');
    }

    private function performValidation(Request $request)
    {
         //valido los datos ingresados en el formulario
         $rules = [
            'name' => 'required|min:3'
        ];
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre.',
            'name.min' => 'Como mínimo el nombre debe tener 3 caracteres.'
        ];

        $this->validate($request, $rules, $messages);
    }

    public function store(Request $request)//el objeto request tiene todo lo del formulario
    {
        //dd($request->all()); funcion para mostrar en pantalla lo que viene del form

       $this->performValidation($request);
        //registro la especialidad
        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();//guardo los datos cargados en el formulario en la bd
        //redirecciono y mando mensaje 
        $notification = 'La especialidad se ha registrado correctamente.';
        return redirect('/specialties')->with(compact('notification'));
    }

    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }

    public function update(Request $request, Specialty $specialty)//el objeto request tiene todo lo del formulario
    {
        //dd($request->all()); funcion para mostrar en pantalla lo que viene del form

        $this->performValidation($request);

        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();//actualizo los datos cargados en el formulario en la bd

        //redirecciono y mando mensaje 
        $notification = 'La especialidad se ha modificado correctamente.';
        return redirect('/specialties')->with(compact('notification'));
    }

    public function destroy(Specialty $specialty)
    {
        $deletedSpecialty = $specialty->name;
        $specialty->delete();

        //redirecciono y mando mensaje 
        $notification = 'La especialidad '.$deletedSpecialty.' se ha eliminado correctamente.';
        return redirect('/specialties')->with(compact('notification'));
    }
}
