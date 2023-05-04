<?php

namespace App\Http\Controllers;

use App\Models\Soft_Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoftSkillsController extends Controller
{
    public function indexsoftskill(){
        $Soft_Skills=Soft_Skills::all();
        return $Soft_Skills;
    }
    public function createsoftskill(Request $request){//Poder crear las medallas de los softskill
        $request->validate([
            'nivel'=>'Required',
            'rango' => 'Required',
            'medalla' => ' image',
            ]);
        $createsoftskill= new Soft_Skills();
        $createsoftskill->nivel=$request->nivel;
        $createsoftskill->rango= $request->rango;
        $createsoftskill->medalla= $request->medalla;
        $createsoftskill->save();
        return response()->json([
            "status" => 1,
            'message' => 'Successfully',
            "value" => $createsoftskill
        ]);
    }
    public function updatesoftskill(Request $request,$id){

        $request->validate([
            'rango' => 'Required',
            'medalla' => 'image',
        ]);

        $user_id = $id;
        if (Soft_Skills::where(["id" => $user_id])->exists()) {
            $createsoftskill = Soft_Skills::find($user_id);
            $createsoftskill->nivel=$request->nivel;
            $createsoftskill->rango= $request->rango;
            $createsoftskill->medalla= $request->medalla;
            $createsoftskill->save();
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $createsoftskill
            ]);
        } else {
            return response()->json([
                "status" => 1,
                "message" => "No se pùdo actucalizar",
            ]);
        }
    }
    public function deletesoftskill(Request $request){
        $deletesoftskill = DB::table('soft__skills')
        ->where('id', '=', $request->id)
        ->delete();
        return response()->json([
            "status" => 0,
            'message' => 'Soft_Skills deleted successfully',
            "value" => $deletesoftskill
        ]);
    }
}
