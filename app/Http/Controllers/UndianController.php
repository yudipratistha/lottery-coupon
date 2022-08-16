<?php

namespace App\Http\Controllers;

use App\Models\PeriodeHadiah;
use App\Models\PeriodeKupon;
use App\Models\RiwayatUndian;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UndianController extends Controller
{
    public function undianIndex(){
        return view('undian');
    }

    public function getDataKuponUndian(Request $request){
        $dataPemenangUndian = DB::table('periode_kupon')->select('periode_kupon.id AS periode_id', 'no_rekening', 'nama_nasabah', 'alamat')->join('periode_peserta', 'periode_kupon.id_peserta', '=', 'periode_peserta.id')
            ->where('nomor_kupon', $request->noKupon)->first();
        return response()->json($dataPemenangUndian);
        // dd($dataPemenangUndian);
    }

    public function tolakNomorUndian(Request $request){
        $dataKupon= PeriodeKupon::where('id_periode', $request->periodeId)->where('nomor_kupon', $request->nomorUndian)->where('is_draw', 0)->first();
        
        if(isset($dataKupon)){
            $dataKupon->is_draw = 1;
            $dataKupon->save();
            
            return response()->json('success');
        }else{
            return response()->json(['error' => "Nomor Kupon Sudah Ditukarkan!"], 404);
        }
    }

    public function konfirmasiNomorUndian(Request $request){
        $dataKupon= PeriodeKupon::where('id_periode', $request->periodeId)->where('nomor_kupon', $request->nomorUndian)->where('is_draw', 0)->first();
        $dataPeriodeHadiah= PeriodeHadiah::where('id', $request->periodeHadiahId)->where('id_periode', $request->periodeId)->first();
        
        if(isset($dataKupon) && isset($dataPeriodeHadiah)){
            $dataKupon->is_draw = 1;
            $dataKupon->save();
            
            if($dataPeriodeHadiah->qty_hadiah > $dataPeriodeHadiah->exchanged){
                $dataPeriodeHadiah->exchanged= $dataPeriodeHadiah->exchanged+1;
                $dataPeriodeHadiah->save();
            }else{
                return response()->json('error');
            }

            $dataRiwayatUndian= new RiwayatUndian;
            $dataRiwayatUndian->id_periode = $dataKupon->id_periode;
            $dataRiwayatUndian->id_periode_peserta = $dataKupon->id_peserta;
            $dataRiwayatUndian->id_periode_kupon = $dataKupon->id;
            $dataRiwayatUndian->id_periode_hadiah = $request->periodeHadiahId;
            $dataRiwayatUndian->save();

            return response()->json('success');
        }else{
            return response()->json(['error' => "Nomor Kupon Sudah Ditukarkan!"], 404);
        }
    }
}