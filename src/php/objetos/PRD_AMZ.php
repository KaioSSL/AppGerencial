<?php
    include_once 'BD.php';
    class PRD_AMZ{
        private $prd_amz_cod;
        private $prd_qtd_disp;
        private $prd_cod;
        private $amz_cod;

        function setPrdAmzCod($prd_amz_cod){
            $this->prd_amz_cod = $prd_amz_cod;
        }
        function setPrdQtdDisp($prd_qtd_disp){
            $this->prd_qtd_disp = $prd_qtd_disp;
        }
        function setPrdCod($prd_cod){
            $this->Prd_cod = $prd_cod;
        }
        function setAmzCod($amz_cod){
            $this->amz_cod = $amz_cod;
        }

        function getPrdAmzCod(){
            return $this->prd_amz_cod;
        }
        function getPrdQtdDisp(){
            return $this->prd_qtd_disp;
        }
        function getPrdCod(){
            return $this->prd_cod;
        }
        function getAmzCod(){
            return $this->amz_cod;
        }

        function insertPrdAmz(){
            $BD = new BD();
            $query = "INSERT INTO PRD_AMZ(PRD_QTD_DISP,PRD_COD,AMZ_COD) VALUES (?,?,?)";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('dii',$this->prd_qtd_disp,$this->prd_cod,$this->amz_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function updatePrdAmz(){
            $BD = new BD();
            $query = "UPDATE PRD_AMZ SET PRD_QTD_DISP = ?, PRD_COD = ?, AMZ_COD = ? WHERE PRD_AMZ_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('diii',$this->prd_qtd_disp,$this->prd_cod,$this->amz_cod,$this->prd_amz_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function deletePrdAmz(){
            $BD = new BD();
            $query = "DELETE FROM PRD_AMZ WHERE PRD_AMZ_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('i',$this->prd_amz_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function buPrdAmz($qtd,$op){
            $BD = new BD();
            $query = "SELECT PRD_QTD__DISP FROM PRD_AMZ WHERE PRD_AMZ_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->execute();
            $rs = mysqli_fetch_array($stmt->get_result());
            if($op == 0){
                $qtd = $rs[0] + $qtd;
            }else{
                $qtd = $rs[0] - $qtd;
            }
            $this->prd_qtd_disp = $qtd;
            $this->updatePrdAmz();
        }
        function getPrdAmz(){}


    }

?>