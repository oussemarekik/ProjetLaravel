<?php

namespace App\Http\Controllers;

use App\Models\voiteurneuf;
use Illuminate\Http\Request;

class VoiteurneufController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voiteur=voiteurneuf::with('marques','carrosseries')->get()->toArray();
        return response()->json($voiteur); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$voiteur=new voiteurneuf(["nom"=>$request->input("nom"),"prix"=>$request->input("prix"),"caracterstique"=>$request->input("caracterstique"),"garantie"=>$request->input("garantie"),"energie"=>$request->input("energie"),"boite"=>$request->input("boite"),"marqueId"=>$request->input("marqueId"),"carrosseriesId"=>$request->input("carrosseriesId")]);
        $voiteur=new voiteurneuf($request->all());
        $voiteur->save();
        return response()->json('Voiteur neuf cree');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\voiteurneuf  $voiteurneuf
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voiteur=voiteurneuf::with('marques','carrosseries')->find($id);
        return response()->json($voiteur);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\voiteurneuf  $voiteurneuf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v=voiteurneuf::find($id);
        $v->update($request->all());
        return  response()->json("voiteur neuf modifier !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\voiteurneuf  $voiteurneuf
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $v=voiteurneuf::find($id);
        $v->delete();
        return  response()->json("voiteur neuf supprimer !");
    }
}
