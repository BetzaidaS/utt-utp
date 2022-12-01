<?php

namespace App\Http\Controllers;
use App\Models\Reporte;
use Illuminate\Http\Request;


class ControladorReporte extends Controller 
{

   public function reporte(Request $request){
      $reporte = Reporte::all()->
      where("id_reporte",$request->id_reporte)->first();
      return response()->json([$reporte]);
   }

   public function indice(){
      $reporte = Reporte::all();
      return response()->json($reporte);
   }

   public function mostrar($id){
      $reporte = Reporte::find($id);
      return response()->json($reporte);
   }

   public function crear(Request $request){
      $reporte = new Reporte();

      $reporte->motivo   = $request->motivo;
      $reporte->detalles   = $request->detalles;
      $reporte->foto   = $request->foto;
      $reporte->	id_conductor    = $request->	id_conductor;

      $reporte->save();

      return response()->json("reporte creado Satisfactoriamente!",200);
   }

   public function actualizar(Request $request, $id){

      $reporte = Reporte::find($id);

      $reporte->motivo   = $request->motivo;
      $reporte->detalles   = $request->detalles;
      $reporte->foto   = $request->foto;
      $reporte->	id_conductor    = $request->	id_conductor ;
   

      $reporte->save();

      return response()->json($reporte);

   }

   public function eliminar($id){
      $reporte = Reporte::find($id);
      $reporte->delete();

      return response()->json("reporte Eliminado Satisfactoriamente!",200);
   }

   
}