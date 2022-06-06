<?php

namespace App\Http\Controllers;

use App\Models\voiteuroccasion;
use Illuminate\Http\Request;

class VoiteuroccasionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $voiteuro=voiteuroccasion::with("marques","carrosseries")->get()->toArray();
        return response()->json($voiteuro);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voiteuro=new voiteuroccasion($request->all());
        $voiteuro->save();
        return response()->json("Voiteur occasion cree!");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\voiteuroccasion  $voiteuroccasion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voiteuro=voiteuroccasion::with("marques","carrosseries")->find($id);
        return response()->json($voiteuro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\voiteuroccasion  $voiteuroccasion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $voiteuro=voiteuroccasion::find($id);
        $voiteuro->update($request->all());
        return response()->json("voiteur occasion est maj !!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\voiteuroccasion  $voiteuroccasion
     * @return \Illuminate\Http\Response
     */
    public function destroy(voiteuroccasion $voiteuroccasion)
    {
        $voiteuro=voiteuroccasion::find($id);
        $voiteuro->delete();
        return response()->json("voiteur occasion est supprimer !!!");
    }
}
