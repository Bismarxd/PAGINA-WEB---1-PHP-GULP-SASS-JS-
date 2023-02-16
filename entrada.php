<?php 

    require 'includes/funciones.php';

    incluirTemplate('header');
?>



    <main class="contenedor seccion contenido-centrado ">
        <h1>Guia Para la Decoración de tu Hogar</h1>

        <p class="informacion-meta">Escrito el: <span>10/08/2022</span> por: <span>Admin</span></p>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading ="lazy" src="build/img/destacada2.jpg" alt="imagen de la propiedad">
        </picture>

        <div class="resumen-propiedad">
            
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti ea similique voluptates, rerum ducimus corporis. Odit architecto perferendis esse obcaecati reiciendis cupiditate voluptates quia, repellendus incidunt, non aliquam dignissimos temporibus!</p>
             <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam quae facere culpa, consequuntur voluptatum quaerat incidunt est. Laudantium maxime cupiditate perferendis, corporis quam, iste assumenda ducimus animi cum reiciendis labore!</p>

        </div>
    </main>
    
    <?php 
incluirTemplate('footer');
?>