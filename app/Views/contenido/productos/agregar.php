
<div class="w-25">
<?php
     helper('form');
    if($success){
        echo 'Producto agregado';
    }
    
if($validation){
    
    foreach($validation as $val_error){
        echo '<div class="alert alert-danger" role="alert">';
        echo $val_error;
        echo '</div>';
    }
}
?>
</div>

<?php echo form_open_multipart("productos/registrar_producto")?>
    <h2>Ingresar datos del producto</h2>

    <label>Nombre</label>
    <input type="text" name="nombre"></input>
    <br>

    <label>Codigo</label>
    <input type="text" name="codigo"></input>
    <br>
     
    <h3>Marca</h3>
    <label for="">royal</label>
    <input type="radio" name="marca" value="royal">
    <br>
    <label for="">pedigree</label>     
    <input type="radio" name="marca" value="pedigree">
    <br>

    <label for="">Peso</label>
    <input type="number" name="peso">
    <br>
     
    <label for="">Precio</label>
    <input type="number" name="precio">

    <h3>Categoria</h3>
    <label for="">Accesorio</label>
    <input type="radio" name="categoria">
    <label for="">alimento</label>
    <input type="radio" name="categoria">

    <h3>Mascota</h3>
    <label for="">perro</label>
    <input type="radio" name="mascota" value="perro">
    <br>
    <label for="">gato</label>
    <input type="radio" name="mascota" value="gato">
    <br>
     
    <label for="">imagen</label>
    <input type="file" name="imagen" size="20">
    
    <input type="submit" value="registrar">
<?php form_close(); ?>
