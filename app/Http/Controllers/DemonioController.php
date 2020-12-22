<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demonio;
use App\Lugar;

class DemonioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $demonio = Demonio::all()->sortBy("nombre_dem");
      $lugar = Lugar::all();
      return view('demonios', compact('demonio','lugar'));
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
      if($request->hasFile('imagen')) {
        $file = $request->file('imagen');
        $name = time().$file->getClientOriginalName();
        $file->move(public_path().'/imagenDem/', $name);
      }
          $demonio = new Demonio();
          $demonio->nombre_dem = $request->input('nombre');
          $demonio->descrip_dem = $request->input('descrip');
          $demonio->nombre_lug = $request->input('lugar');
          $demonio->nombre_pcu = $request->input('pcu');
          $demonio->slug = $request->input('nombre');
          $demonio->imagen_dem = $name;
          $demonio->save();
    return back()->with('success','Demonio Añadido');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $codigo_dem
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $demonio = Demonio::where('slug','=',$slug)->firstOrFail();
      $lugar = Lugar::all();
      return view('demonio.show',compact('demonio','lugar')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
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
    public function update(Request $request, $slug)
    {
        $demonio = Demonio::where('slug','=',$slug)->firstOrFail();
        $demonio->fill($request->except('imagen_dem'));
        if($request->hasFile('imagen_dem')) {
            $file = $request->file('imagen_dem');
            $name = time().$file->getClientOriginalName();
           $demonio->imagen_dem = $name;
         $file->move(public_path().'/imagenDem/', $name);

        }
        $demonio->save();

        return back()->with('success','Demonio Modificado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
          $demonio = Demonio::where('slug','=',$slug)->firstOrFail();
          $file_path = public_path().'/imagenDem/'.$demonio->imagen_dem;
          \File::delete($file_path);
          $demonio->delete();
          return redirect()->Route('/../demonios.b');
    }
}
