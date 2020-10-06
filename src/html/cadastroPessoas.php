<?php
    include_once('../php/objetos/Authentication.php');
    $aut = new Authentication();
    $aut->authenticate_login();
?>
<html>
    <head>
        <title>Cadastro - Pessoa</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/view_vendas.css">
        <script src='../js/navBarController.js'></script>        
    </head>
    <body>
        <?php
            include 'navBar.php';
        ?>
        <div class='div_cadastro'>
            <form action='../php/controllers/pessoaController.php' method='get'>
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
                <input type='submit' id='insert' name='insert' class='btn' value='Cadastrar'>
                <input type='button' id='limpar' name='limpar' class='btn' value='Limpar'>
                <input type='button' id='voltar' name='voltar' class='btn' value='Listagem' onclick="location.href = 'pessoas.php'">
            </form>
        </div>
    </body>
</html>