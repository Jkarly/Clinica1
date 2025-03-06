<?php
require __DIR__.'/../includes/app.php';
require __DIR__.'/../controllers/ReservaController.php';
require __DIR__.'/../controllers/ServicioController.php';
require __DIR__.'/../controllers/CategoriaController.php';
require __DIR__.'/../controllers/UsuarioController.php';
require __DIR__.'/../controllers/OfertaController.php';
use Vendor\Mvc\Router;
use Vendor\Controllers\ControladorServicio;
use Vendor\Controllers\ControladorReserva;
use Vendor\Controllers\OfertaController;
use Vendor\Controllers\ContactoController;
use Vendor\Controllers\CategoriaController;
use Vendor\Controllers\fotoController;
use Vendor\Controllers\ControladorUsuario;
use Vendor\Controllers\RolController;
$router = new Router();


//servicio
$router->get('/admin/servicio',[ControladorServicio::class,'Listar_servicio']);
$router->get('/admin/servicio/crear',[ControladorServicio::class,'Crear_servicio']);
$router->post('/admin/servicio/crear',[ControladorServicio::class,'Crear_servicio']);
//reserva
$router->get('/admin/reserva',[ControladorReserva::class,'Listar_reserva']);
$router->get('/admin/reserva/crear',[ControladorReserva::class,'Crear_reserva']);
$router->post('/admin/reserva/crear',[ControladorReserva::class,'Crear_reserva']);
//oferta
// oferta
$router->get('/admin/oferta',[OfertaController::class,'Listar_Ofertas']);
$router->get('/admin/oferta/crear',[OfertaController::class,'Crear_Oferta']);
$router->post('/admin/oferta/crear',[OfertaController::class,'Crear_Oferta']);

//contacto
$router->get('/admin/contacto',[ContactoController::class,'Listar_Contacto']);
$router->get('/admin/contacto/crear',[ContactoController::class,'Crear_Contacto']);
$router->post('/admin/contacto/crear',[ContactoController::class,'Crear_Contacto']);

//categoria
$router->get('/admin/categoria',[CategoriaController::class,'Listar_categoria']);
$router->get('/admin/categoria/crear',[CategoriaController::class,'Crear_categoria']);
$router->post('/admin/categoria/crear',[CategoriaController::class,'Crear_categoria']);

//foto
$router->get('/admin/foto',[fotoController::class,'Listar_foto']);
$router->get('/admin/foto/crear',[fotoController::class,'Crear_foto']);
$router->post('/admin/foto/crear',[fotoController::class,'Crear_foto']);

//Usuario
$router->get('/admin/usuarios',[ControladorUsuario::class,'Listar_usuario']);
$router->get('/admin/usuarios/crear',[ControladorUsuario::class,'Crear_usuario']);
$router->post('/admin/usuarios/crear',[ControladorUsuario::class,'Crear_usuario']);

// rol
$router->get('/admin/rol',[RolController::class,'Listar_roles']);
$router->get('/admin/rol/crear',[RolController::class,'Crear_rol']);
$router->post('/admin/rol/crear',[RolController::class,'Crear_rol']);


$router->ComprobarRutas();