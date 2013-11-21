<h1 class="title">Trabajadores</h1>
<div class="entry">
<table class="tabla">
	<tr>
		<th>C&eacute;dula</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Tel&eacute;fono</th>
		<th>Correo</th>
		<th>Punto Libre</th>
		<th></th>
	</tr>
	<?php foreach ($personas as $personas_item): ?>
	<tr align="center">
		<td><?php echo $personas_item['cedula'] ?></td>
		<td><?php echo $personas_item['nombreT'] ?></td>
		<td><?php echo $personas_item['apellido'] ?></td>
		<td><?php echo $personas_item['tlf'] ?></td>
		<td><?php echo $personas_item['correo'] ?></td>
		<td><?php echo $personas_item['nombreP'] ?></td>
		<td align="center"><a href="<?php echo base_url('index.php/trabajadores/edit/'.$personas_item['cedula'].'');?>"><img src="<?php echo base_url('application/views/templates/images/editar1.png')?>" /></a>&nbsp;<a href="<?php echo base_url('index.php/trabajadores/delete/'.$personas_item['cedula'].'');?>"><img src="<?php echo base_url('application/views/templates/images/eliminar.png')?>" /></a></td>
	</tr>
	<?php endforeach ?>
</table>
</div>
	


