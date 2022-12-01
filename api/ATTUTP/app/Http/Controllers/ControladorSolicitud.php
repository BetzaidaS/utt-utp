<?php

namespace App\Http\Controllers;
use App\Models\Solicitud;
use Illuminate\Http\Request;


class ControladorSolicitud extends Controller 
{

   public function solicitud(Request $request){
      $solicitud = Solicitud::all()->
      where("id_solicitud",$request->id_solicitud)->first();
      return response()->json([$solicitud]);
   }

   public function indice(){
      $solicitud = Solicitud::all();
      return response()->json($solicitud);
   }

   public function mostrar($id){
      $solicitud = Solicitud::find($id);
      return response()->json($solicitud);
   }

   public function crear(Request $request){
      $solicitud = new Solicitud();

      $solicitud->destino   = $request->destino;
      $solicitud->fecha   = $request->fecha;
      $solicitud->hora_salida   = $request->hora_salida;
      $solicitud->hora_llegada   = $request->hora_llegada;
      $solicitud->cant_personas   = $request->cant_personas;

      $solicitud->save();

      return response()->json("solicitud creado Satisfactoriamente!",200);
   }

   public function actualizar(Request $request, $id){

      $solicitud = Solicitud::find($id);

      $solicitud->destino   = $request->destino;
      $solicitud->fecha   = $request->fecha;
      $solicitud->hora_salida   = $request->hora_salida;
      $solicitud->hora_llegada   = $request->hora_llegada;
      $solicitud->cant_personas   = $request->cant_personas;
   

      $solicitud->save();

      return response()->json($solicitud);

   }

   public function eliminar($id){
      $solicitud = Solicitud::find($id);
      $solicitud->delete();

      return response()->json("solicitud Eliminado Satisfactoriamente!",200);
   }

   
}