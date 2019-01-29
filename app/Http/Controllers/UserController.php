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
      $id = \Auth::user()->id;
      $name = $request->input('name');
      $surname = $request->input('surname');
      $email = $request->input('email');
      $password = $request->input('password');

      var_dump($id);
      var_dump($name);
    }
}
