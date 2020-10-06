<?php
    include_once('../php/objetos/Authentication.php');
    $aut = new Authentication();
    $aut->authenticate_login();
    include '../php/objetos/COM_INS.php';
    $ins = new COM_INS();
    $ins->setInsCod($_REQUEST['INS_COD']);
    $ins->build_ins();
?>
<html>
    <head>
        <title>Insumo - <?php echo $ins->getInsDes();?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/view_vendas.css">
        <script src='../js/navBarController.js'></script>  
        <script>
            function build_perfil_ins(){
                    document.getElementById('INS_COD').value = <?php echo $ins->getInsCod()?>;
                    document.getElementById('INS_COD_H').value = <?php echo $ins->getInsCod()?>;
                    document.getElementById('INS_DAT_CAD').value ='<?php echo date('d/m/Y',strtotime($ins->getInsDatCad()))?>';
                    document.getElementById('INS_DES').value = '<?php echo $ins->getInsDes()?>';
                    document.getElementById('INS_PESO').value = <?php echo $ins->getInsPeso()?>;
                    document.getElementById('INS_MEDIDA').value = '<?php echo $ins->getInsMedida()?>';
                    document.getElementById('INS_VLR_MEDIDA').value = <?php echo $ins->getInsVlrMedida()?>;
                }
            function submitDelete(){
                    location.href = '../php/controllers/armazemController.php?delete=1&INS_COD='+document.getElementById('INS_COD').value;
                }
        </script>      
    </head>
    <body onload='build_perfil_ins()'>
        <?php
            include 'navBar.php';
        ?>
        <div class='div_cadastro'>
            <form action='../php/controllers/insumoController.php' method='get'>
                <spam class='filter_label'>Código</spam>
                <input type='text' name='INS_COD' id='INS_COD' class='filter_input' disabled>
                <input type='text' name='INS_COD_H' id='INS_COD_H' class='filter_input' hidden>
                <spam class='filter_label'>Data Cadastro</spam>
                <input type='text' name='INS_DAT_CAD' id='INS_DAT_CAD' class='filter_input' disabled>
                <spam class='filter_label'>Descrição</spam>
                <input type='text' name='INS_DES' id='INS_DES' class='filter_input' required>
                <spam class='filter_label'>Medida</spam>
                <input type='text' name='INS_MEDIDA' id='INS_MEDIDA' class='filter_input' required>
                <spam class='filter_label'>Vlr.Medida</spam>
                <input type='text' name='INS_VLR_MEDIDA' id='INS_VLR_MEDIDA' class='filter_input' required>
                <spam class='filter_label'>Peso</spam>
                <input type='text' name='INS_PESO' id='INS_PESO' class='filter_input' required>
                <br>
                <input type='submit' id='update' name='update' class='btn' value='Alterar'>
                <input type='button' id='delete' name='delete' class='btn' value='Excluir' onclick='submitDelete()'>
                <input type='button' id='voltar' name='voltar' class='btn' value='Listagem' onclick="location.href = 'insumos.php'">
            </form>
        </div>
    </body>
</html>