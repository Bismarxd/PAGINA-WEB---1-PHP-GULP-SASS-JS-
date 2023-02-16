<?php 

    require '../../includes/funciones.php';
    $auth = estaAutenticado();


    if (!$auth) {
        header('Location: /');
    }


    //Validar la URL por ID valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('location: /admin');
    }

    //Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    //Obtener los datos de la propiedad
    $consulta = "SELECT * FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db, $consulta);
    $propiedad = mysqli_fetch_assoc($resultado);

    //Consultar Par obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //Arreglo con mensajes de errores
    $errores = [];


    
    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedorId = $propiedad['vendedorId'];
    $imagenPropiedad = $propiedad['imagen'];


    //Ejecutar el código de que el usuario envia el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo"<pre>";
    // var_dump($_POST);
    // echo"</pre>";


    

    $titulo = mysqli_real_escape_string($db,$_POST['titulo']) ; //mysqli_real_escape_string sanitisa los dtos ingresados
    $precio = mysqli_real_escape_string($db, $_POST['precio']) ;
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);  
    $habitaciones =  mysqli_real_escape_string($db, $_POST['habitaciones']) ;
    $wc =  mysqli_real_escape_string($db,$_POST['wc']);
    $estacionamiento = $_POST['estacionamiento'];
    $vendedorId =  mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');

    //Files hacia una variable
    $imagen = $_FILES['imagen'];

    if (!$titulo) {
        $errores[] = "Debes añadir un titulo";
    }

    if (!$precio) {
        $errores[] = "El Precio es Obligatorio";
    }

    if (strlen($descripcion)<50) {
        $errores[] = "La descripcion es Obligatoria y debe tener al menos 50 caracteres";
    }

    if (!$habitaciones) {
        $errores[] = "El Número de Habitaciones es Obligatorio";
    }

    if (!$wc) {
        $errores[] = "El Número de Baños es Obligatorio";
    }
    if (!$estacionamiento) {
        $errores[] = "El Numero de Estacionamiento es Obligatorio";
    }
    if (!$vendedorId) {
        $errores[] = "Elige un vendedor";
    }
    // if (!$imagen['name'] || $imagen['error']) {
    //     $errores[] = "La Imagen es Obligatoria";
    // }

    //Validar por tamaño(100kb maximo)

    // $medida = 1000*100;

    // if ($imagen['size'] > $medida) {
    //     $errores[] = 'La Imagen es muy pesada';
    // }

   


    //  echo"<pre>";
    // var_dump($errores);
    // echo"</pre>";

    //Revisar que el array de errores este vacio

    if (empty($errores)) {

        // //Subida de archivos

         // //Crear Carpeta
         $carpetaImagenes = '../../imagenes/';
        //  mkdir($carpetaImagenes);
 
         if (!is_dir($carpetaImagenes)) {
             mkdir($carpetaImagenes);
         }

         $nombreImagen = '';

        //borrar la imagen anterior

        if ($imagen['name']) {
            //eliminar la imagen previa

            unlink($carpetaImagenes.'/'.$propiedad['imagen'].'.jpg');

                // //Generar un nombre único
            $nombreImagen = md5( uniqid(rand(), true)) . ".jpg";

            // //Subir Imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen . ".jpg" );
        } else {
            $nombreImagen = $propiedad['imagen'];
        }


       

         //Insertar en la base e datos
    $query = " UPDATE propiedades SET titulo = '${titulo}', precio = '${precio}', imagen = '${nombreImagen}', descripcion = '${descripcion}',
                habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedorId = ${vendedorId} WHERE id = ${id} ";

    //echo $query;

    $resultado = mysqli_query($db, $query);

    if ($resultado) {
       //Redireccionar al usuario

       header('Location: /admin?resultado=2');
       
    } 
    
    }


   
}

    incluirTemplate('header');
?>


    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>    

        <a href="/admin" class="boton-verde">Volver</a>


        <?php foreach($errores as $error): ?>
            <div class="alerta error">
            <?php echo $error;?>
            </div>
            
        <?php endforeach; ?>

        <!--Get mostrar atos en la url-->
        <!--POST obtener los datos de forma segura-->

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <img src="/imagenes/<?php echo $imagenPropiedad?>.jpg " class="imagen-small">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej:3" min="1" max"9" value="<?php echo $habitaciones;?>">

                <label for="wc">Baños:</label>
                <input type="number" name="wc" id="wc" placeholder="Ej:3" min="1" max"9" step="1" value="<?php echo $wc;?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej:3" min="0" max"9" step="0" value="<?php echo $estacionamiento;?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option value="">--Seleccione--</option>
                   <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                    <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor["id"]?>"> <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?> </option>
                    <?php endwhile ?>"
                </select>
            </fieldset>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
    </main>
    
    <?php 
incluirTemplate('footer');
?>