<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CambiarController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MostrarController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*Admin*/
Route::get('web/administrador',[AdminController::class,'mostrarPagAdmin'])->name('panelAdmin');
Route::get('web/administradorUsuarios',[AdminController::class,'mostrarUsuariosAdmin'])->name('panelAdminUsu');
Route::get('web/administradorPub',[AdminController::class,'mostrarPublicAdmin'])->name('panelAdminPublic');
Route::get('web/administradorDisc',[AdminController::class,'mostrarDiscusionesAdmin'])->name('panelAdminDiscu');
Route::get('web/administradorMusica',[AdminController::class,'mostrarMusicaAdmin'])->name('panelAdminMusica');
Route::get('/eliminar/{id}', [AdminController::class,'destroyad'])->name('eliminar');
Route::get('/eliminarPub/{id}', [AdminController::class,'destroyPubad'])->name('eliminarPub');
Route::get('/eliminarDis/{id}', [AdminController::class,'destroyDisad'])->name('eliminarDis');
Route::get('/eliminarMus/{id}', [AdminController::class,'destroyMusad'])->name('eliminarMus');
Route::get('/eliminarArt/{id}', [AdminController::class,'destroyArtad'])->name('eliminarArt');
/*web*/
//miPerfil
Route::get('web/miPerfil/{id}',[MostrarController::class,'muestraUsuario'])->name('miPerfil');
Route::get('web/miPerfilEditar/{id}',[MostrarController::class,'muestraEditarUsuario'])->name('miPerfilEditar');
Route::put('web/miPerfilEditar/{id}', [CambiarController::class, 'editarUsuario'])->name('editarUsuario');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('web/cambiarContraseña/{id}',[MostrarController::class,'muestraCambiarContraseña'])->name('mostrarCambiarContraseña');
Route::post('web/cambiarContraseña', [CambiarController::class, 'cambiarContraseña'])->name('cambiarContraseña');


//Busqueda
Route::get('web/paginaDeBusqueda',[InicioController::class,'busqueda'])->name('busqueda');
Route::get('/busquedaUsu', [AdminController::class,'busquedaUsu'])->name('busquedaUsu');
Route::get('/busquedaDis', [AdminController::class,'busquedaDis'])->name('busquedaDis');
Route::get('/busquedaPub', [AdminController::class,'busquedaPub'])->name('busquedaPub');
Route::get('/busquedaMusica', [AdminController::class,'busquedaMusica'])->name('busquedaMusica');

//Inicio
Route::get('web/index',[InicioController::class, 'muestraPag'])->name('inicio');

//Publicaciones
Route::get('web/publicaciones',[InicioController::class, 'muestraPagPublicaciones'])->name('pagPublicaciones');
Route::get('web/publicacion/{publicacionId}',[MostrarController::class, 'mostrarPublicacion'])->name('pagPublicacion');
Route::get('web/crearPublicacion',[MostrarController::class, 'mostrarCrearPublicacion'])->name('pagCrearPublicacion');
Route::post('web/crearPublicacion',[RegistroController::class, 'crearPublicacion'])->name('crearPublicacion');


//Discusiones
Route::get('web/discusiones',[InicioController::class, 'muestraPagDiscusiones'])->name('pagDiscusiones');
Route::get('web/discusion/{discusionId}',[MostrarController::class, 'mostrarDiscusion'])->name('pagDiscusion');
Route::get('web/crearDiscusion',[MostrarController::class, 'mostrarCrearDiscusion'])->name('pagCrearDiscusion');
Route::post('web/crearDiscusion',[RegistroController::class, 'crearDiscusion'])->name('crearDiscusion');
//Artistas
Route::get('web/artistas',[InicioController::class, 'muestraPagArtistas'])->name('pagArtistas');
Route::get('web/perfilArtista/{artistaId}',[MostrarController::class, 'mostrarArtista'])->name('pagArtista');
Route::get('web/crearArtista',[MostrarController::class, 'mostrarCrearArtista'])->name('pagCrearArtista');
Route::post('web/crearArtista',[RegistroController::class, 'crearArtista'])->name('crearArtista');

//Musica
Route::get('web/crearMusica',[MostrarController::class, 'mostrarCrearMusica'])->name('pagCrearMusica');
Route::post('web/crearMusica',[RegistroController::class, 'crearMusica'])->name('crearMusica');
/*Login Register*/
//Login
Route::get('login/index',function (){
    return view('login/index');
})->name('index');
Route::post('login/index', [LoginController::class, 'authenticate'])->name('autenticarse');

//Register
Route::get('login/registro',function (){
    return view('login/registro');
})->name('registro');
Route::post('login/registro', [RegistroController::class, 'crearUsuario'])->name('registrarse');
