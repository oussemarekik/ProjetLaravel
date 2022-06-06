<?php

namespace App\Http\Controllers;

use App\Models\marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marques = marque::all()->toArray();
        return array_reverse($marques);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marque=new marque(["name"=>$request->input('name'),"imagemarque"=>$request->input("imagemarque")]);
        $marque->save();
        return response()->json('Marque créée !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $marque=marque::find($id);
        return response()->json($marque);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $marque=marque::find($id);
        $marque->update($request->all());
        return response()->json('Marque MAJ !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marque = marque::find($id);
       $marque->delete();
        return response()->json('marque supprimée !');
    }
}
