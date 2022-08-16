<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\PeriodePeserta;
use App\Models\PeriodeHadiah;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use File;
use Box\Spout\Reader\Common\Creator\ReaderFactory;
// use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

class PeriodeController extends Controller
{
    public function periodeIndex(){
        return view('input_periode_undian');
    }

    public function storeDataPeriode(Request $request){
        ini_set('memory_limit','256M');
        $this->validate($request,[
            'nama_periode' => 'required',
            'excelFile' => 'required',
            'hadiah.*' => 'required',
            'qty_hadiah.*' => 'required',
        ]);
        
        try{
            $tableHeaderArr = array();
            $tableHeaderJmlPointArr = array();
            $tableColumnDataArr = array();
            
            $hadiahDataArr = array();
            $i= 0;

            $path = $request->file('excelFile');
            
            $reader = ReaderFactory::createFromType(Type::XLSX);
            $reader->open($path);

            $dataPeriode = new Periode;
            $dataPeriode->nama_periode = $request->nama_periode;
            $dataPeriode->save();
            
            foreach ($reader->getSheetIterator() as $sheet){
                if ($sheet->getIndex() === 0) {
                    foreach ($sheet->getRowIterator() as $rowKey => $rowValue){
                        if ($rowKey === 1){
                            foreach($rowValue->toArray() as $headerKey => $headerValue){
                                if(strtolower($headerValue) === 'no rek') $tableHeaderArr['no_rekening']= $headerKey;
                                else if(strtolower($headerValue) === 'nama nasabah') $tableHeaderArr['nama_nasabah']= $headerKey;
                                else if(strtolower($headerValue) === 'alamat') $tableHeaderArr['alamat']= $headerKey;
                                else if(strtolower($headerValue) === 'jml. point') $tableHeaderArr['jumlah_undian']= $headerKey;
                                else if(strtolower($headerValue) === 'produk') $tableHeaderArr['produk']= $headerKey;
                            }
                            continue;
                        }else{
                            foreach($rowValue->toArray() as $columnKey => $columnValue){
                                foreach($tableHeaderArr as $tableHeaderKey => $tableHeaderValue){
                                    if($columnKey === $tableHeaderValue){
                                        if($tableHeaderKey === 'jumlah_undian'){
                                            $tableColumnDataArr[$i][$tableHeaderKey] = number_format((float) ltrim($columnValue), 0, '.', '');
                                        }else{
                                            $tableColumnDataArr[$i][$tableHeaderKey] = ltrim($columnValue);
                                        }
                                    }
                                }
                            }
                            $tableColumnDataArr[$i]['id_periode'] = $dataPeriode->id;
                            $i++;
                        }
                    }
                }
            }
            $reader->close();

            for($j= 0; $j < count($request->hadiah); $j++){
                $hadiahDataArr[$j]['nama_hadiah'] = $request->hadiah[$j];
                $hadiahDataArr[$j]['qty_hadiah'] = $request->qty_hadiah[$j];
                $hadiahDataArr[$j]['id_periode'] = $dataPeriode->id;
            }

            PeriodeHadiah::insert($hadiahDataArr);
            
            foreach (array_chunk($tableColumnDataArr,1000) as $tableColumnData){
                PeriodePeserta::insert($tableColumnData);
            }

            DB::select('CALL generate_kupon(?)', [$dataPeriode->id]);

            return response()->json('success');
        } catch (HttpException $exception) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getDataPeriodeUndian(Request $request){
        $dataPeriodeArr = array();

        if(!isset($request->q)){
            $dataPeriode = Periode::orderBy('id', 'desc')->paginate(15);
        }else{
            $dataPeriode = Periode::orderBy('id', 'desc')->where('nama_periode','LIKE','%'.$request->q.'%')->get()->toArray();
        }
        

        for($i= 0; $i < count($dataPeriode); $i++){
            $dataPeriodeArr[$i]['id'] = $dataPeriode[$i]['id'];
            $dataPeriodeArr[$i]['name'] = $dataPeriode[$i]['nama_periode'];
        }

        $response = array(
            // "draw" => intval($draw),
            // "iTotalRecords" => $totalRecords,
            // "iTotalDisplayRecords" => $totalRecords,
            "items" => $dataPeriodeArr
        );

        return response()->json($response);
        // dd($dataPeriodeArr);
    }
}
