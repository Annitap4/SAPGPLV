<h1 class="title">Registrar un Nuevo Trabajador</h1>
	<div class="entry">
		<?php echo validation_errors(); ?>
		<?php echo form_open('trabajadores/create') ?>
		<fieldset>
			<table alig="center" class="formulario" background="#E3E7ED">
				<tr>
					<td><label for="cedula">Cedula</label></td>
					<td><input type="input" name="cedula" /></td>
				</tr>
                                <tr>
					<td><label for="nombre">Nombre</label></td>
					<td><input type="input" name="nombre" /></td>
				</tr>
				<tr>
					<td><label for="apellido">Apellido</label></td>
					<td><input type="input" name="apellido" /></td>
				<tr>
				<tr>
					<td><label for="cedula_encargado">Teléfono</label></td>
					<td><input type="input" name="tlf" id="tlf"/></td>
				</tr>
                                <tr>
					<td><label for="cedula_encargado">Correo</label></td>
					<td><input type="input" name="correo" id="correo"/></td>
				</tr>
				<tr>
					<td colspan="2" aling="center"><input type="submit" name="submit" value="Registrar" /></td>
				</tr>
			</table>
		</fieldset>
		</form>
	</div>
