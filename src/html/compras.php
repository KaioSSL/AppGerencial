<?php
    include_once('../php/objetos/Authentication.php');
    $aut = new Authentication();
    $aut->authenticate_login();
?>
<html>
    <head>
        <title>Compras - Principal</title>
        <link rel="stylesheet" href="../css/view_vendas.css">
        <script src='../js/navBarController.js'></script>
        <script>    
            function get_data(){
                var filtros = 'BUY_COD='+document.getElementById('BUY_COD').value 
                            + '&'+
                            'BUY_DAT_CAD_INI=' + document.getElementById('BUY_DAT_CAD_INI').value
                            + '&'+
                            'BUY_DAT_CAD_FIM=' + document.getElementById('BUY_DAT_CAD_FIM').value
                            + '&'+
                            'FOR_COD=' + document.getElementById('FOR_COD').value
                            + '&'+
                            'INS_COD=' + document.getElementById('INS_COD').value
                            + '&'+
                            'AMZ_COD=' + document.getElementById('AMZ_COD').value;
                var url = 'comprasController.php'                            ;
                get_table_data(filtros,url);
            }     
            function perfil_buy(buy_cod){
                location.href = 'buy_perfil.php?BUY_COD='+buy_cod;
            } 
        </script>
        
    </head>
    <body onload="get_data()">
        <?php
            include 'navBar.php';
        ?>
        <div class='div_filter' >
            <div class='filter_header' onclick='show_filter_body()' id='filter_header'>
                <spam class='filter_title'>Filtros</spam>
            </div>
            <div class='filter_body' id='filter_body'>
                    <spam class='filter_label'>Código</spam>
                    <input type='text' id='BUY_COD' name='BUY_COD' class='filter_input'>
                    <spam class='filter_label'>Data Compra Inicio</spam>
                    <input type='date' id='BUY_DAT_CAD_INI' name='BUY_DAT_CAD_INI' class='filter_input'>
                    <spam class='filter_label'>Data Compra Fim</spam>
                    <input type='date' id='BUY_DAT_CAD_FIM' name='BUY_DAT_CAD_FIM' class='filter_input'>
                    <spam class='filter_label'>Cod. Fornecedor</spam>
                    <input type='text' id='FOR_COD' name='FOR_COD' class='filter_input'>
                    <spam class='filter_label'>Cód. Insumo</spam>
                    <input type='text' id='INS_COD' name='INS_COD' class='filter_input'>
                    <spam class='filter_label'>Cód. Armazem</spam>
                    <input type='text' id='AMZ_COD' name='AMZ_COD' class='filter_input'>
                    <br>
                    <input type ='button' class='btn' id='pesquisar' name='pesquisar' value='Pesquisar' onclick='get_data()'>
                    <input type='button' onclick='clean_filtro' value = 'Limpar' class='btn'>
            </div>
        </div>
        <div class='table_data'>
            <div class='table' name='table_data' id='table_data'>
            </div>
        </div>
        <input type='button' id='cadastrar' name='cadastrar' class='btn' value='Cadastrar' onclick="location.href = 'cadastroCompras.php'">

    </body>

</html>