<?php
    include_once('../php/objetos/Authentication.php');
    $aut = new Authentication();
    $aut->authenticate_login();
    include_once('../php/objetos/User.php');
    $user = new User();
    $user->setUserCod($_REQUEST['USER_COD']);
    $user->build_user();
?>
<html>
    <head>
        <title>Pessoa - <?php echo $user->getLogin();?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/view_vendas.css">
        <script src='../js/navBarController.js'></script>
        <script>    
            function build_perfil_user(){
                    document.getElementById('USER_COD').value = <?php echo $user->getUserCod()?>;
                    document.getElementById('USER_COD_H').value = <?php echo $user->getUserCod()?>;
                    document.getElementById('LOGIN').value = '<?php echo $user->getLogin()?>';
                    document.getElementById('PASSWORD').value ='<?php echo  $user->getPassword()?>';
                    document.getElementById('DAT_CAD').value = '<?php echo date('d/m/Y',strtotime($user->getDatCad()))?>';
                    document.getElementById('ROLE').value = <?php echo $user->getRole()?>;
                }
            function submitDelete(){
                    location.href = '../php/controllers/userController.php?delete=1&USER_COD='+document.getElementById('USER_COD').value;
                }
        </script>        
    </head>
    <body onload = 'build_perfil_user()'>
        <?php
            include 'navBar.php';
        ?>
        <div class='div_cadastro'>
            <form action='../php/controllers/pessoaController.php' method='get'>
                <spam class='filter_label'>Código</spam>
                <input type='text' name='USER_COD' id='USER_COD' class='filter_input' disabled>
                <input type='text' name='USER_COD_H' id='USER_COD_H' class='filter_input' hidden>
                <spam class='filter_label'>Data Cadastro</spam>
                <input type='text' name='DAT_CAD' id='DAT_CAD' class='filter_input' disabled>
                <spam class='filter_label'>Login</spam>
                <input type='text' name='LOGIN' id='LOGIN' class='filter_input' required>
                <spam class='filter_label'>Senha</spam>
                <input type='text' name='PASSWORD' id='PASSWORD' class='filter_input' required>
                <spam class='filter_label'>Permissão</spam>
                <select id='ROLE' name='ROLE' class='filter_input'>
                    <option value='0'>Usuário</option>
                    <option value='1'>Administrador</option>
                </select>
                <br>
                <input type='submit' id='update' name='update' class='btn' value='Alterar'>
                <input type='button' id='delete' name='delete' class='btn' value='Excluir' onclick='submitDelete()'>
                <input type='button' id='voltar' name='voltar' class='btn' value='Listagem' onclick="location.href = 'users.php'">
            </form>
        </div>
    </body>
</html>