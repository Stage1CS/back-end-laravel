<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\livreur;


class LivreurController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_livreur()
    {
        return Livreur::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_livreur(Request $request)
    {
        if (Livreur::create($request->all())) {
            return response()->json([
                'success' => 'livreur créée avec succès'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_livreur(Livreur $livreur)
    {
        return $livreur; 
    }

    public function show_livreur_nom(Request $request)
    {
        $nom = $request->nom;
        $chercher = livreur::where('nom', $nom)->get();
        return $chercher->toJson();         
    }

    public function show_livreur_prenom(Request $request)
    {
        $prenom = $request->prénom;
        $chercher = livreur::where('prénom', $prenom)->get();
        return $chercher->toJson(); 
    }

    public function show_livreur_email(Request $request)
    {
        $mail = $request->mail;
        $chercher = livreur::where('mail', $mail)->get();
        return $chercher->toJson(); 
    }

    public function show_livreur_numero(Request $request)
    {
        $num = $request->num;
        $chercher = livreur::where('num', $num)->get();
        return $chercher->toJson(); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_livreur(Request $request, livreur $livreur)
    {
        if ($livreur->update($request->all())) {
            return response()->json([
                'success' => 'livreur modifiée avec succès'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_livreur(livreur $livreur)
    {
        $livreur->delete();
    }
}



