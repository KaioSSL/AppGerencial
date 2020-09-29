<?php
    include_once "BD.php";

    class PRD_INS{
        private $prd_ins_cod;
        private $prd_ins_dat_cad;
        private $ins_cod;
        private $prd_cod;
        private $ins_qtd;

        function setPrdInsCod($prd_ins_cod){
            $this->prd_ins_cod = $prd_ins_cod;
        }
        function setPrdInsDatCad($prd_ins_dat_cad){
            $this->prd_ins_dat_cad = $prd_ins_dat_cad;
        }
        function setInsCod($ins_cod){
            $this->ins_cod = $ins_cod;
        }
        function setPrdCod($prd_cod){
            $this->prd_cod = $prd_cod;
        }
        function setInsQtd($ins_qtd){
            $this->ins_qtd = $ins_qtd;
        }

        function getPrdInsCod(){
            return $this->prd_ins_cod;
        }
        function getPrdInsDatCad(){
            return $this->prd_ins_dat_cad;
        }
        function getInsCod(){
            return $this->ins_cod;
        }
        function getPrdCod(){
            return $this->prd_cod;
        }
        function getInsQtd(){
            return $this->ins_qtd;
        }

        function insertPrdIns(){
            $BD = new BD();
            $query = "INSERT INTO PRD_INS(PRD_INS_DAT_CAD,INS_COD,PRD_COD,INS_QTD) VALUES(CURDATE(),?,?,?)";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('iii',$this->ins_cod,$this->prd_cod,$this->ins_qtd);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function updatePrdIns(){
            $BD = new BD();
            $query = "UPDATE PRD_INS SET INS_COD = ?, PRD_COD = ?, INS_QTD = ? WHERE PRD_INS_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('iiii',$this->ins_cod,$this->prd_cod,$this->ins_qtd,$this->prd_ins_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function deletePrdIns(){
            $BD = new BD();
            $query = "DELETE FROM PRD_INS WHERE PRD_INS_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('i',$this->prd_ins_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }

    }
?>