<div class="entry">
<div align="center">
<?php echo validation_errors(); ?>
<?php echo form_open('personas/delete_execute') ?>
<fieldset style="width: 400px; border:6px groove #ccc; background:#eef9ff;">
	<legend style="font-weight:bold; color:#303742; font-size: 18px;">Eliminar Usuario</legend>
        <br /><strong>Confirma que desea eliminar al siguiente usuario:</strong><br /><br />
        <strong>Cedula: </strong><?php echo $personas_item['cedula'];?><br />
        <strong>Nombre: </strong> <?php echo $personas_item['nombre'];?> <?php echo $personas_item['apellido'];?><br /><br />
        <p style="color:#ff0000; font-size: 14px;">Recuerde que al eliminar el usuario perderá toda la información relacionada con él</p>
        <input type="hidden" value="<?php echo $personas_item['cedula'];?>" name="cedula" />
	<input type="submit" name="submit" value="Eliminar" />&nbsp;<a href="<?php echo base_url('index.php/personas/view/'.$personas_item['cedula'].'');?>"><input type="button" value="Cancelar" /></a>
</fieldset>
</div>
</form>
</div>