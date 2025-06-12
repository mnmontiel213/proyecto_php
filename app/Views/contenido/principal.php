
<div>
    <!-- CAROUSEL -->
    <div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo base_url("assets/img/banner-example.png") ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo base_url("assets/img/banner-example.png") ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo base_url("assets/img/banner-example.png") ?>" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>

    
    <!-- ULTIMOS PRODUCTOS AGREGADOS -->
    <!-- Aca deberiamos recibir productos desde la base de datos 
         almenos 6 podrian entrar    -->
    <div id="custom-productos" class="container">
        <h2>Ultimos productos</h2>

        <ul id="ultimos-productos-lista"> 
            <li class="ultimo-producto-item">
                <a href="#"><img src=" <?php echo base_url("/assets/img/producto.png") ?> "></a>
            </li>
            <li class="ultimo-producto-item">
                <a href="#"><img src=" <?php echo base_url("/assets/img/producto.png") ?>"></a>
            </li>
            <li class="ultimo-producto-item">
                <a href="#"><img src=" <?php echo base_url("/assets/img/producto.png") ?>"></a>
            </li>
            <li class="ultimo-producto-item">
                <a href="#"> <img src=" <?php echo base_url("/assets/img/producto.png") ?>"></a>
            </li>
        </ul>

        <a href="productos">Ver mas</a>

    </div>

    <!-- SERVICIOS SALUD -->
     <div id="custom-seccion-salud" class="container">
        <h2>Cuidados para tu mascota</h2>
        <p>Le otorgamos los mejores cuidados a tu mascota</p>
        
        <ul>
            <!----------------------------NOTA------------------------------->
            <!-- Podriamos dividir los cuidados de las mascotas en 3 tipos -->
            <!-- Salud seria cosas como vacunacion castracion etc -->
            <!-- Estetica baños, cortar el pelo y uñas -->
            <!-- Otros podrian ser consultas, emergencias, o cosas mas especificas #
             tipo turno radiografia etc -->

            <!-- Estas tarjetas dan un poco de informacion, clickearlas te llevan a la pagina #
             de servicios y seccion especifica expandiendo los servicios de cada seccion -->
            <!-- Pedir turno nos llevaria a otra pagina donde llenariamos todos los datos en un
             formulario -->
            
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Estetica</h5>
                    <p class="card-text">Nos encargamos de darle el mejor look a tu mascota.</p>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Salud</h5>
                    <p class="card-text">Atendemos a tu mascota para darle la atencion que requiera.</p>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Otros</h5>
                    <p class="card-text"> Ofrecemos otros servicios que tu mascota pueda requerrir.</p>
                </div>
            </div>
        </ul>


    </div>

    
    <!-- ELEGUIR FILTRO MASCOTA -->
    <div id="custom-seccion-filtro" class="container p-3">
        <!-- NOTA -->
        <!-- Aca elegiriamos perros o gatos e iriamos a la pagina de productos pero filtrando en base a la eleccion -->
        <h2>Productos para tu mascota</h2>
        <div class="d-flex justify-content-center">
            <div class="">
                <h3>Perros</h3>
                <a href=""><img class="w-50 rounded-3" src=" <?php echo base_url('assets/img/carta-perro.png') ?>  " alt=""></a>
            </div>

            <div class="">
                <h3>Gatos</h3>
                <a href=""><img class="w-50 rounded-3" src=" <?php echo base_url('assets/img/carta-gato.png') ?>" alt=""></a>
            </div>
        </div>

    </div>

</div>