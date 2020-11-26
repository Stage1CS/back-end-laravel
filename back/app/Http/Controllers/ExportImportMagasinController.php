<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\magasinExport;
use App\Imports\magasinImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\magasin;

class ExportImportController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        $file = Excel::download(new magasinExport, 'livreurs.xlsx');
        if ($file){
            return response()->json([
                'success' => 'data correctly downloaded',
            ], 200);
        }
        return $file;
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new magasinImport,request()->file('file'));
             
        return back();
    }
}
