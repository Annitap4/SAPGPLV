
<table class="mytable">
    <tr>
	<th>C&eacute;dula</th>
	<th>Nombre</th>
	<th>Apellido</th>
	<th>Tel&eacute;fono</th>
	<th>Correo</th>
	<th></th>
    </tr>
	<?php foreach ($personas as $personas_item): ?>
	<tr align="center">
	<td><?php echo $personas_item['cedula'] ?></td>
	<td><?php echo $personas_item['nombre'] ?></td>
	<td><?php echo $personas_item['apellido'] ?></td>
	<td><?php echo $personas_item['tlf'] ?></td>
	<td><?php echo $personas_item['correo'] ?></td>
	<td align="center"><a href="personas/edit/<?php echo $personas_item['cedula'] ?>"><img src="<?php echo base_url('application/views/templates/images/editar1.png')?>" /></a>&nbsp;<a href="personas/delete/<?php echo $personas_item['cedula'] ?>"><img src="<?php echo base_url('application/views/templates/images/eliminar.png')?>" /></a></td>
</tr>
<?php endforeach ?>
</table>
<ul id="pagination-digg">
<?=$pag_links;?>
</ul>