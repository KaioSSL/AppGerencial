<?php
    include_once('../php/objetos/Authentication.php');
    $aut = new Authentication();
    $aut->authenticate_login();
    $aut->authorization_role(1);
?>
<html>
    <head>
        <title>Usuários - Principal</title>
        <link rel="stylesheet" href="../css/view_vendas.css">
        <script src='../js/navBarController.js'></script>
        <script>    
            function get_data(){
                var filtros = 'USER_COD='+document.getElementById('USER_COD').value 
                            + '&'+
                            'DAT_CAD_INI=' + document.getElementById('DAT_CAD_INI').value
                            + '&'+
                            'DAT_CAD_FIM=' + document.getElementById('DAT_CAD_FIM').value
                            + '&'+
                            'LOGIN=' + document.getElementById('LOGIN').value;
                var url = 'userController.php'                            ;
                get_table_data(filtros,url);
            }     
            function perfil_user(user_cod){
                location.href = 'user_perfil.php?USER_COD='+user_cod;
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
                    <input type='text' id='USER_COD' name='USER_COD' class='filter_input'>
                    <spam class='filter_label'>Data Cadastro Inicio</spam>
                    <input type='date' id='DAT_CAD_INI' name='DAT_CAD_INI' class='filter_input'>
                    <spam class='filter_label'>Data Cadastro Fim</spam>
                    <input type='date' id='DAT_CAD_FIM' name='DAT_CAD_FIM' class='filter_input'>
                    <spam class='filter_label'>Login</spam>
                    <input type='text' id='LOGIN' name='LOGIN' class='filter_input'>
                    <br>
                    <input type ='button' class='btn' id='pesquisar' name='pesquisar' value='Pesquisar' onclick='get_data()'>
                    <input type='button' onclick='clean_filtro' value = 'Limpar' class='btn'>
            </div>
        </div>
        <div class='table_data'>
            <div class='table' name='table_data' id='table_data'>
            </div>
        </div>
        <input type='button' id='cadastrar' name='cadastrar' class='btn' value='Cadastrar' onclick="location.href = 'cadastroUsers.php'">

    </body>

</html>