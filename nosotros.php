<?php 

    require 'includes/funciones.php';

    $inicio = true;
    incluirTemplate('header');
?>


    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>25 Años de Experiencia</blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus vitae architecto voluptatibus, ipsa unde repellat dolore corporis sit commodi? Tempore id voluptas, expedita aliquam non illo quae quis voluptatem veritatis.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis vero nihil alias quod sed pariatur est placeat laborum ab numquam velit nobis totam modi, suscipit error ratione tempora iste dolorum.</p>

            </div>
        </div>

    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus est sapiente provident. Dolorum corporis expedita quasi quos, quae ducimus. Architecto nemo earum labore ex soluta iste excepturi hic repudiandae repellendus.</p>
            </div><!--cierre icono-->
        

            <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus est sapiente provident. Dolorum corporis expedita quasi quos, quae ducimus. Architecto nemo earum labore ex soluta iste excepturi hic repudiandae repellendus.</p>
            </div><!--cierre icono-->

            <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
            <h3>Tiempo</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus est sapiente provident. Dolorum corporis expedita quasi quos, quae ducimus. Architecto nemo earum labore ex soluta iste excepturi hic repudiandae repellendus.</p>
            </div><!--cierre icono-->
        </div><!--cierre iconos-nosotros-->
    </section>

<?php 
incluirTemplate('footer');
?>
