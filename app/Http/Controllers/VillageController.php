<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravolt\Indonesia\Models\Village;

class VillageController extends Controller
{
    public function index(){
        $village = Village::all();
        return response()->json([
            'status' => 'success',
            'village' => $village
        ], '200');
    }

    public function show ($id){
        $village = Village::find($id);
        return response()->json([
            'status' => 'success',
            'village' => $village
        ], '200');
    }

    public function store (Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:255',        
            'code' => 'required|max:10|unique:indonesia_villages,code',
            'district_code' => 'required|max:7|exists:indonesia_districts,code',
        ]);


        if ($validate->fails()) {
            return response()->json([
                'status' => 'Errors',
                'messages' => $validate->errors()
            ], 400);
        }

        $village = Village::create(request()->all());

        return response()->json([
            'status' => 'success',
            'village' => $village
        ], '201');
    }

    public function update (Request $request, $id){



        $village = Village::find($id);
        $village->update(request()->all());

        return response()->json([
            'status' => 'success',
            'village' => $village
        ], '200');
    }

    public function destroy ($id){
        $village = Village::find($id);
        $village->delete();
        return response()->json([
            'status' => 'success',
            'village' => $village
        ], '200');
    }   
}
