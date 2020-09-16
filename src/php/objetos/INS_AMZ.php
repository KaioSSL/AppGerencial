<?php
    include "BD.php";
    class INS_AMZ{
        private $ins_amz_cod;
        private $ins_qtd_disp;
        private $ins_cod;
        private $amz_cod;

        function setInsAmzCod($ins_amz_cod){
            $this->ins_amz_cod = $ins_amz_cod;
        }
        function setInsQtdDisp($ins_qtd_disp){
            $this->ins_qtd_disp = $ins_qtd_disp;
        }
        function setInsCod($ins_cod){
            $this->ins_cod = $ins_cod;
        }
        function setAmzCod($amz_cod){
            $this->amz_cod = $amz_cod;
        }

        function getInsAmzCod(){
            return $this->ins_amz_cod;
        }
        function getInsQtdDisp(){
            return $this->ins_qtd_disp;
        }
        function getInsCod(){
            return $this->ins_cod;
        }
        function getAmzCod(){
            return $this->amz_cod;
        }

        function insertInsAmz(){
            $BD = new BD();
            $query = "INSERT INTO INS_AMZ(INS_QTD_DISP,INS_COD,AMZ_COD) VALUES (?,?,?)";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('dii',$this->ins_qtd_disp,$this->ins_cod,$this->amz_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function updateInsAmz(){
            $BD = new BD();
            $query = "UPDATE INS_AMZ SET INS_QTD_DISP = ?, INS_COD = ?, AMZ_COD = ? WHERE INS_AMZ_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('diii',$this->ins_qtd_disp,$this->ins_cod,$this->amz_cod,$this->ins_amz_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function deleteInsAmz(){
            $BD = new BD();
            $query = "DELETE FROM INS_AMZ WHERE INS_AMZ_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('i',$this->ins_amz_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function buInsAmz($qtd,$op){
            $BD = new BD();
            $query = "SELECT INS_QTD__DISP FROM INS_AMZ WHERE INS_AMZ_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->execute();
            $rs = mysqli_fetch_array($stmt->get_result());
            if($op == 0){
                $qtd = $rs[0] + $qtd;
            }else{
                $qtd = $rs[0] - $qtd;
            }
            $this->ins_qtd_disp = $qtd;
            $this->updateInsAmz();
        }
        function getInsAmz(){}
    }
?>