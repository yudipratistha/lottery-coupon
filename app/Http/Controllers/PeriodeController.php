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
        // $this->validate($request,[
        //     'csvFile' => 'required',
        // ]);
        
        try{
            $tableHeaderArr = array();
            $tableHeaderJmlPointArr = array();
            $tableColumnDataArr = array();
            
            $hadiahDataArr = array();
            $i= 0;

            $dataPeriode = new Periode;
            $dataPeriode->nama_periode = $request->nama_periode;
            $dataPeriode->save();

            $path = $request->file('csvFile');
            
            $reader = ReaderFactory::createFromType(Type::XLSX);
            $reader->open($path);

            $status = false;
            foreach ($reader->getSheetIterator() as $sheet){
                if ($sheet->getIndex() === 0) {
                    foreach ($sheet->getRowIterator() as $rowKey => $rowValue){
                        if ($rowKey === 1){
                            foreach($rowValue->toArray() as $headerKey => $headerValue){
                                if($headerValue === 'No Rek') $tableHeaderArr['no_rekening']= $headerKey;
                                else if($headerValue === 'Nama Nasabah') $tableHeaderArr['nama_nasabah']= $headerKey;
                                else if($headerValue === 'Alamat') $tableHeaderArr['alamat']= $headerKey;
                                else if($headerValue === 'Jml. Point') $tableHeaderArr['jumlah_undian']= $headerKey;
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
}
