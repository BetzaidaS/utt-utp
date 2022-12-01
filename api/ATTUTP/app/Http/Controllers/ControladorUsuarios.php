<?php

namespace App\Http\Controllers;
use App\Models\Usuarios;
use Illuminate\Http\Request;


class ControladorUsuarios extends Controller 
{

   public function login(Request $request){
      return Usuarios::all()->
      where("email",$request->email)->where("pass",$request->pass)->first();
   }

   public function indice(){
      $usuario = Usuarios::all();
      return response()->json($usuario);
   }

   public function mostrar($id){
      $usuario = Usuarios::find($id);
      return response()->json($usuario);
   }

   public function crear(Request $request){
      $usuario = new Usuarios();

      $usuario->id_tipo_usuario   = $request->id_tipo_usuario;
      $usuario->nombre   = $request->nombre;
      $usuario->apellido   = $request->apellido;
      $usuario->email   = $request->email;
      $usuario->cedula   = $request->cedula;
      $usuario->pass   = $request->pass;
      $usuario->foto   = $request->foto;

      $usuario->save();

      return response()->json("usuario creado Satisfactoriamente!",200);
   }

   public function actualizar(Request $request, $id){

      $usuario = Usuarios::find($id);

      $usuario->id_tipo_usuario   = $request->id_tipo_usuario;
      $usuario->nombre   = $request->nombre;
      $usuario->apellido   = $request->apellido;
      $usuario->email   = $request->email;
      $usuario->cedula   = $request->cedula;
      $usuario->pass   = $request->pass;
      $usuario->foto   = $request->foto;

      $usuario->save();

      return response()->json($usuario);

   }

   public function eliminar($id){
      $usuario = Usuarios::find($id);
      $usuario->delete();

      return response()->json("Usuario Eliminado Satisfactoriamente!",200);
   }

   
}