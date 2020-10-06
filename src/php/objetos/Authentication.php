<?php

    class Authentication{
        function authenticate_login(){
            if(!isset($_SESSION)){
                session_start();
            }    
            if(!isset($_SESSION['LOGGED'])){
                header('location:../html/login.php');
                return false;
            }else{
                return true;
            }
            
        }

        function authorization_role($role_required){
            session_start();
            if($this->authenticate_login()){
                if(!($_SESSION['ROLE']==$role_required)){
                    header('location:'.$_SERVER['HTTP_REFERER']);
                    return false;
                }else{
                    return true;
                }
            }else{
            }    
        }

    }
    
    
?>