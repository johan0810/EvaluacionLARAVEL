<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{

    //LISTAR ESTUDIANTES

    public function index()
    {
        $list_students = Students::all();
        return response(['students' => $list_students]);
    }

    ///CREAR ESTUDIANTES
    public function store(Request $request)
    {

        $new_students = Students::create($request->all());
        $new_students->save();
    }

    ///ACTUALIZAR ESTUDIANTES
    public function update(Request $request, $id)
    {
        $students = Students::find($id);
        $students->fill($request->all())->save();
    }

    ///ELIMINAR ESTUDIANTES 

    public function destroy($id)
    {
        $students = Students::find($id);
        $students->delete();
    }
}
