<?php

namespace App\Http\Controllers;

use App\Models\carrosserie;
use Illuminate\Http\Request;

class CarrosserieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carrosseries=carrosserie::all()->toArray();
        return array_reverse($carrosseries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $carrosserie=new carrosserie(["name"=>$request->input('name'),"imagecarrosseries"=>$request->input("imagecarrosseries")]);
        $carrosserie->save();
        return  response()->json('carrosserie créée !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\carrosserie  $carrosserie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrosserie=carrosserie::find($id);
        return response()->json($carrosserie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\carrosserie  $carrosserie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $carrosserie=carrosserie::find($id);
        $carrosserie->update($request->all());
        return  response()->json('carrosserie update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carrosserie  $carrosserie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrosserie=carrosserie::find($id);
        $carrosserie->delete();
        return  response()->json('carrosserie supprimer !');
    }
}
