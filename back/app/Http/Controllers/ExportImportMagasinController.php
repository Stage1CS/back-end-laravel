<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\magasinExport;
use App\Imports\magasinImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\magasin;

class ExportImportMagasinController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        $file = Excel::download(new magasinExport, 'magasins.xlsx');
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
        Excel::import(new magasinImport,request()->file('file'));
             
        return back()->with('success', 'data added successfully');
    }
}
