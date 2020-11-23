<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\equipos;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = equipos::all();  
        echo json_encode($equipos);   
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

        equipos::create([
            'integrante1'=>$request->input('s1'),
            'integrante2'=>$request->input('s2'),
            'integrante3'=>$request->input('s3'),
      
                
        ]);
        
        echo equipos::all();   
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
    
        $equipos=equipos::find($request->input('id'));
        $equipos->integrante1=$request->input('s1');
        $equipos->integrante2=$request->input('s2');
        $equipos->integrante3=$request->input('s3');
       
        $equipos->save();
        echo  equipos::all(); 
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $equipos =equipos::findOrFail($request->input('id'));
        $equipos->delete();
        echo  equipos::all();  
    }
}
