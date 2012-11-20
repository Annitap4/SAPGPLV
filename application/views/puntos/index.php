<h1 class="title">Puntos Libres</h1>
<div class="entry">
	<table class="mytable">
		<tr>
			<th>Nombre</th>
			<th>Código Postal</th>
			<th>Capacidad</th>
			<th>Encargado</th>
			<th>Ubicaci&oacute;n</th>
			<th>Administrar</th>
		</tr>
		<?php foreach ($puntos as $puntos_item): ?>
		<tr align="center">
			<td><?php echo $puntos_item['nombre'] ?></td>
			<td><?php echo $puntos_item['cod_postal'] ?></td>
			<td><?php echo $puntos_item['capacidad'] ?></td>
			<td><?php echo $puntos_item['cedula_encargado'] ?></td>
			<td><?php echo $puntos_item['id_parroquia'] ?></td>
			<td align="center"><a href="personas/<?php echo $personas_item['cedula'] ?>"><img src="<?php echo base_url('application/views/templates/images/editar1.png')?>" /></a>&nbsp;<a href="personas/<?php echo $personas_item['cedula'] ?>"><img src="<?php echo base_url('application/views/templates/images/eliminar.png')?>" /></a></td>
		</tr>
		<?php endforeach ?>
	</table>
</div>


