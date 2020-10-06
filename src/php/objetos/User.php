<?php
    include_once('BD.php');
    class User{
        private $user_cod;
        private $login;
        private $password;
        private $lastLogin;
        private $role;
        private $dat_cad;
        
        function setUserCod($user_cod){
            $this->user_cod = $user_cod;
        }
        function setLogin($login){
            $this->login = $login;
        }
        function setPassword($password){
            $this->password = $password;
        }
        function setLastLogin($last_login){
            $this->lastLogin = $last_login;
        }
        function setRole($role){
            $this->role = $role;
        }
        function setDatCad($dat_cad){
            $this->dat_cad = $dat_cad;
        }

        function getUserCod(){
            return $this->user_cod;
        }
        function getLogin(){
            return $this->login;
        }
        function getPassword(){
            return $this->password;
        }
        function getLastLogin(){
            return $this->lastLogin;
        }
        function getRole(){
            return $this->role;
        }
        function getDatCad(){
            return $this->dat_cad;
        }

        function insertUser(){
            $BD = new BD();
            $query = "INSERT INTO User(LOGIN,PASSWORD,LAST_LOGIN,ROLE,DAT_CAD) VALUES(?,?,CURRENT_DATE,?,CURRENT_DATE)";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('ssi',$this->login,$this->password,$this->role);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function updateUser(){
            $BD = new BD();
            $query = "UPDATE User SET LOGIN = ?, PASSWORD = ?, ROLE = ? WHERE USER_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('ssii',$this->login,$this->password,$this->role,$this->user_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function deleteUser(){
            $BD = new BD();
            $query = "DELETE FROM User WHERE USER_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('i',$this->user_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function user_data(){
            $BD = new BD();
            $query = "SELECT * FROM User";
            $stmt = $BD->prepare_statement($query);
            if($stmt->execute()){
                return $stmt->get_result();
            }else{
                return false;
            } 
        }
        function build_user(){
            $BD = new BD();
            $query = "SELECT * FROM User WHERE USER_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('i',$this->user_cod);
            if($stmt->execute()){
                $rs = mysqli_fetch_array($stmt->get_result());
                $this->setLogin($rs['LOGIN']);
                $this->setPassword($rs['PASSWORD']);
                $this->setRole($rs['ROLE']);
                $this->setDatCad($rs['DAT_CAD']);
                return true;    
            }else{
                return false;
            } 
        }
        
        function authentication(){
            $BD = new BD();
            $query = "SELECT * FROM USER WHERE LOGIN = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('s',$this->login);
            if($stmt->execute()){
                $rs = mysqli_fetch_array($stmt->get_result());
                if($rs!=null){
                    $this->setUserCod($rs['USER_COD']);
                    $this->setRole($rs['ROLE']);
                    $password = $rs['PASSWORD'];
                    echo $rs['LOGIN'];
                    echo $password;
                    if($password == $this->password){
                            return true;
                        }else{
                            return false;
                        }
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    }

?>