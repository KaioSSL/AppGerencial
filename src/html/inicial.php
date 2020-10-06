<?php
    include_once('../php/objetos/Authentication.php');
    $aut = new Authentication();
    $aut->authenticate_login();
?>
<html>
    <head>
        <title>Armazens - Principal</title>
        <link rel="stylesheet" href="../css/view_vendas.css">
        <script src='../js/navBarController.js'></script>
        <script>     
        function get_data(){
                var filtros = 'AMZ_COD='+document.getElementById('AMZ_COD').value 
                            + '&'+
                            'AMZ_DAT_CAD_INI=' + document.getElementById('AMZ_DAT_CAD_INI').value
                            + '&'+
                            'AMZ_DAT_CAD_FIM=' + document.getElementById('AMZ_DAT_CAD_FIM').value
                            + '&'+
                            'AMZ_DES=' + document.getElementById('AMZ_DES').value;
                var url = 'armazemController.php';
                get_table_data(filtros,url);  
            };
        function perfilAmz(cod){
            location.href = 'armazemPerfil.php?'+'AMZ_COD='+cod
        }                     
                
        </script>
        
    </head>
    <body onload="get_data()">
        <?php
            include 'navBar.php';
        ?>
        <div class='table_data'>
            <div class='table' id='table_data' name='table_data'>
            </div>
        </div>

    </body>

</html>