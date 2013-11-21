	<div class="entry">
		<div align="center">
		<?php echo validation_errors(); ?>
		<?php echo form_open('personas/create') ?>
		<fieldset style="width: 218px; border:6px groove #ccc; background:#eef9ff;">
			<legend style="font-weight:bold; color:#303742; font-size: 18px;">Registrar Nuevo Usuario</legend>
			<label for="cedula">Cedula</label><br />
			<input type="input" name="cedula" value="<?php echo set_value('cedula'); ?>"/><br />
			<label for="nombre">Nombre</label><br />
			<input type="input" name="nombre" value="<?php echo set_value('nombre'); ?>" /><br />
			<label for="apellido">Apellido</label><br />
			<input type="input" name="apellido" value="<?php echo set_value('apellido'); ?>"/><br />
			<label for="cedula_encargado">Teléfono</label><br />
			<input type="input" name="tlf" id="tlf" value="<?php echo set_value('tlf'); ?>"/><br />
			<label for="cedula_encargado">Correo</label><br />
			<input type="input" name="correo" id="correo" value="<?php echo set_value('correo'); ?>"/><br />
			<input type="submit" name="submit" value="Registrar" />
		</fieldset>
		</div>
		</form>
	</div>
