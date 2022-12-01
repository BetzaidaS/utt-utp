<?php

namespace App\Http\Controllers;
use App\Models\Viaje;
use Illuminate\Http\Request;


class ControladorViajes extends Controller 
{

   public function viaje(Request $request){
      return Viaje::all()->
      where("id_conductor",$request->id_conductor)->first();
   }

   public function indice(){
      $viaje = Viaje::all();
      return response()->json($viaje);
   }

   public function mostrar($id){
      $viaje = Viaje::find($id);
      return response()->json($viaje);
   }

   public function crear(Request $request){
      $viaje = new Viaje();

      $viaje->id_viaje   = $request->id_viaje;
      $viaje->id_solicitud   = $request->id_solicitud;
      $viaje->id_conductor   = $request->id_conductor;
      $viaje->id_vehiculo   = $request->id_vehiculo;
      $viaje->estado_viaje   = $request->estado_viaje;

      $viaje->save();

      return response()->json("viaje creado Satisfactoriamente!",200);
   }

   public function actualizar(Request $request, $id){

      $viaje = Viaje::find($id);

      $viaje->id_viaje   = $request->id_viaje;
      $viaje->id_solicitud   = $request->id_solicitud;
      $viaje->id_conductor   = $request->id_conductor;
      $viaje->id_vehiculo   = $request->id_vehiculo;
      $viaje->estado_viaje   = $request->estado_viaje;

      $viaje->save();

      return response()->json($viaje);

   }

   public function eliminar($id){
      $viaje = Viaje::find($id);
      $viaje->delete();

      return response()->json("viaje Eliminado Satisfactoriamente!",200);
   }

   
}