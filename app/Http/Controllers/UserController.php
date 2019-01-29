<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function config()
    {
      return view("user.config");
    }

    public function update(Request $request)
    {
      // Conseguir usuario identificado
      $user = \Auth::user();
      $id = $user->id;

      // Validacion del formulario
      $validate = $this->validate($request, [
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'nick' => 'required|string|max:255|unique:users,nick,'.$id,
        'email' => 'required|string|email|max:255|unique:users,email,'.$id
      ]);

      // Recoger datos del formulario
      $email = $request->input('email');
      $name = $request->input('name');
      $surname = $request->input('surname');
      $nick = $request->input('nick');

      // Asignar nuevos valores al objeto del usuario
      $user->email = $email;
      $user->name = $name;
      $user->surname = $surname;
      $user->nick = $nick;

      // Ejecutar consulta y cambios en la BD
      $user->update();

      return redirect()->route("config")->with(['message' => 'Usuario actualizado correctamente']);
    }
}
