<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function signup(Request $request)
    {
        $request->validate([
            'mote' => 'required | unique:users',
            'name' => 'required',
            'lastname' => 'required',
            'date' => 'nullable',
            'centro' => 'nullable',
            'email' => 'required | email | unique:users',
            'password' => 'required',
            'img' => 'nullable',
            'role' => 'nullable',
        ]);

        $user = new User();
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $destinationpath = 'img/';
            $filname = time() . '-' . $file->getClientOriginalName();
            $uploadsuccess = $request->file('img')->move($destinationpath, $filname);
            $user->img = $destinationpath . $filname;
        }
        $user->mote = $request->mote;
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->date = $request->date;
        $user->centro = $request->centro;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        //$user->img = $request->img;
        $user->role = $request->role;

        if (!empty($user->date)) {
            $user->role = "Alumno";
        } else {
            $user->role = "Profesor";
        }
        $user->save();
        // Auth::login($user);
        $token = $user->createToken("auth_token")->plainTextToken;
        return response()->json([
            "status" => 1,
            'message' => 'Successfully created user!',
            "value" => $user,
            "access_token" => $token
        ]);
    }
    public function login(Request $request)
    {
        $request->validate([
            "mote" => "required",
            "password" => "required"
        ]);
        $user = user::where("mote", "=", $request->mote)->first();
        if (isset($user->id)) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken("auth_token")->plainTextToken;
                return response()->json([
                    $user,
                    $token
                ]);
            } else {
                return response()->json(
                    "Password_bad"
                );
            }
        } else {
            return response()->json(
                "Username_bad"
            );
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "password" => "required"
        ]);

        $user_id = $id;
        if (user::where(["id" => $user_id])->exists()) {
            $user_id = user::find($user_id);
            $user_id->password = Hash::make($request->password);
            $user_id->save();
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
            ]);
        } else {
            return response()->json([
                "status" => 1,
                "message" => "No se pùdo actucalizar",
            ]);
        }
        /*$user_id = $id;
        if (user::where(["id" => $user_id])->exists()) {
            $update = user::find($user_id);
            $update->password = Hash::make($request->password);
            $update->save();
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
            ]);
        } else {
            return response()->json([
                "status" => 1,
                "message" => "No se pùdo actucalizar",
            ]);
        }*/
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json()([
            "Has cerrado la sesión"
        ]);
    }
}
