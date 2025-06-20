<?php helper('form'); ?>

<div class="row m-5">
    <div class="col-lg-3 col-md-12 mb-4">
        <form action="<?= base_url("productos") ?>" method="get">
            <div class="accordion" id="filtroAccordion">
                <!-- Mascotas -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingMascotas">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMascotas" aria-expanded="true" aria-controls="collapseMascotas">
                            Mascotas
                        </button>
                    </h2>
                    <div id="collapseMascotas" class="accordion-collapse collapse show" aria-labelledby="headingMascotas">
                        <div class="accordion-body">
                            <ul class="list-group">
                                <?php foreach ($categorias['mascotas'] as $mascota): ?>
                                    <li class="list-group-item">
                                        <?= form_radio('eleccion-mascota', $mascota, false, ['id' => 'm_' . $mascota]) ?>
                                        <?= form_label(ucfirst(strtolower($mascota)), 'm_' . $mascota) ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Productos -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingProductos">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProductos" aria-expanded="false" aria-controls="collapseProductos">
                            Productos
                        </button>
                    </h2>
                    <div id="collapseProductos" class="accordion-collapse collapse" aria-labelledby="headingProductos">
                        <div class="accordion-body">
                            <ul class="list-group">
                                <?php foreach ($categorias['productos'] as $producto): ?>
                                    <li class="list-group-item">
                                        <?= form_radio('eleccion-producto', $producto, false, ['id' => 'p_' . $producto]) ?>
                                        <?= form_label(ucfirst(strtolower($producto)), 'p_' . $producto) ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-p mt-3 w-100">Filtrar</button>
        </form>
    </div>

    <!-- PRODUCTOS  -->
    <div class="col-lg-9 col-md-12">
        <div class="productos-grid">
            <?php foreach ($productos as $producto): ?>
                <div class="card card-producto">
                    <!-- Imagen -->
                    <?php
                    $imgSrc = $producto['IMAGEN']
                        ? base_url('assets/uploads/' . $producto['IMAGEN'])
                        : base_url('assets/img/productos/prod1.png');
                    ?>
                    <img src="<?= esc($imgSrc) ?>" class="card-img-top card-img-center" alt="<?= esc($producto['NOMBRE']) ?>">

                    <!--  -->
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($producto['NOMBRE']) ?></h5>
                        <p class="card-text text-muted">$<?= esc($producto['PRECIO']) ?></p>
                        <p class="card-text text-muted">Peso: <?= esc($producto['PESO']) ?>kg</p>

                        <?php if (session('LOGGED')): ?>
                            <?= form_open('carrito/update') ?>
                            <?= form_hidden('codigo', $producto['CODIGO']) ?>
                            <?= form_hidden('nombre', $producto['NOMBRE']) ?>
                            <?= form_hidden('precio', $producto['PRECIO']) ?>
                            <?php if ($producto['IMAGEN']) echo form_hidden('imagen', $producto['IMAGEN']); ?>

                            <div class="d-flex justify-content-between mt-2">
                                <button type="submit" value="agregar" name="carrito-accion" class="btn btn-sm btn-success">
                                    <i class="bi bi-plus-circle"></i>
                                </button>
                                <button type="submit" value="remover" name="carrito-accion" class="btn btn-sm btn-danger">
                                    <i class="bi bi-dash-circle"></i>
                                </button>
                            </div>
                            <?= form_close() ?>
                        <?php else: ?>
                            <a href="<?= base_url('login/ingresar') ?>" class="btn btn-p w-100 mt-2">Ingresar</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>