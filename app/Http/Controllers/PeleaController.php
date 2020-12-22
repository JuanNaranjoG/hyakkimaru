<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demonio;
use App\Lugar;
use App\Pelea;

class PeleaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $demonio = Demonio::all();
      $lugar = Lugar::all();
      $pelea = Pelea::all();
      return view('peleas', compact('pelea','lugar','demonio'));
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
      $pelea = new Pelea();
      $pelea->ganador_pel = $request->input('ganador');
      $pelea->nombre_lug = $request->input('lugar');
      $pelea->nombre_dem= $request->input('demonio');
      $pelea->fecha_pel= $request->input('fecha');
      $pelea->save();
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
    public function update(Request $request, $ganador)
    {
      $pelea = Pelea::where('ganador_pel','=',$ganador)->firstOrFail();
      $pelea->fill($request->all());
      $pelea->save();

      return back()->with('success','Pelea Modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nombre)
    {
      $pelea = Pelea::where('ganador_pel','=',$nombre)->firstOrFail();
      $pelea->delete();
      return back()->with('dark','Pelea Eliminada');
    }
}
