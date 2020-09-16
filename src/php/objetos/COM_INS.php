<?php
    include "BD.php";
    class COM_INS{
        private $ins_cod;
        private $ins_des;
        private $ins_peso;
        private $ins_medida;
        private $ins_dat_cad;

        function setInsCod($ins_cod){
            $this->ins_cod = $ins_cod;
        }
        function setInsDes($ins_des){
            $this->ins_des = $ins_des;
        }
        function setInsPeso($ins_peso){
            $this->ins_peso = $ins_peso;
        }
        function setInsMedida($ins_medida){
            $this->ins_medida = $ins_medida;
        }
        function setInsDatCad($ins_dat_cad){
            $this->ins_dat_cad = $ins_dat_cad;
        }
        
        function getInsCod(){
            return $this->ins_cod;
        }
        function getInsDes(){
            return $this->ins_des;
        }
        function getInsPeso(){
            return $this->ins_peso;
        }
        function getInsMedida(){
            return $this->ins_medida;
        }
        function getInsDatCad(){
            return $this->ins_dat_cad;
        }

        function insertIns(){
            $BD = new BD();
            $query = "INSERT INTO COM_INS(INS_DES,INS_PESO,INS_MEDIDA,INS_DAT_CAD) VALUES(?,?,?,CURDATE())";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('sds',$this->ins_des,$this->ins_peso,$this->ins_medida);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function updateIns(){
            $BD = new BD();
            $query = "UPDATE COM_INS SET INS_DES = ?, INS_PESO = ?, INS_MEDIDA = ? WHERE INS_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('sdsi',$this->ins_des,$this->ins_peso,$this->ins_medida,$this->ins_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function deleteIns(){
            $BD = new BD();
            $query = "DELETE FROM COM_INS WHERE INS_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('i',$this->ins_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function getIns(){
            $BD = new BD();
            $query = "  SELECT COM_INS.* FROM COM_INS";
            $stmt = $BD->prepare_statement($query);
            if($stmt->execute()){
                return mysqli_fetch_array($stmt->get_result());
            }else{
                return false;
            } 
        }
    }
?>