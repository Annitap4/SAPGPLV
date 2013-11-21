<div class="entry">
<div align="center">
<fieldset style="width: 218px; border:6px groove #ccc; background:#eef9ff;">
	<legend style="font-weight:bold; color:#303742; font-size: 18px;">Ver Trabajador</legend>
        <br /><strong>Cedula: </strong><?php echo $personas_item['cedula'];?><br /><br />
        <strong>Nombre: </strong> <?php echo $personas_item['nombre'];?> <?php echo $personas_item['apellido'];?><br /><br />
        <strong>Telefono: </strong> <?php echo $personas_item['tlf'];?> <br /><br />
        <strong>Correo: </strong> <?php echo $personas_item['correo'];?> <br /><br />
        <a href="<?php echo base_url('index.php/trabajadores/edit/'.$personas_item['cedula'].'');?>"><img src="<?php echo base_url('application/views/templates/images/editar1.png')?>" /></a>&nbsp;<a href="<?php echo base_url('index.php/trabajadores/delete/'.$personas_item['cedula'].'');?>"><img src="<?php echo base_url('application/views/templates/images/eliminar.png')?>" /></a>
</fieldset>
</div>
</form>
</div>