<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\maquina;

class MaquinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maquinas = maquina::all();  
        echo json_encode($maquinas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
      
        maquina::create([
            'placa'=>$request->input('placa'),
            'marca'=>$request->input('marca'),
            'modelo'=>$request->input('modelo'),
            'cilindraje'=>$request->input('cilindraje'),
            'motor'=>$request->input('motor'),
            'chasis'=>$request->input('chasis')
                
        ]);
        
       // echo maquina::all();
       
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
    public function update(Request $request)
    {     

      
    
        $maquina=maquina::find($request->input('id'));
        $maquina->placa=$request->input('placa');
        $maquina->marca=$request->input('marca');
        $maquina->modelo=$request->input('modelo');
        $maquina->cilindraje=$request->input('cilindraje');
        $maquina->motor=$request->input('motor');
        $maquina->chasis=$request->input('chasis');
        $maquina->save();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $maquina =maquina::findOrFail($request->input('id'));
        $maquina->delete();
    }
}
