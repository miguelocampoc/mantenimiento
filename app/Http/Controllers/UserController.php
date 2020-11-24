<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\usuario;
use Illuminate\Support\Facades\DB;
use App\maquina;
use App\orden;

class UserController extends Controller
{

    public function fecha()
    {
        return view('consultas.fecha');
    }
    public function tb()
    {     
        $usuarios = usuario::all();  

        return view('consultas.trabajadores',[
            'trabajadores'=>$usuarios,
        ]);
    }
    public function mq()
    {
        $maquina = maquina::all();  

        return view('consultas.maquinas',[
            'maquina'=>$maquina,
        ]);    
    }

    public function index()
    {
        $usuarios = usuario::all();  
         echo json_encode($usuarios) ;
    }


    public function create()
    {
      
    }


    public function store(Request $request)
    {
       
    
        usuario::create([
            'cedula'=>$request->input('cedula'),
            'nombre'=>$request->input('name'),
            'apellido'=>$request->input('apellido'),
            'email'=>$request->input('email'),
            'contacto'=>$request->input('contacto')
                
        ]);
        
        echo usuario::all();
    
    }

    public function update(Request $request)
    {   
        
       


        $usuario=usuario::find($request->input('id'));
        $usuario->cedula=$request->input('cedula');
        $usuario->nombre=$request->input('nombre');
        $usuario->apellido=$request->input('apellido');
        $usuario->email=$request->input('email');
        $usuario->contacto=$request->input('contacto');
       
        $usuario->save();
        echo  usuario::all();  

    }

    
    public function destroy(Request $request)
    {
        $usuario =usuario::findOrFail($request->input('id'));
        $usuario->delete();
        echo  usuario::all();  
    }
   
     public function fecha_consult(Request $request){
    
        $fecha=$request->input('fecha');
        $consulta = DB::table('ordenes')
        ->select('ordenes.id','ordenes.descripcion','maquinas.placa','maquinas.marca','maquinas.modelo')
        ->join('maquinas', 'maquinas.id', '=', 'ordenes.id_mq')
        ->whereDate('fecha_in',$fecha)
        ->get();
        echo $consulta;

     }
     public function actividades_fecha(Request $request){
      $id_or=$request->input('id');
       $consulta=DB::table('us_or')
       ->select('us_or.act_tb')
        ->where('us_or.id_or',$id_or)
        ->get();
       echo $consulta;
        
        


     }
    public function mq_consult(Request $request){
       // 2020-11-24
       $filtrar=$request->input('filtrar');

       if($filtrar=="date"){
        $fecha= $request->input('fecha');
       }
       if($filtrar=="m"){
        $fecha= $request->input('fecha');
        $fecha = date( "m", strtotime($fecha ) );
  
       }
       if($filtrar=="d"){
        $fecha= $request->input('fecha');
        $fecha = date( "d", strtotime($fecha ) );
       }
 
      $maquina=$request->input('maquina');
      $consulta = DB::table('ordenes')
      ->select('ordenes.id','maquinas.placa','maquinas.marca','maquinas.modelo','ordenes.fecha_in')
      ->join('maquinas', 'maquinas.id', '=', 'ordenes.id_mq')
      ->whereMonth('ordenes.fecha_in',$fecha)
      ->orWhereDate('ordenes.fecha_in',$fecha)
      ->orWhereday('ordenes.fecha_in',$fecha)
      ->where('maquinas.placa',$maquina)
      ->get();
      echo $consulta;
 
    }
    public function tb_consult(Request $request){


        $filtrar=$request->input('filtrar');

        if($filtrar=="date"){
         $fecha= $request->input('fecha');
        }
        if($filtrar=="m"){
         $fecha= $request->input('fecha');
         $fecha = date( "m", strtotime($fecha ) );
   
        }
        if($filtrar=="d"){
         $fecha= $request->input('fecha');
         $fecha = date( "d", strtotime($fecha ) );
        }
        $tb = $request->input('tb');
        $consulta = DB::table('us_or')
        ->select('ordenes.id','usuarios.nombre','usuarios.apellido','maquinas.placa','maquinas.modelo','ordenes.fecha_in','us_or.act_tb')
        ->join('usuarios', 'usuarios.id', '=', 'us_or.id_us')
        ->join('ordenes', 'ordenes.id', '=', 'us_or.id_or')
        ->join('maquinas', 'maquinas.id', '=', 'ordenes.id_mq')
        ->WhereDate('ordenes.fecha_in',$fecha)
        ->orwhereMonth('ordenes.fecha_in',$fecha)
        ->orwhereday('ordenes.fecha_in',$fecha)
        ->where('us_or.id_us',$tb)

        ->get();
        echo $consulta;
    
      }

     public function transform_date($date)
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
   
}
