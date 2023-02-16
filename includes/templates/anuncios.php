<?php
    //Importar la conexion
    require __DIR__ . '/../config/database.php';
    $db = conectarDB();

    //Consultar
    $query = "SELECT * FROM propiedades LIMIT ${limite}";


    //Obtener Resultado
    $resultado = mysqli_query($db, $query);


    //Funcion que pone limite a la descripcion
    function truncate(string $texto, int $cantidad) : string
    {
        if(strlen($texto) >= $cantidad) {
            return substr($texto, 0, $cantidad) . "...";
        } else {
            return $texto;
        }
    }

?>


<div class="contenedor-anuncio">
           
         <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>

           <div class="anuncio">
              
                <img loading ="lazy" src="/imagenes/<?php echo $propiedad['imagen'] . ".jpg"; ?>" alt="anuncio">
               <div class="contenido-anuncio">
                   <h3><?php echo $propiedad['titulo'] ; ?></h3>
                   <p><?php echo  truncate($propiedad['descripcion'], 30); ?></p>
                   <p class="precio"><?php echo "$" . $propiedad['precio'] ; ?></p>

                   <ul class="iconos-caracteristicas">
                       <li>
                           <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                           <p><?php echo $propiedad['wc'] ; ?></p>
                       </li>
                       <li>
                           <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" >
                           <p><?php echo $propiedad['estacionamiento'] ; ?></p>
                       </li>
                       <li>
                           <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                           <p><?php echo $propiedad['habitaciones'] ; ?></p> 
                       </li>
                   </ul>

                   <a href="anuncio.php?id=<?php echo $propiedad['id'] ; ?>" class="boton-amarillo-block">
                       Ver Propiedad
                   </a>

               </div><!--contenido-anuncio-->
           </div><!--anuncio-->

           <?php endwhile; ?>

       </div><!--contenedor-anuncio-->

<?php
    //Cerrar la Conexion
    mysqli_close($db);

?>