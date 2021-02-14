<?php

include_once('controllers/control.php');

//OPCIONALES
include_once('config/Conexion.php');
include_once('models/zapato.php');


$controller = new Control();

if(!isset($_REQUEST['c'])){//si no existe la ruta ,cargamos por defecto index
   $controller->index();
} else {                  //si hay peticiones pintamos el archivo solicitado
   $peticion = $_REQUEST['c'];
   call_user_func(array($controller , $peticion));
}

