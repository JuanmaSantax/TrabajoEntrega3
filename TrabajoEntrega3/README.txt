   
    PARA AGREGAR PRODUCTO (POST):
    URL: localhost/TrabajoEntrega3/api/productos
       BODY:
        {  
           "producto": "nuevoProducto",
          "descripcion": "Agregando nuevo producto\r\n",
          "precio": 10000,
          "id_categoria": 2
          }

    PARA ACTUALIZAR PRODUCTO (PUT):
      URL: localhost/TrabajoEntrega3/api/productos/5 (o cualquier otro id, importante usar el mismo en "id_producto":)
      {
      "producto": "ProductoEditado",
      "descripcion": "nuevo producto editado\r\n",
      "precio": 7000,
      "id_producto": 5 
      }

  URL (GET):
    Para traer solo un producto:    localhost/TrabajoEntrega3/api/producto/12  
    Para traer todos los productos:    localhost/TrabajoEntrega3/api/productos/
    Para traer todos los productos de la categoria 1 (autos):    localhost/TrabajoEntrega3/api/productos/1
    Para traer todos los productos de la categoria 2 (motos):    localhost/TrabajoEntrega3/api/productos/2

    Para traer una lista de productos ordenada por precio de forma ascendente:    localhost/TrabajoEntrega3/api/productos?sort=precio&order=asc
    Para traer una lista de productos ordenada por precio de forma descendente:    localhost/TrabajoEntrega3/api/productos?sort=precio&order=desc

  URL(DELETE): localhost/TrabajoEntrega3/api/productos/5 (o cualquier otro id)




