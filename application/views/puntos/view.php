<div class="entry">
<div align="center">
<fieldset style="width: 218px; border:6px groove #ccc; background:#eef9ff;">
	<legend style="font-weight:bold; color:#303742; font-size: 18px;">Ver Punto Libre</legend>
        <br /><strong>Nombre: </strong><?php echo $punto_item['nombrePunto'];?><br /><br />
        <strong>Capacidad: </strong> <?php echo $punto_item['capacidad'];?><br /><br />
        <strong>Cédula Encargado: </strong> <?php echo $punto_item['cedula_encargado'];?> <br /><br />
        <strong>Nombre Encargado: </strong> <?php echo $punto_item['nombre_encargado'];?>&nbsp;<?php echo $punto_item['apellido_encargado'];?> <br /><br />
        <strong>Estado: </strong> <?php echo $punto_item['nombreE'];?> <br /><br />
        <strong>Municipio: </strong> <?php echo $punto_item['nombreM'];?> <br /><br />
        <strong>Parroquia: </strong> <?php echo $punto_item['nombreP'];?> <br /><br />
        <strong>C&oacute;digo Postal: </strong> <?php echo $punto_item['cod_postal'];?> <br /><br />
        <a href="<?php echo base_url('index.php/puntos/edit/'.$punto_item['idPunto'].'');?>"><img src="<?php echo base_url('application/views/templates/images/editar1.png')?>" /></a>&nbsp;<a href="<?php echo base_url('index.php/puntos/delete/'.$puntos_item['idPunto'].'');?>"><img src="<?php echo base_url('application/views/templates/images/eliminar.png')?>" /></a>
</fieldset>
</div>
</form>
</div>