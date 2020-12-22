<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partedelcuerpo;

class PartedelcuerpoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $partedelcuerpo = Partedelcuerpo::all();
      return view('partesdelcuerpo', compact('partedelcuerpo'));
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
      $partedelcuerpo = new Partedelcuerpo();
      $partedelcuerpo->nombre_pcu = $request->input('nombre');
      $partedelcuerpo->estado_pcu = $request->input('estado');
      $partedelcuerpo->save();
return back()->with('success','Parte Añadida');
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
      $partedelcuerpo = Partedelcuerpo::where('nombre_pcu','=',$nombre)->firstOrFail();
      $partedelcuerpo->fill($request->all());
      $partedelcuerpo->save();

      return back()->with('success','Parte Modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nombre)
    {
      $partedelcuerpo = Partedelcuerpo::where('nombre_pcu','=',$nombre)->firstOrFail();
      $partedelcuerpo->delete();
      return back()->with('dark','Parte Eliminada');
    }
}
