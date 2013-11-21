<div class="entry">
<div align="center">
<?php echo validation_errors(); ?>
<?php echo form_open('trabajadores/edit_execute') ?>
<fieldset style="width: 218px; border:6px groove #ccc; background:#eef9ff;">
	<legend style="font-weight:bold; color:#303742; font-size: 18px;">Modificar Trabajador</legend>
	<label for="cedula">Cedula</label><br />
	<input type="input" name="cedula" value="<?php echo !isset($personas_item['cedula']) ? set_value('cedula') :  $personas_item['cedula']; ?>" readonly="readonly"/><br />
	<label for="nombre">Nombre</label><br />
	<input type="input" name="nombre" value="<?php echo !isset($personas_item['nombre']) ? set_value('nombre') :  $personas_item['nombre']; ?>" /><br />
	<label for="apellido">Apellido</label><br />
	<input type="input" name="apellido" value="<?php echo !isset($personas_item['apellido']) ? set_value('apellido') :  $personas_item['apellido']; ?>" /><br />
	<label for="cedula_encargado">Teléfono</label><br />
	<input type="input" name="tlf" id="tlf" value="<?php echo !isset($personas_item['tlf']) ? set_value('tlf') :  $personas_item['tlf']; ?>"/><br />
	<label for="cedula_encargado">Correo</label><br />
	<input type="input" name="correo" id="correo" value="<?php echo !isset($personas_item['correo']) ? set_value('correo') :  $personas_item['correo']; ?>"/><br />
	<input type="submit" name="submit" value="Modificar" />
</fieldset>
</div>
</form>
</div>