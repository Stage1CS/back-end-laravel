<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\livreurExport;
use App\Imports\livreurImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\livreur;

class ExportImportLivreurController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        $file = Excel::download(new livreurExport, 'livreurs.xlsx');
        if ($file){
            return response()->json([
                'success' => 'Excel file exported successfully',
            ], 200);
        }
        return $file;
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
        Excel::import(new livreurImport,request()->file('exemple.xlsx'));
             
        return back()->with('success', 'Excel file imported successfully');
    }
}
