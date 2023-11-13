<?php
    require_once 'app/model/producto.model.php';
    require_once 'app/controllers/api.controller.php';

    class ProductoApiController extends ApiController{
        private $model;

        function __construct() {
            parent::__construct();
            $this->model = new productoModel();       
        }
        
        
        function get($params = []){
            $sort = isset($_GET['sort']) ? $_GET['sort'] : null;
            $order = isset($_GET['order']);

            if(empty($params[':CATEGORIA'])){  // Si no hay parámetros agarro los productos...
                if($sort == null ){//si no hay parametros de ordenamiento los devuelvo asi nomas
                    $productos = $this->model->getProductos();
                    $this->view->response($productos, 200);
                    return;
                }
                else if(isset($sort) && isset($order)){ // Si  hay parámetros de orden, los ordeno y los devuelvo
                    if($_GET['order']=="asc" || $_GET['order']== "ASC"){
                        $productosAsc = $this->model->getProductos();
                        usort($productosAsc, [$this, 'compararPorPrecioAsc']);
                        $this->view->response($productosAsc, 200);
                        return;}
                    else if($_GET['order']=="desc" || $_GET['order']==  "DESC"){
                        $productosDesc = $this->model->getProductos();
                        usort($productosDesc, [$this, 'compararPorPrecioDesc']);
                        $this->view->response($productosDesc, 200);
                        return;
                    }else{$this->view->response("Modo de ordenamiento erroneo",404);}
                }
                else{
                    $this->view->response("Algo fallo en el envio de parametros ", 404);
                }
            }
            if(isset($params)){
                if(($params[':CATEGORIA'] == '1' )|| ($params[':CATEGORIA']=='2')){               
                    $productosCategoria=$this->model->getProductosIdCategoria($params[':CATEGORIA']);
                    return $this->view->response( $productosCategoria, 200);
                    }
                    else{$this->view->response( "Los id categoria solo pueden ser 1 o 2", 400);}
                }
            else {
                $this->view->response("Algo fallo en el envio de parametros ", 404);
            }
        
        }
        function getById($params = []){
            // Si hay un parámetro :ID  obtengo checkeo que exista y devuelvo el producto específico
           $producto = $this->model->getProducto($params [':ID']);
           if($producto){ 
               $this->view->response($producto, 200);
           }
           else{
               $this->view->response("El producto con el id= ".$params[':ID']. " no existe", 404);
           }     
        }
        function agregarProducto($params = []) {
            $body = $this->getData();
   
            $producto = $body->producto;
            $descripcion = $body->descripcion;
            $precio = $body->precio;
            $id_categoria = $body->id_categoria;
   
            $id = $this->model->insertarProducto($producto, $precio, $descripcion, $id_categoria);
   
            $this->view->response('producto insertado con id='.$id, 201);
        }

        function borrarProducto($params = []){
            $id = $params[':ID'];
            $producto = $this->model->getProducto($id);

            if($producto) {
                $this->model->borrarProducto($id);
                $this->view->response('producto con id='.$id.' fue borrado.', 200);
            } else {
                $this->view->response('el producto con id='.$id.' no existe.', 404);
            }
        }

        function updateProducto($params = []) {
            $id = $params[':ID'];
            $producto = $this->model->getProducto($id);
            if($producto) {
                $body = $this->getData();
                $producto = $body->producto;
                $descripcion = $body->descripcion;
                $precio = $body->precio;
                $id_producto = $body->id_producto;

                if(!empty($producto) && !empty($descripcion) && ($precio > 0 )&& !empty($id_producto)){
                $this->model->actualizarProducto($producto,$precio,$descripcion, $id_producto);
                $this->view->response('El producto con id='.$id.' fue actualizado.', 201);
                }else{
                    $this->view->response('Falata completar bien algun campo', 404);
                }
            } else {
                $this->view->response('El producto con id='.$id.' no existe.', 404);
            }   
        }    

        function compararPorPrecioAsc($a, $b){
            $precioA = $a->precio;
            $precioB = $b->precio;
            return $precioA - $precioB;
        }

        function compararPorPrecioDesc($a, $b){
            $precioA = $a->precio;
            $precioB = $b->precio;
            return $precioB - $precioA;
        }   
}
