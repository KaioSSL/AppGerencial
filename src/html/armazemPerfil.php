<?php
    include_once('../php/objetos/Authentication.php');
    $aut = new Authentication();
    $aut->authenticate_login();
    include '../php/objetos/CMN_AMZ.php';
    $amz = new CMN_AMZ();
    $amz->setAmzCod($_REQUEST['AMZ_COD']);
    $amz->buildAmz();    
?>
<html>
    <head>
        <title>Armazem - <?php echo $amz->getAmzDes()?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/view_vendas.css">
        <script src='../js/navBarController.js'></script>       
        <script>
            function build_perfil_amz(){
                document.getElementById('AMZ_COD').value = <?php echo $amz->getAmzCod()?>;
                document.getElementById('AMZ_COD_H').value = <?php echo $amz->getAmzCod()?>;
                document.getElementById('AMZ_DAT_CAD').value ='<?php echo date('d/m/Y',strtotime($amz->getAmzDatCad()))?>';
                document.getElementById('AMZ_DES').value = '<?php echo $amz->getAmzDes()?>';
                document.getElementById('AMZ_END').value = '<?php echo $amz->getAmzEnd()?>';
                document.getElementById('AMZ_STATUS').value = <?php echo $amz->getAmzStatus()?>;
            }
            function submitDelete(){
                location.href = '../php/controllers/armazemController.php?delete=1&AMZ_COD='+document.getElementById('AMZ_COD').value;
            }
        </script>
    </head>
    <body onload='build_perfil_amz()'>
        <?php
            include 'navBar.php';
        ?>
        <div class='div_cadastro'>
            <form action='../php/controllers/armazemController.php' method='get'>
                <spam class='filter_label'>Código</spam>
                <input type='text' name='AMZ_COD' id='AMZ_COD' class='filter_input' disabled>    
                <input type='text' name='AMZ_COD_H' id='AMZ_COD_H' class='filter_input' hidden>
                <spam class='filter_label'>Data Cadastro</spam>
                <input type='text' name='AMZ_DAT_CAD' id='AMZ_DAT_CAD' class='filter_input' disabled> 
                <spam class='filter_label'>Descrição</spam>
                <input type='text' name='AMZ_DES' id='AMZ_DES' class='filter_input' required>
                <spam class='filter_label'>Endereço</spam>
                <input type='text' name='AMZ_END' id='AMZ_END' class='filter_input' required>
                <spam class='filter_label'>Status</spam>
                <select name='AMZ_STATUS' id='AMZ_STATUS' class='filter_input' required>
                    <option value=1>Ativo</option>
                    <option value=0>Inativo</option>
                </select>                
                <br>
                <input type='button' id='delete' name='delete' class='btn' value='Excluir' onclick='submitDelete()'>
                <input type='submit' id='update' name='update' class='btn' value='Alterar'>
                <input type='button' id='voltar' name='voltar' class='btn' value='Listagem' onclick="location.href = 'armazem.php'">
            </form>
        </div>
    </body>
</html>