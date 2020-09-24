<?php
    include '../php/objetos/CMN_PES.php';
    $pes = new CMN_PES();
    $pes->setPesCod($_REQUEST['PES_COD']);
    $pes->build_pes();
?>
<html>
    <head>
        <title>Pessoa - <?php echo $pes->getPesNome();?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/view_vendas.css">
        <script src='../js/navBarController.js'></script>
        <script>
            function build_perfil_ins(){
                    document.getElementById('PES_COD').value = <?php echo $pes->getPesCod()?>;
                    document.getElementById('PES_COD_H').value = <?php echo $pes->getPesCod()?>;
                    document.getElementById('PES_DAT_CAD').value ='<?php echo date('d/m/Y',strtotime($pes->getPesDatCad()))?>';
                    document.getElementById('PES_NOME').value = '<?php echo $pes->getPesNome()?>';
                    document.getElementById('PES_CPF').value = '<?php echo $pes->getPesCpf()?>';
                    document.getElementById('PES_TEL').value = '<?php echo $pes->getPesTel()?>';
                    document.getElementById('PES_EMA').value = '<?php echo $pes->getPesEma()?>';
                    document.getElementById('PES_END').value = '<?php echo $pes->getPesEnd()?>';
                }
            function submitDelete(){
                    location.href = '../php/controllers/pessoaController.php?delete=1&PES_COD='+document.getElementById('PES_COD').value;
                }
        </script>        
    </head>
    <body onload = 'build_perfil_ins()'>
        <?php
            include 'navBar.php';
        ?>
        <div class='div_cadastro'>
            <form action='../php/controllers/pessoaController.php' method='get'>
                <spam class='filter_label'>Código</spam>
                <input type='text' name='PES_COD' id='PES_COD' class='filter_input' disabled>
                <input type='text' name='PES_COD_H' id='PES_COD_H' class='filter_input' hidden>
                <spam class='filter_label'>Data Cadastro</spam>
                <input type='text' name='PES_DAT_CAD' id='PES_DAT_CAD' class='filter_input' disabled>
                <spam class='filter_label'>Nome</spam>
                <input type='text' name='PES_NOME' id='PES_NOME' class='filter_input' required>
                <spam class='filter_label'>CPF</spam>
                <input type='text' name='PES_CPF' id='PES_CPF' class='filter_input' required>
                <spam class='filter_label'>Telefone</spam>
                <input type='text' name='PES_TEL' id='PES_TEL' class='filter_input' required>
                <spam class='filter_label'>Email</spam>
                <input type='email' name='PES_EMA' id='PES_EMA' class='filter_input' required>
                <spam class='filter_label'>Endereço</spam>
                <input type='text' name='PES_END' id='PES_END' class='filter_input' required>
                <br>
                <input type='submit' id='update' name='update' class='btn' value='Alterar'>
                <input type='button' id='delete' name='delete' class='btn' value='Excluir' onclick='submitDelete()'>
                <input type='button' id='voltar' name='voltar' class='btn' value='Listagem' onclick="location.href = 'pessoas.php'">
            </form>
        </div>
    </body>
</html>