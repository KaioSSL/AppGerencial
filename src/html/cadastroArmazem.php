<?php
    include_once('../php/objetos/Authentication.php');
    $aut = new Authentication();
    $aut->authenticate_login();
?>
<html>
    <head>
        <title>Cadastro - Insumo</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/view_vendas.css">
        <script src='../js/navBarController.js'></script>        
    </head>
    <body>
        <?php
            include 'navBar.php';
        ?>
        <div class='div_cadastro'>
            <form action='../php/controllers/armazemController.php' method='get'>
                <spam class='filter_label'>Descrição</spam>
                <input type='text' name='AMZ_DES' id='AMZ_DES' class='filter_input' required>
                <spam class='filter_label'>Endereço</spam>
                <input type='text' name='AMZ_END' id='AMZ_END' class='filter_input' required>
                <spam class='filter_label'>Status</spam>
                <select name='AMZ_STATUS' id='AMZ_STATUS' class='filter_input'>
                    <option value=1>Ativo</option>
                    <option value=0>Inativo</option>
                </select>                
                <br>
                <input type='submit' id='insert' name='insert' class='btn' value='Cadastrar'>
                <input type='button' id='limpar' name='limpar' class='btn' value='Limpar'>
                <input type='button' id='voltar' name='voltar' class='btn' value='Listagem' onclick="location.href = 'armazem.php'">
            </form>
        </div>
    </body>
</html>