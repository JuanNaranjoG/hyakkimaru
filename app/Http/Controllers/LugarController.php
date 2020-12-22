<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lugar;

class LugarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $lugar = Lugar::all();
      return view('lugares', compact('lugar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $lugar = new Lugar();
      $lugar->nombre_lug = $request->input('nombre');
      $lugar->ubicacion_lug = $request->input('ubicacion');
      $lugar->clima_lug= $request->input('clima');
      $lugar->save();
        return back()->with('success','Lugar Añadido');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nombre)
    {
      $lugar = Lugar::where('nombre_lug','=',$nombre)->firstOrFail();
      $lugar->fill($request->all());
      $lugar->save();

      return back()->with('success','Lugar Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nombre)
    {
      $lugar = Lugar::where('nombre_lug','=',$nombre)->firstOrFail();
      $lugar->delete();
      return back()->with('dark','Lugar Eliminado');
    }
}
