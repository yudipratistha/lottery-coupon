<?php

namespace App\Http\Controllers;

use App\Models\PeriodePeserta;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use File;
use Box\Spout\Reader\Common\Creator\ReaderFactory;
// use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

class UndianController extends Controller
{
    public function undianIndex(){
        return view('input_periode_undian');
    }

    public function storeDataUndian(Request $request){
        ini_set('memory_limit','256M');
        // $this->validate($request,[
        //     'csvFile' => 'required',
        // ]);
        
        try{
            $tableHeaderArr = array();
            $tableColumnDataArr = array();
            $i= 0;

            $path = $request->file('csvFile');
            
            $reader = ReaderFactory::createFromType(Type::XLSX);
            $reader->open($path);

            $status = false;
            foreach ($reader->getSheetIterator() as $sheet){
                if ($sheet->getIndex() === 0) {
                    foreach ($sheet->getRowIterator() as $rowKey => $rowValue){
                        if ($rowKey === 1) {
                            foreach($rowValue->toArray() as $headerKey => $headerValue){
                                if($headerValue === 'No Rek') $tableHeaderArr['no_rekening']= $headerKey;
                                else if($headerValue === 'Nama Nasabah') $tableHeaderArr['nama_nasabah']= $headerKey;
                                else if($headerValue === 'Alamat') $tableHeaderArr['alamat']= $headerKey;
                            }
                            continue;
                        }else{
                            foreach($rowValue->toArray() as $columnKey => $columnValue){
                                foreach($tableHeaderArr as $tableHeaderKey => $tableHeaderValue){
                                    if($columnKey === $tableHeaderValue){
                                        $tableColumnDataArr[$i][$tableHeaderKey] = ltrim($columnValue);
                                    }
                                }
                            }
                            $tableColumnDataArr[$i]['id_periode'] = 1;
                            $tableColumnDataArr[$i]['nomor_undian'] = null;
                            $i++;
                        }
                    }
                }
            }
            $reader->close();

            foreach (array_chunk($tableColumnDataArr,1000) as $tableColumnData){
                PeriodePeserta::insert($tableColumnData);
            }

            return response()->json('success');
        } catch (HttpException $exception) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
