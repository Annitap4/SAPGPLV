<html>
	<head>
		<?php error_reporting(0);
		$this->load->helper('url'); ?>
		<title><?php echo $title ?> - Punto Libre"</title>
		<meta name="author" content="Anna Lezama" />
		<meta name="keywords" content="Punto Libre" />
		<meta name="description" content="Punto Libre" />
		<meta name="classification" content="Punto Libre" />
		<meta name="distribution" content="global" />
		<meta name="robots" content="index, follow" />
		<meta name="revisit-after" content="1 month" />
		<link rel="shortcut icon" href="<?php echo base_url('application/views/templates/images/icono.png')?>" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url('application/views/templates/style.css') ?>" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url('application/views/redmond/jquery-ui-1.9.2.custom.css') ?>" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url('application/views/redmond/jquery-ui-1.9.2.custom.min.css') ?>" />
		<script type="text/javascript" src="<?php echo base_url(); ?>application/views/js/jquery-1.8.2.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>application/views/js/jquery-ui-1.9.1.custom.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#cedula_encargado').autocomplete({source:'<?php echo site_url('puntos/ajax'); ?>'});
			});
		$(document).ready(function() {
		$('#estado').change(function(){ // evento que al ser modificado el select estados es llamado
			var estado = $('#estado').val(); //obtenemos el estado seleccionado
			var pmunicipios = {source:'<?php echo site_url('puntos/municipios'); ?>'}; //filtramos por estado
			var smunicipios = '<option value=""></option>';
			$(pmunicipios).each(function(i){ //recorremos cada uno de los municipios previamente filtrados
				smunicipios += '<option value="'+this.id+'">'+this.nombre+'</option>'; //vamos  creando el select
			});
			$('#municipios').html(smunicipios); //el html generado se asigna al select de municipios
			$('#parroquias').html('');
		});
		$('#municipios').change(function(){
			var municipio = $('#municipio').val();
			var pparroquias = {source:'<?php echo site_url('puntos/parroquias'); ?>'};
			var sparroquias = '<option value=""></option>';
			$(pparroquias).each(function(i){
				sparroquias += '<option value="'+this.id+'">'+this.nombre+'</option>';
			});
			$('#parroquias').html(sparroquias);
			});
		});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
			$("#contenedor").load("<?php echo base_url() ?>index.php/personas/lista");
			$(document).on("click", "#pagination-digg li a", function(e){
			    e.preventDefault();
			   var href = $(this).attr("href");
			   $("#contenedor").load(href);
			}); 
			});	
		</script>
		<style type="text/css">
			#pagination-digg li{
			   border:0; margin:0; padding:0;
			IMAGEN    font-size:11px;
			   list-style:none;
			   margin-right:2px;
			}
			#pagination-digg a{
			   border:solid 1px #c6baa4;
			   margin-right:2px;
			}
			#pagination-digg .previous-off, #pagination-digg .next-off {
			   border:solid 1px #c6baa4;
			   color:#222222;
			   display:block;
			   float:left;
			   font-weight:bold;
			   margin-right:2px;
			   padding:3px 4px;
			}
			#pagination-digg .next a, #pagination-digg .previous a {
			   font-weight:bold;
			}
			#pagination-digg .active{
			   background:#c6baa4;
			   color:#FFFFFF;
			   font-weight:bold;
			   display:block;
			   float:left;
			   padding:4px 6px;
			}
			#pagination-digg a:link, #pagination-digg a:visited {
			   color:#222222;
			   display:block;
			   float:left;
			   padding:3px 6px;
			   text-decoration:none;
			}
			#pagination-digg a:hover{
			   border:solid 1px #222222
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<h1><img src="<?php echo base_url('application/views/templates/images/punto.png')?>" /></h1>
					<p>Punto Libre</p>
				</div>
			</div>
			<!-- end #header -->
			<div id="menu">
				<ul>
				</ul>
			</div>
	<!-- end #menu -->
	<div id="page">
		<div id="page-bgtop">
		<div id="page-bgbtm">
			<div id="content">
				<div class="post">
				<div class="post-bgtop">
				<div class="post-bgbtm">
