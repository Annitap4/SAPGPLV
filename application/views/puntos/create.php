<h1 class="title">Crear un Nuevo Punto Libre</h1>
	<div class="entry">
		<?php echo validation_errors(); ?>
		<?php echo form_open('puntos/create') ?>
		<fieldset>
			<table alig="center" class="formulario" background="#E3E7ED">
				<tr>
					<td><label for="nombre">Nombre</label></td>
					<td><input type="input" name="nombre" /></td>
				</tr>
				<tr>
					<td><label for="cod_postal">Código Postal</label></td>
					<td><input type="input" name="cod_postal" /></td>
				</tr>
				<tr>
					<td><label for="capacidad">Capacidad</label></td>
					<td><input type="input" name="capacidad" /></td>
				<tr>
					<td colspan="2" aling="center"><input type="submit" name="submit" value="Crear Punto Libre" /></td>
				</tr>
			</table>
		</fieldset>
		</form>
	</div>


