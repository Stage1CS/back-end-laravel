<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\magasin;

class magasinController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }

    public function index_magasin()
    {
        return magasin::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_magasin(Request $request)
    {
        if (magasin::create($request->all())) {
            return response()->json([
                'success' => 'magasin créée avec succès'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Magasin  $magasin
     * @return \Illuminate\Http\Response
     */
    public function show_magasin(Magasin $magasin)
    {
        return $magasin;
    }

    public function show_magasin_nom(Request $request)
    {
        $name = $request->name;
        $chercher = magasin::where('name', $name)->get();
        return $chercher->toJson();         
    }

    public function show_magasin_email(Request $request)
    {
        $email = $request->eamil;
        $chercher = magasin::where('eamil', $email)->get();
        return $chercher->toJson();         
    }

    public function show_magasin_phone(Request $request)
    {
        $Phone = $request->Phone;
        $chercher = magasin::where('Phone', $Phone)->get();
        return $chercher->toJson();         
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Magasin  $magasin
     * @return \Illuminate\Http\Response
     */
    public function update_magasin(Request $request, Magasin $magasin)
    {
        if ($magasin->update($request->all())) {
            return response()->json([
                'success' => 'magasin modifiée avec succès'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Magasin  $magasin
     * @return \Illuminate\Http\Response
     */
    public function destroy_magasin(Magasin $magasin)
    {
        $magasin->delete();
    
    }

}






