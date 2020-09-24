<?php
    include "BD.php";
    class COM_INS{
        private $ins_cod;
        private $ins_des;
        private $ins_peso;
        private $ins_medida;
        private $ins_dat_cad;
        private $ins_vlr_medida;

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
        function setInsVlrMedida($ins_vlr_medida){
            $this->ins_vlr_medida = $ins_vlr_medida;
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
        function getInsVlrMedida(){
            return $this->ins_vlr_medida;
        }

        function insertIns(){
            $BD = new BD();
            $query = "INSERT INTO COM_INS(INS_DES,INS_PESO,INS_MEDIDA,INS_DAT_CAD,INS_VLR_MEDIDA) VALUES(?,?,?,CURRENT_DATE,?)";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('sdsd',$this->ins_des,$this->ins_peso,$this->ins_medida,$this->ins_vlr_medida);
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
            $query = "UPDATE COM_INS SET INS_DES = ?, INS_PESO = ?, INS_MEDIDA = ?, INS_VLR_MEDIDA =? WHERE INS_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('sdsdi',$this->ins_des,$this->ins_peso,$this->ins_medida,$this->ins_vlr_medida,$this->ins_cod);
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
            $query = "SELECT COM_INS.* FROM COM_INS";
            $stmt = $BD->prepare_statement($query);
            if($stmt->execute()){
                return $stmt->get_result();
            }else{
                return false;
            } 
        }

        function get_ins_last_id(){
            $BD = new BD();
            $query = "SELECT MAX(INS_COD) FROM COM_INS";
            $stmt = $BD->prepare_statement($query);
            $stmt->execute();
            $rs = mysqli_fetch_array($stmt->get_result());
            return $rs[0];
        }

        function build_ins(){
            $BD = new BD();
            $query = "SELECT * FROM COM_INS WHERE INS_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('i',$this->ins_cod);
            if($stmt->execute()){
                $rs = mysqli_fetch_array($stmt->get_result());
                $this->setInsDatCad($rs['INS_DAT_CAD']);
                $this->setInsDes($rs['INS_DES']);
                $this->setInsMedida($rs['INS_MEDIDA']);
                $this->setInsPeso($rs['INS_PESO']);
                $this->setInsVlrMedida($rs['INS_VLR_MEDIDA']);
                return true;
            }else{
                return false;
            }

        }
    }
?>