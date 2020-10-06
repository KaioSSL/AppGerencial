<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <link rel="stylesheet" type="text/css" href="../css/login.css">
        <title>Login- CMS</title>
        
    </head>
    
    <body>
        <div class='boxLogin'>
            <form name="formLogin" action="../php/controllers/loginController.php">
                <spam class="fontTitulo">Login de Usuario</spam><br>
                <spam class="font1">Login : </spam> <input type="text" name="LOGIN" id='LOGIN' class="formInput"><br>
                <spam class="font1">Senha : </spam> <input type="password" name="PASSWORD" id='PASSWORD' class="formInput"><br>
                <input type="submit" class="buttonForm" name="LOGGED" value="LOGIN">
            </form>
        </div>

    
    </body>

</html>