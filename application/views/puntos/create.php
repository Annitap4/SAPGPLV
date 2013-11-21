<div class="entry">
	<div align="center">
	<?php echo validation_errors(); ?>
	<?php echo form_open('puntos/create') ?>
	<fieldset style="width: 500px; border:6px groove #ccc; background:#eef9ff;">
		<legend style="font-weight:bold; color:#303742; font-size: 18px;">Registrar Nuevo Punto Libre</legend><br />
		<table style="">
			<tr>
				<td style="font-weight:bold">Nombre</td>
				<td><input type="input" name="nombre" class="ui-corner-all ui-state-focus" value="<?php echo set_value('nombre'); ?>" style="width: 250px;" /></td>
			</tr>
			<tr>
				<td style="font-weight:bold">Capacidad</td>
				<td><input type="input" name="capacidad" class="ui-state-focus ui-corner-all" value="<?php echo set_value('capacidad'); ?>" style="width: 250px;"/></td>
			</tr>
			<tr>
				<td style="font-weight:bold">C&eacute;dula de la Persona Encargada</td>
				<td><input type="input" name="cedula_encargado" id="cedula_encargado" class="ui-corner-all ui-state-focus" value="<?php echo set_value('cedula_encargado'); ?>" style="width: 250px;"/></td>
			</tr>
			<tr>
				<td style="font-weight:bold;">Estado</td>
				<td>
					<select id="estado" class="ui-corner-all ui-state-focus" name="estado" style="width: 250px;">
						<option value="">Seleccione</option>
					<?php foreach ($estados as $estados_item): ?>
						<option value="<?php echo $estados_item['id'] ?>"><?php echo $estados_item['nombre'] ?></option>
					<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="font-weight:bold">Municipio</td>
				<td id="municipio"></td>
			</tr>
			<tr>
				<td style="font-weight:bold">Parroquia</td>
				<td id="parroquia"></td>
			</tr>
			<tr>
				<td style="font-weight:bold">C&oacute;digo Postal</td>
				<td><input type="input" name="cod_postal" class="ui-corner-all ui-state-focus" style="width: 250px;" value="<?php echo set_value('cod_postal'); ?>"/></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Registrar Punto Libre" id="button" class="ui-corner-all" style="height: 25px; padding: 0 0 0 0; font-size: 14px;"/></td>
			</tr>
		</table>
		</fieldset>
	</form>
	</div>
	<script>
		$( "#button" ).button();
		$('select[name=estado]').change(function(){
			$('#municipio').empty();
			$('#parroquia').empty();
        
			if($(this).val()!=''){
	
			    $.ajax({
			        url: '<?=site_url('ajax/buscarMunicipios')?>',
			        type:'GET',
			        dataType: 'json',
			        data: 'estado='+$(this).val() ,
			        success: function(output_string){
			                    $('#municipio').empty();
			                    $('#municipio').append(output_string);
			                } // End of success function of ajax form
			            }); // End of ajax call		            
		        }
		});
    
		function buscarParroquias(){
        
		      $('#parroquia').empty();
        
			if($('select[name=municipio]').val()!=''){
 
			    $.ajax({
			        url: '<?=site_url('ajax/buscarParroquias')?>',
			        type:'GET',
			        dataType: 'json',
			        data: 'id='+$('select[name=municipio]').val() ,
			        success: function(output_string){
			                    $('#parroquia').empty();
			                    $('#parroquia').append(output_string);
			                } // End of success function of ajax form
			    }); // End of ajax call
			    
			}
		}	
	</script>
</div>


