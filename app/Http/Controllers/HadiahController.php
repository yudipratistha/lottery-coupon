<?php

namespace App\Http\Controllers;

use App\Models\PeriodeHadiah;

use Illuminate\Http\Request;

class HadiahController extends Controller
{
    public function getDataHadiah(Request $request){
        $dataHadiah = PeriodeHadiah::whereRaw('id_periode='.$request->periodeId.' && qty_hadiah > exchanged')->first();

        if(isset($dataHadiah)){
            return response()->json($dataHadiah);
        }else{
            $response = array(
                "hadiah_habis" => 'Hadiah Yang Di Undi Sudah Habis!'
            );
            return response()->json($response);
        }
        // dd($dataHadiah->toArray());
        // $response = array(
        //     "arrDataHadiah" => $dataHadiah
        // );

        
    }
}
