<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\PeriodeHadiah;
use App\Models\PeriodeKupon;
use App\Models\PeriodePeserta;
use App\Models\RiwayatUndian;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use File;
use Box\Spout\Reader\Common\Creator\ReaderFactory;
// use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Writer\Common\Creator\WriterFactory;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;
use Box\Spout\Common\Type;

class RiwayatUndianController extends Controller
{
    public function riwayatUndianIndex(){
        return view('riwayat_undian');
    }

    public function getRiwayatPeriode(Request $request){
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length");

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        // $columnIndex = $columnIndex_arr[0]['column']; 
        // $columnName = $columnName_arr[$columnIndex]['data'];
        // $columnSortOrder = $order_arr[0]['dir'];
        // $searchValue = $search_arr['value'];

        $totalRecords = DB::table('periode')->select('count(*) as allcount')->count();

        // $totalRecordswithFilter  = DB::table('periode')->select('count(*) as allcount')   
        //     ->count();

        $dataRiwayat = DB::table('periode')->select(
                'periode.id as periode_id', 'periode.nama_periode'                
            )     
            ->where('periode.status', 1)
            ->skip($start)
            ->take($rowperpage)
            ->get();
            
        if($dataRiwayat->isEmpty()){
            $response = array(
                "draw" => intval($draw),
                "iTotalRecords" => $totalRecords,
                "iTotalDisplayRecords" => $totalRecords,
                "aaData" => []
            );
            return response()->json($response); 
        }else{
            $response = array(
                "draw" => intval($draw),
                "iTotalRecords" => $totalRecords,
                "iTotalDisplayRecords" => $totalRecords,
                "aaData" => $dataRiwayat
            );
            return response()->json($response); 
        }
    }


    public function riwayatPeriodeDetailIndex($periode_id){
        $namaPeriode = Periode::select('nama_periode')->where('id', $periode_id)->first();
        return view('riwayat_undian_detail', compact('periode_id', 'namaPeriode'));
    }

    public function getRiwayatPeriodeDetail(Request $request){
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length");

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        // $columnIndex = $columnIndex_arr[0]['column']; 
        // $columnName = $columnName_arr[$columnIndex]['data'];
        // $columnSortOrder = $order_arr[0]['dir'];
        // $searchValue = $search_arr['value'];

        $totalRecords = DB::table('riwayat_undian')->select('count(*) as allcount')
            ->leftJoin('periode', 'riwayat_undian.id_periode', '=', 'periode.id')
            ->leftJoin('periode_kupon', 'riwayat_undian.id_periode_kupon', '=', 'periode_kupon.id')
            ->leftJoin('periode_peserta', 'riwayat_undian.id_periode_peserta', '=', 'periode_peserta.id')
            ->leftJoin('periode_hadiah', 'riwayat_undian.id_periode_hadiah', '=', 'periode_hadiah.id')
            ->where('riwayat_undian.id_periode', $request->periode_id)->where('periode.status', 1)
            ->count();

        // $totalRecordswithFilter  = DB::table('riwayat_undian')->select('count(*) as allcount')   
        //     ->count();

        $dataRiwayat = DB::table('riwayat_undian')->select(
                'periode_peserta.no_rekening', 'periode_peserta.nama_nasabah', 'periode_peserta.alamat', 'periode_peserta.produk',
                'periode_kupon.nomor_kupon', 'periode_hadiah.nama_hadiah'                
            )     
            ->leftJoin('periode', 'riwayat_undian.id_periode', '=', 'periode.id')
            ->leftJoin('periode_kupon', 'riwayat_undian.id_periode_kupon', '=', 'periode_kupon.id')
            ->leftJoin('periode_peserta', 'riwayat_undian.id_periode_peserta', '=', 'periode_peserta.id')
            ->leftJoin('periode_hadiah', 'riwayat_undian.id_periode_hadiah', '=', 'periode_hadiah.id')
            ->where('riwayat_undian.id_periode', $request->periode_id)->where('periode.status', 1)
            ->skip($start)
            ->take($rowperpage)
            ->get();
            
        if($dataRiwayat->isEmpty()){
            $response = array(
                "draw" => intval($draw),
                "iTotalRecords" => $totalRecords,
                "iTotalDisplayRecords" => $totalRecords,
                "aaData" => []
            );
            return response()->json($response); 
        }else{
            $response = array(
                "draw" => intval($draw),
                "iTotalRecords" => $totalRecords,
                "iTotalDisplayRecords" => $totalRecords,
                "aaData" => $dataRiwayat
            );
            return response()->json($response); 
        }
    }

    public function exportRiwayatDetail(Request $request){
        $dataRiwayatPeriodeDetail = DB::table('riwayat_undian')->select(
            'periode_peserta.no_rekening', 'periode_peserta.nama_nasabah', 'periode_peserta.alamat', 'periode_peserta.produk',
            'periode_kupon.nomor_kupon', 'periode_hadiah.nama_hadiah'                
        )  
            ->leftJoin('periode', 'riwayat_undian.id_periode', '=', 'periode.id')
            ->leftJoin('periode_kupon', 'riwayat_undian.id_periode_kupon', '=', 'periode_kupon.id')
            ->leftJoin('periode_peserta', 'riwayat_undian.id_periode_peserta', '=', 'periode_peserta.id')
            ->leftJoin('periode_hadiah', 'riwayat_undian.id_periode_hadiah', '=', 'periode_hadiah.id')
            ->where('riwayat_undian.id_periode', $request->periode_id)->where('periode.status', 1)
            ->where('riwayat_undian.id_periode', $request->periode_id)->where('periode.status', 1)
            ->get()->toArray();
        
        $writer = WriterFactory::createFromType(Type::XLSX);

        $filePath = 'file/';
        Storage::disk('public')->makeDirectory($filePath);
        $writer->openToFile(storage_path('app/public/' . $filePath.$request->nama_periode.'.xlsx'));
        $cells1 = [
            WriterEntityFactory::createCell('Periode Undian: '.$request->nama_periode),
        ];
        
        $singleRow1 = WriterEntityFactory::createRow($cells1);
        $writer->addRow($singleRow1);

        $cells2 = [
            WriterEntityFactory::createCell(''),
        ];

        $singleRow2 = WriterEntityFactory::createRow($cells2);
        $writer->addRow($singleRow2);

        $cells = [
            WriterEntityFactory::createCell('Nomor Rekening'),
            WriterEntityFactory::createCell('Nama Nasabah'),
            WriterEntityFactory::createCell('Alamat'),
            WriterEntityFactory::createCell('Produk'),
            WriterEntityFactory::createCell('Nomor Undian'),
            WriterEntityFactory::createCell('Hadiah'),
        ];
        
        $singleRow = WriterEntityFactory::createRow($cells);
        $writer->addRow($singleRow);

        foreach($dataRiwayatPeriodeDetail as $dataRiwayatPeriodeDetailKey => $dataRiwayatPeriodeDetailValue){
            $rowFromValues = WriterEntityFactory::createRowFromArray(array_values((array) $dataRiwayatPeriodeDetailValue));
            $writer->addRow($rowFromValues);
        }

        $writer->close();

        return response()->download(storage_path('app/public/' . $filePath.$request->nama_periode.'.xlsx'));
    }

    public function destroyRiwayatUndian($periode_id){
        RiwayatUndian::where('id_periode', $periode_id)->delete();
        PeriodeHadiah::where('id_periode', $periode_id)->delete();
        PeriodeKupon::where('id_periode', $periode_id)->delete();
        PeriodePeserta::where('id_periode', $periode_id)->delete();
        Periode::where('id', $periode_id)->delete();

        return response()->json('success');
    }
}
