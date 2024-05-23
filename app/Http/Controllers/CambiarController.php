<?php

namespace App\Http\Controllers;

use App\Models\Artistas;
use App\Models\Discusiones;
use App\Models\Musica;
use App\Models\Publicacion;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CambiarController extends Controller
{
    public function editarUsuario(Request $request, Usuario $id){
        $request->validate([
            'nombre_usuario'=>[ 'required','min:4', 'max:50' ],
            'nombre'=>['required', 'max:50'],
            'correo'=>['required','email:rfc,dns'],
            'texto'=>['required'],
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);


        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $ruta = $imagen->storeAs('images', $nombreImagen, 'public');
            $imagen->storeAs('images', $nombreImagen, 'public');

        } else {
            $nombreImagen = $id->imagen;
        }
        $id->nombre_usuario = $request->nombre_usuario;
        $id->nombre = $request->nombre;
        $id->correo = $request->correo;
        $id->imagen = $nombreImagen;
        $id->texto = $request->texto;

        $id->save();
        return redirect()->route('miPerfil', $id->id);
    }


    public function cambiarContraseña(Request $request)
    {
        $contrasenaActual = $request->input('contrasenaActual');
        $nuevaContrasena = $request->input('nuevaContrasena');
        echo $contrasenaActual;

        $usuario = Auth::user();
        if (Hash::check($contrasenaActual, $usuario->password)) {
            $usuario->password = $nuevaContrasena;
            $usuario->save();

            return response()->json('La contraseña ha sido cambiada exitosamente');
        } else {
            // La contraseña actual es incorrecta, entonces retornamos un error
            return response()->json('La contraseña actual es incorrecta', 400);
        }
    }



}
