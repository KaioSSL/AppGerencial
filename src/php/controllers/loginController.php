<?php
    include_once('../objetos/Authentication.php');
    include_once('../objetos/User.php');
    
    if(isset($_REQUEST['LOGGED'])){
        $user = new User();
        $aut = new Authentication();
        if(!isset($_SESSION)){
            session_start();
            $user->setLogin($_REQUEST['LOGIN']);
            $user->setPassword($_REQUEST['PASSWORD']);
            if($user->authentication()){
                $_SESSION['LOGIN'] = $user->getLogin();
                $_SESSION['ROLE'] =  $user->getRole();
                $_SESSION['LOGGED'] =  true;
                header('location:../../html/inicial.php');
            }else{
                echo "<script>window.location.href = '../../html/login.php';
                alert('LOGIN INCORRETO');</script>"; 
            }

            }
    }elseif(isset($_REQUEST['LOGOUT'])){
        if(!isset($_SESSION)){
            session_start();
            unset($_SESSION['LOGGED']);
            unset($_SESSION['LOGIN']);
            unset($_SESSION['ROLE']);
            session_destroy();
            header('location:../../html/login.php');
            exit();
        }
    }



?>
