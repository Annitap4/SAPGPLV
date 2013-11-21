<h1 class="title">Puntos Libres</h1>
<div class="entry">
	<table class="tabla">
		<tr>
			<th>Nombre</th>
			<th>Cód Postal</th>
			<th>Cap</th>
			<th>Encargado</th>
			<th>Estado</th>
			<th>Municipio</th>
			<th>Parroquia</th>
			<th></th>
		</tr>
		<?php foreach ($puntos as $puntos_item): ?>
		<tr align="center">
			<td><?php echo $puntos_item['nombrePunto'] ?></td>
			<td><?php echo $puntos_item['cod_postal'] ?></td>
			<td><?php echo $puntos_item['capacidad'] ?></td>
			<td><?php echo $puntos_item['nombre_encargado'] ?>&nbsp;<?php echo $puntos_item['apellido_encargado'] ?></td>
			<td><?php echo $puntos_item['nombreE'] ?></td>
			<td><?php echo $puntos_item['nombreM'] ?></td>
			<td><?php echo $puntos_item['nombreP'] ?></td>
			<td align="center"><a href="<?php echo base_url('index.php/puntos/edit/'.$punto_item['idPunto'].'');?>"><img src="<?php echo base_url('application/views/templates/images/editar1.png')?>" /></a>&nbsp;<a href="<?php echo base_url('index.php/puntos/delete/'.$puntos_item['idPunto'].'');?>"><img src="<?php echo base_url('application/views/templates/images/eliminar.png')?>" /></a></td>
		</tr>
		<?php endforeach ?>
	</table>
</div>


