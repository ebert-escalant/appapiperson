<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function all(){
        $data = Person::orderBy('created_at', 'desc')->paginate(5);

        return response()->json($data, 200);
    }

    public function insert(Request $request){
        try{
            $person = new Person();

            $person->id = uniqid();
            $person->dni = $request->dni;
            $person->name = $request->name;
            $person->last_name = $request->last_name;
            $person->birthdate = $request->birthdate;
            $person->save();

            return response()->json(["message" => "Operación realizada con éxito"], 200);
        }
        catch(\Exception $e){
            return response()->json(["message" => "Error al realizar la operación", "error" => $e->getMessage()], 500);
        }
    }

    public function getById($id){
        try{
            $person = Person::find($id);

            if(!$person){
                return response()->json(["message" => "No se encontró el registro"], 404);
            }

            return response()->json($person, 200);
        }
        catch(\Exception $e){
            return response()->json(["message" => "Error al realizar la operación", "error" => $e->getMessage()], 500);
        }
    }

    public function edit(Request $request,$id){
        try{
            $person = Person::find($id);

            if(!$person){
                return response()->json(["message" => "No se encontró el registro"], 404);
            }

            $person->dni = $request->dni;
            $person->name = $request->name;
            $person->last_name = $request->last_name;
            $person->birthdate = $request->birthdate;

            $person->save();

            return response()->json(["message" => "Operación realizada con éxito"], 200);
        }
        catch(\Exception $e){
            return response()->json(["message" => "Error al realizar la operación", "error" => $e->getMessage()], 500);
        }
    }

    public function delete($id){
        try{
            $person = Person::find($id);

            if(!$person){
                return response()->json(["message" => "No se encontró el registro"], 404);
            }

            $person->delete();

            return response()->json(["message" => "Operación realizada con éxito"], 200);
        }
        catch(\Exception $e){
            return response()->json(["message" => "Error al realizar la operación", "error" => $e->getMessage()], 500);
        }
    }
}
