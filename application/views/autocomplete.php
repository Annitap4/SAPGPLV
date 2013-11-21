<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>jQuery UI Autocomplete Ejemplo</title>    
        <script type="text/javascript" src="<?php echo base_url(); ?>application/views/js/jquery-1.8.2.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>application/views/js/jquery-ui-1.9.1.custom.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('#autocomplete').autocomplete({source:'<?php echo site_url('autocomplete/ajax'); ?>'});
        });
        </script>
    </head>
    <body>
    <p><label for='autocomplete'>Nombre de Usuario: </label><input type='text' id='autocomplete'></p>
    </body>
</html>