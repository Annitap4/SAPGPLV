<div class="entry">
 <div align="center">
   <h1>Bienvenido/a</h1><br />
   <h2><?php echo $nombre; ?>&nbsp;<?php echo $apellido; ?></h2>
   <?php if ($nivel == 3){
     echo '<h4> Administrador</h4>';
   }elseif ($nivel == 2){
    echo '<h4> Encargado</h4>';
   } elseif ($nivel == 1){
    echo '<h4> Trabajador</h4>';
   }
   
   ?>
   <img src="<?php echo base_url('application/views/templates/images/user2.png')?>" />
 </div>
</div>

