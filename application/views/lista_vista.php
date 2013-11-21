<ul class="nav" id="nav1">
<?php
foreach($mensajes as $p){
?>
<li><?=$p->de;?>: <?=$p->mensaje;?></li><?php
}
?>
</ul>
<ul id="pagination-digg">
<?=$pag_links;?>
</ul>