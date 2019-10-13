<?php

namespace App\Http\Controllers\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    //
    public function get(Request $request)
    {
      if($request->has('id'))
      {
        $data = User::findOrFail($request->id);
        return $data;
      }
    }
    public function update(Request $request)
    {
      if($request->has('id'))
        if($request->has('name') && $request->name != "")
        {
          User::find($request->id)->update($request->all());
          return 1;
        }

      return 0;
    }
    public function register(Request $request)
    {
      $id = User::insertGetId([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password)
      ]);
      return $id;
    }
    public function listUser(Request $request)
    {
      $data = User::select('id as key', 'name', 'avata', 'phone', 'email')->get();
      return $data;
    }
}
