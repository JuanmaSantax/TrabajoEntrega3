   -DESCRIPCION DE LA API
   El proposito de nuestra api es listar todos los productos disponibles en nuestra base de datos... Hicimos que se      pueda traer todos los productos juntos, acceder a un solo producto en especifico, filtrarlos por categoria como       tambien ordenarlos por precio (ascendente o descendente a eleccion). Tambien ademas de traer productos de varias       formas posibles, se puede insertar un nuevo producto en la BD o editar uno ya existnte. 
   (Contamos con un auto Deploy para que la BD se genere automaticamente)
   
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
      URL: localhost/TrabajoEntrega3/api/productos/5 (o cualquier otro id, importante usar el mismo en "id_producto":       ya que con ID producto identificamos el producto a modificar)
      BODY:
        {
          "producto": "ProductoEditado",
          "descripcion": "nuevo producto editado\r\n",
          "precio": 7000,
          "id_producto": 5 
        }

  URL (GET):
    Para traer solo un producto:    localhost/TrabajoEntrega3/api/producto/12    (o cualquier otro ID)  
    Para traer todos los productos:    localhost/TrabajoEntrega3/api/productos/
    
    Para traer todos los productos de la categoria 1 (autos):    localhost/TrabajoEntrega3/api/productos/1
    Para traer todos los productos de la categoria 2 (motos):    localhost/TrabajoEntrega3/api/productos/2

    Para traer una lista de productos ordenada por precio de forma ascendente:    localhost/TrabajoEntrega3/api/productos?sort=precio&order=asc
    
    Para traer una lista de productos ordenada por precio de forma descendente:    localhost/TrabajoEntrega3/api/productos?sort=precio&order=desc

    (Para traer un producto o borrarlo es "producto" sin 's', ya q con 's' es para las categorias)

  URL(DELETE): localhost/TrabajoEntrega3/api/producto/5 (o cualquier otro id)


