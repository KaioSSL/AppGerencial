<?php
    include "../php/objetos/BD.php";
    include "../php/objetos/FIN_BUY.php";
    $buy = new FIN_BUY();
    $buy->setBuyCod($_REQUEST['BUY_COD']);
    $buy->build_buy();
?>
<html>
    <head>
        <title>Perfil - Compra</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/view_vendas.css">
        <script src='../js/navBarController.js'></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script> 
        <script>
            function build_perfil_buy(){
                document.getElementById('BUY_COD').value = <?php echo $buy->getBuyCod()?>;
                document.getElementById('BUY_COD_H').value = <?php echo $buy->getBuyCod()?>;
                document.getElementById('BUY_DAT_CAD').value = '<?php echo date('d/m/Y',strtotime($buy->getBuyDatCad()))?>';
                document.getElementById('BUY_DAT').value = '<?php echo date('d/m/Y',strtotime($buy->getBuyDat()))?>';
                document.getElementById('PES_SELECT').value = <?php echo $buy->getPesCodFor() ?>;
                document.getElementById('AMZ_SELECT').value = <?php echo $buy->getAmzCod()?>;
                document.getElementById('BUY_TOT_VLR').value = <?php echo $buy->getBuyTotVlr()?>;
                var action = '../php/controllers/comprasController.php?build_buy_itens=1&BUY_COD='+document.getElementById('BUY_COD_H').value;
                AjaxRequest();
                Ajax.onreadystatechange = function(){
                    if (this.readyState == 4 && this.status == 200) {
                        var table = document.getElementById('form_table');
                        table.innerHTML = Ajax.responseText;
                    };
                }
                Ajax.open('GET', action,true);	
                Ajax.send(null);
            }

        </script>     
    </head>
    <body onload='build_perfil_buy()'>
        <?php
            include 'navBar.php';
        ?>
        <div class='div_cadastro'>
                <spam class='filter_label'>Còdigo</spam>
                <input type='text' name='BUY_COD' id='BUY_COD' class='filter_input' disabled>
                <input type='text' name='BUY_COD_H' id='BUY_COD_H' class='filter_input' hidden>
                <spam class='filter_label'>Data Cadastro</spam>
                <input type='text' name='BUY_DAT_CAD' id='BUY_DAT_CAD' class='filter_input' disabled>
                <spam class='filter_label'>Data Compra</spam>
                <input type='date-local' name='BUY_DAT' id='BUY_DAT' class='filter_input' required>
                <spam class='filter_label'>Fornecedor</spam>
                <?php
                    $bd = new BD();
                    $query = "SELECT * FROM CMN_PES";
                    $selectName = "PES_SELECT";
                    $columnId = "PES_COD";
                    $columnDes = "PES_NOME";
                    $bd->build_select($selectName,$query,$columnId,$columnDes); 
                ?>
                <spam class='filter_label'>Armazem</spam>
                <?php
                    $query = "SELECT * FROM CMN_AMZ";
                    $selectName = "AMZ_SELECT";
                    $columnId = "AMZ_COD";
                    $columnDes = "AMZ_DES";
                    $bd->build_select($selectName,$query,$columnId,$columnDes);
                ?>
                <spam class='filter_label'>Valor Total</spam>
                <input type='text' name='BUY_TOT_VLR' id='BUY_TOT_VLR' class='filter_input' required>
                <br>
                <div class='sub_form' name='sub_form' id='sub_form'>
                    <div class='form_table_title' id='form_table_title' name='form_table_title'>
                        <spam class='filter_title'>Insumos</spam>
                    </div>   
                    <div class='form_table' id='form_table' name='form_table'>
                    </div>
                <!--<input type='submit' id='update' name='update' class='btn' value='Alterar' onclick='insert_buy()'>-->
                <input type='button' id='delete' name='delete' class='btn' value='Excluir'>
                <input type='button' id='voltar' name='voltar' class='btn' value='Listagem' onclick="location.href = 'compras.php'">
        </div>
    </body>
</html>
