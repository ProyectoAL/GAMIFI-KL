<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index($mote){
        $sql = "SELECT * FROM users where mote = '$mote'";
        $UniteRanking = DB::select($sql);
        return $UniteRanking;
    }
    public function signup(Request $request)
    {
        $request->validate([
            'mote' => 'required | unique:users',
            'name' => 'required',
            'lastname' => 'required',
            'date',
            'centro',
            'email' => 'required | email | unique:users',
            'password' => 'required',
            'img' => 'image',
            'role',
        ]);

        $user = new User();
        /*if($request->hasFile('img')){
            $file= $request->file('img');
            $destinationpath='img/';
            $filname = time().'-'.$file->getClientOriginalName();
            $uploadsuccess= $request->file('img')->move($destinationpath,$filname);
            $user->img = $destinationpath.$filname;
        }*/
        $user->mote = $request->mote;
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->date = $request->date;
        $user->centro = $request->centro;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->img = $request->img;
        $user->role = $request->role;

        if (!empty($user->date)) {
            $user->role = "Alumno";
        } else {
            $user->role = "Profesor";
        }
        $user->save();
        // Auth::login($user);
        return response()->json([
            "status" => 1,
            'message' => 'Successfully created user!',
            "value" => $user
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
                    "value" => $user,
                    "access_token" => $token
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
    public function userporfolio($id)
    {
        $imagen = User::find($id);
        return response($imagen->contenido)->header('Content-Type', 'image/png');
    }
    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            "password" => "required",
        ]);

        $user_id = $id;
        if (user::where(["id" => $user_id])->exists()) {
            $user_id = user::find($user_id);
            $user_id->password = Hash::make($request->password);
            $user_id->save();
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $user_id
            ]);
        } else {
            return response()->json([
                "status" => 1,
                "message" => "No se pùdo actucalizar",
            ]);
        }
    }
    public function updatePhoto(Request $request, $id)
    {
        $request->validate([
            'img' => 'required'
        ]);

        $user_id = $id;
        if (user::where(["id" => $user_id])->exists()) {
            $user_id = user::find($user_id);
            $user_id->img = $request->img;
            $user_id->save();
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $user_id
            ]);
        } else {
            return response()->json([
                "status" => 1,
                "message" => "No se pùdo actucalizar",
            ]);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            "status" => 1,
            "message" => "cierre de session",
        ]);
    }
}
