<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Lugar;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulo = Articulo::all();
        $lugar = Lugar::all();
        return view('articulos', compact('articulo','lugar'));
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
          $articulo = new Articulo();
          $articulo->nombre_art = $request->input('nombre');
          $articulo->nombre_lug = $request->input('lugar');
          $articulo->formao_art= $request->input('formao');
          $articulo->save();
   	return back()->with('success','Articulo Añadido');
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
      $articulo = Articulo::where('nombre_art','=',$nombre)->firstOrFail();
      $articulo->fill($request->all());
      $articulo->save();

      return back()->with('success','Articulo Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nombre)
    {
      $articulo = Articulo::where('nombre_art','=',$nombre)->firstOrFail();
      $articulo->delete();
      return back()->with('dark','Articulo Eliminado');
    }
}
