<?php
    include_once('../php/objetos/Authentication.php');
    $aut = new Authentication();
    $aut->authenticate_login();
?>
<html>
    <head>
        <title>Cadastro - Usuário</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/view_vendas.css">
        <script src='../js/navBarController.js'></script>        
    </head>
    <body>
        <?php
            include 'navBar.php';
        ?>
        <div class='div_cadastro'>
            <form action='../php/controllers/userController.php' method='get'>
                <spam class='filter_label'>Login</spam>
                <input type='text' name='LOGIN' id='LOGIN' class='filter_input' required>
                <spam class='filter_label'>Senha:</spam>
                <input type='password' name='PASSWORD' id='PASSWORD' class='filter_input' required>
                <spam class='filter_label'>Permissões:</spam>
                <select id='ROLE' name='ROLE' class='filter_input'>
                    <option value='0'>Usuário</option>
                    <option value='1'>Administrador</option>
                </select>
                <br>
                <input type='submit' id='insert' name='insert' class='btn' value='Cadastrar'>
                <input type='button' id='limpar' name='limpar' class='btn' value='Limpar'>
                <input type='button' id='voltar' name='voltar' class='btn' value='Listagem' onclick="location.href = 'insumos.php'">
            </form>
        </div>
    </body>
</html>