
    <!---
    NAV BAR BASADO EN BOOTSTRAP

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <div class="container-fluid justify-content-between collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href=" <?php echo base_url('comercializacion') ?> ">Comercializacion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" <?php echo base_url('catalogo') ?> ">Catalogo</a>
                        </li>

                    </ul>
                </div>

                <a class="navbar-brand text-logo" href=" <?php echo base_url('principal') ?> ">Fedora</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="container-fluid justify-content-around collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                            <a class="nav-link" href=" <?php echo base_url('quienes_somos') ?> ">Nosotros</a>
                        </li>

                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Preguntas frecuentes
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href=" <?php echo base_url('consultas') ?> ">Consultas</a></li>
                            <li><a class="dropdown-item" href=" <?php echo base_url('terminos') ?> ">Terminos y condiciones</a></li>
                            <li><a class="dropdown-item" href=" <?php echo base_url('contacto') ?> ">contactos</a></li>
                            <li><a class="dropdown-item" href=" <?php echo base_url('quienes_somos') ?> ">contactos</a></li>
                        </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
        --->

        <!-- CUSTOM NAV BAR-->
        <nav class="cs-navbar">
            <div class="cs-left-elements">
                <a class="cs-navbar-link" href=" <?php echo base_url('catalogo') ?> ">Catalogo</a>
                <a class="cs-navbar-link" href=" <?php echo base_url('comercializacion') ?> ">Entregas</a>
            </div>
            <a class="cs-navbar-fedora-logo cs-navbar-link" href="  <?php echo base_url('principal') ?>  "> Fedora </a>
            <div class="cs-right-elements">
                <a class="cs-navbar-link" href=" <?php echo base_url('quienes_somos') ?> ">Nosotros</a>
                <a class="cs-navbar-link" href=" <?php echo base_url('terminos') ?> ">Terminos</a>
            </div>           
        </nav>

    </header>