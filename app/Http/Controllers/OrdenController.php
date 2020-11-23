<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\orden;
use App\maquina;
use App\usuario;
use App\us_or;

class OrdenController extends Controller
{
    
    public function index()
    {
        $orden = DB::table('ordenes')
        ->select('ordenes.id','maquinas.placa','ordenes.fecha_in','ordenes.fecha_fn','ordenes.descripcion')
        ->join('maquinas', 'maquinas.id', '=', 'ordenes.id_mq')
        ->get();
       
        
        return view('ordenes.ordenes',[
            'orden'=>$orden,
        ]);   
        
     }

   
    public function create()
    {
        $maquina = maquina::all();  
        $usuario = usuario::all();  

        return view('ordenes.crear',[
            'maquina'=>$maquina,
            'trabajadores'=>$usuario
        ]);

    }

    public function store(Request $request)
    {
       $descripcion= $request->input('descripcion');  
       $fi= $this->transform_date_fi($request->input('fecha_inicio'));
       $fn= $this->transform_date_fn($request->input('fecha_final'));
        $validatedData = $request->validate([
            'maquina' => 'required',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'trabajador1'=>'required',
            'descripcion'=>'required'
        ]);
         $orden= orden::create([
            'id_mq'=>$request->input('maquina'),
            'fecha_in'=>$fi,
            'fecha_fn'=>$fn,
            'descripcion'=>$descripcion,
        ]);
        
        $data = [
            ['id_us'=>$request->input('trabajador1'), 'id_or'=>$orden->id],
            ['id_us'=>$request->input('trabajador2'), 'id_or'=>$orden->id],
            ['id_us'=>$request->input('trabajador3'), 'id_or'=>$orden->id]

            //...
        ];
        us_or::insert($data); 
       
      return redirect('ordenes/crear')->with('status', 'Orden registrada exitosamente!');
       
    }

  
    public function show($id)
    {
        
    }


     
    public function edit($id)
    {
        $orden =orden::findOrFail($id);
        $maquina = maquina::all();  
        $usuario = usuario::all(); 
        return view('ordenes.editar',[
            'orden'=>$orden,
            'trabajadores'=>$usuario,
            'maquina' =>$maquina
         ]);    
    }

   
    public function update(Request $request)
    {
    
        $id =$request->input('id');
        $fi= $this->transform_date_fi($request->input('fecha_inicio'));
        $fn= $this->transform_date_fn($request->input('fecha_final'));
        $tb1= $request->input('trabajador1');
        $tb2=$request->input('trabajador2');
        $tb3=$request->input('trabajador3');
         $us_or = us_or::all();
         $i=1;
        $validatedData = $request->validate([
            'maquina' => 'required',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'trabajador1'=>'required',
            'descripcion'=>'required',
        ]);

        $orden=orden::find($id);
        $orden->id_mq=$request->input('maquina');
        $orden->fecha_fn=$fi;
        $orden->fecha_fn=$fn;
        $orden->descripcion=$request->input('descripcion');
        $orden->save();
       
        foreach($us_or as $us_or){
            if($i==1){
            $us_or=us_or::find($us_or->id);
            $us_or->id_us=$tb1;
            $us_or->save();
            }
           
            if($i==2){
                $us_or=us_or::find($us_or->id);
                $us_or->id_us=$tb2;
                $us_or->save();
            }
           
            if($i==3){
                $us_or=us_or::find($us_or->id);
                $us_or->id_us=$tb3;
                $us_or->save();
            }
            $i++;
           
        }
       
   


      return redirect('ordenes/edit/'.$id)->with('status', 'Orden editada exitosamente!');
    
    }

   


    public function destroy( Request $request)
    {
       
    
        $orden =orden::findOrFail($request->input('id'));
        $orden->delete();
        return redirect('/ordenes');

    }

    public function transform_date_fi($date)
    { 
        $time=substr($date, -8);
        $time=date("H:i",strtotime($time));
        $date=substr($date, -19,10);
        $day= substr($date, -7,2);
        $month=substr($date, -10,2);
        $year=substr($date, -4,4);
        //No tocar linea de codigo
        $date=$year."-".$month."-".$day." ".$time.":00";
        return $date; 

       }
    public function transform_date_fn($date)
    { 
        // MM/DD/AAAA HH:ii AM/PM

        //AAAA-MM-DD HH:ii:00
        $time=substr($date, -8);
        $time=date("H:i",strtotime($time)); 
        $date=substr($date, -19,10);
        $day= substr($date, -7,2);
        $month=substr($date, -10,2);
        $year=substr($date, -4,4);
        //No tocar linea de codigo
         $date=$year."-".$month."-".$day." ".$time.":00";
       return $date;
        
    }
}
