<?php
    include_once('../php/objetos/Authentication.php');
    $aut = new Authentication();
    $aut->authenticate_login();
?>
<html>
    <head>
        <title>Vendas - Principal</title>
        <link rel="stylesheet" href="../css/view_vendas.css">
        <script src='../js/navBarController.js'></script>
        <script>           
        </script>
        
    </head>
    <body>
        <?php
            include 'navBar.php';
        ?>
        <div class='div_filter' >
            <div class='filter_header' onclick='show_filter_body()' id='filter_header'>
                <spam class='filter_title'>Filtros</spam>
            </div>
            <div class='filter_body' id='filter_body'>
                <form id='form_filter' method='get' action='../php/vendasController.php'>
                    <spam class='filter_label'>Código</spam>
                    <input type='text' id='SELL_COD' name='SELL_COD' class='filter_input'>
                    <spam class='filter_label'>Data Venda Inicio</spam>
                    <input type='date' id='SELL_DAT' name='SELL_DAT' class='filter_input'>
                    <spam class='filter_label'>Data Venda Fim</spam>
                    <input type='date' id='SELL_DAT' name='SELL_DAT' class='filter_input'>
                    <spam class='filter_label'>Cód. Cliente</spam>
                    <input type='text' id='PES_COD_CLI' name='PES_COD_CLI' class='filter_input'>
                    <spam class='filter_label'>Cód. Produto</spam>
                    <input type='text' id='SELL_PRD_COD' name='SELL_PRD_COD' class='filter_input'>
                    <spam class='filter_label'>Cód. Armazém</spam>
                    <input type='text' id='AMZ_COD' name='AMZ_COD' class='filter_input'>
                    <br>
                    <input type ='submit' class='btn' id='pesquisar' name='pesquisar' value='Pesquisar'><input type='button' onclick='clean_filtro' value = 'Limpar' class='btn'>
                </form>
            </div>
        </div>
        <div class='table_data'>
            <div class='table'>
            </div>
        </div>
        <form class='form_excluir' action="../php/vendasController.php" method='get'>
            <input type='button' id='cadastrar' name='cadastrar' class='btn' value='Cadastrar' onclick="location.href = 'cadastroVendas.php'">
            <input type='button' id='excluir' name='excluir' class='btn' value='Excluir'>
        </form>
    </body>

</html>