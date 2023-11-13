<?php
    require_once 'libs/router.php';
    require_once 'app/controllers/producto.api.controller.php';


    $router = new Router();
      #                endpoint         verbo    controller(nombre class)  método
    $router->addRoute('productos' , 'GET'   , 'ProductoApiController', 'get' );//al venir sin parametros llamo a todos los productos
    $router->addRoute('productos/:CATEGORIA', 'GET'   , 'ProductoApiController', 'get');//con el parametro llamo a uno solo producto pero es la misma funcion 
    $router->addRoute('producto/:ID', 'GET'   , 'ProductoApiController', 'getById');
    $router->addRoute('producto/:ID', 'DELETE', 'ProductoApiController', 'borrarProducto');
    $router->addRoute('productos'    , 'POST'  , 'ProductoApiController', 'agregarProducto');
    $router->addRoute('productos/:ID', 'PUT'   , 'ProductoApiController', 'updateProducto');    

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);

