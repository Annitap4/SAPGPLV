<div class="entry">
<div align="center">
<?php echo validation_errors(); ?>
<?php echo form_open('personas/find_execute') ?>
<fieldset style="width: 218px; border:6px groove #ccc; background:#eef9ff;">
	<legend style="font-weight:bold; color:#303742; font-size: 18px;">Buscar Usuario</legend>
	<label for="cedula">Cedula</label><br />
	<input type="input" name="cedula" /><br />
	<input type="submit" name="submit" value="Buscar" />
</fieldset>
</div>
</form>
</div>
