<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    //LISTAR ESTUDIANTES

    public function index()
    {
        $list_users = User::all();
        return response(['users' => $list_users]);
    }

    ///CREAR ESTUDIANTES
    public function store(Request $request)
    {

        $new_users = User::create($request->all());
        $new_users->save();
    }

    ///ACTUALIZAR ESTUDIANTES
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->fill($request->all())->save();
    }

    ///ELIMINAR ESTUDIANTES 

    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
    }
}
