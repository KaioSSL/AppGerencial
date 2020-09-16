<?php
    include "BD.php";
    class SELL_PRD{
        private $sell_prd_cod;
        private $prd_cod;
        private $sell_cod;
        private $prd_amz_cod;
        private $prd_qtd;
        private $prd_validade;

        function setSellPrdCod($sell_prd_cod){
            $this->sell_prd_cod = $sell_prd_cod;
        }
        function setPrdCod($prd_cod){
            $this->prd_cod = $prd_cod;
        }
        function setSellCod($sell_cod){
            $this->sell_cod = $sell_cod;
        }
        function setPrdAmzCod($prd_amz_cod){
            $this->prd_amz_cod = $prd_amz_cod;
        }
        function setPrdQtd($prd_qtd){
            $this->prd_qtd = $prd_qtd;
        }
        function setPrdValidade($prd_validade){
            $this->prd_validade = $prd_validade;
        }

        function getSellPrdCod(){
            return $this->sell_prd_cod;
        }
        function getPrdCod(){
            return $this->prd_cod;
        }
        function getSellCod(){
            return $this->sell_cod;
        }
        function getPrdAmzCod(){
            return $this->prd_amz_cod;
        }
        function getPrdQtd(){
            return $this->prd_qtd;
        }
        function getPrdValidade(){
            return $this->prd_validade;
        }

        function insertSellPrd(){
            $BD = new BD();
            $query = "INSERT INTO SELL_PRD(PRD_COD,SELL_COD,PRD_AMZ_COD,PRD_QTD,PRD_VALIDADE) VALUES(?,?,?,?,?)";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('iiiis',$this->prd_cod,$this->sell_cod,$this->prd_amz_cod,$this->prd_qtd,$this->prd_validade);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function updateSellPrd(){
            $BD = new BD();
            $query = "UPDATE SELL_PRD SET PRD_COD = ?, SELL_COD = ?, PRD_AMZ_COD = ?, PRD_QTD = ?, PRD_VALIDADE = ? WHERE SEL_PRD_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('iiiisi',$this->prd_cod,$this->sell_cod,$this->prd_amz_cod,$this->prd_qtd,$this->prd_validade,$this->sell_prd_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function deleteSellPrd(){
            $BD = new BD();
            $query = "DELETE FROM SELL_PRD WHERE SELL_PRD_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('i',$this->sell_prd_cod);
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