<?php
    include_once "BD.php";
    class BUY_INS{
        private $buy_ins_cod;
        private $ins_cod;
        private $buy_cod;
        private $ins_amz_cod;
        private $ins_qtd;

        function setBuyInsCod($buy_ins_cod){
            $this->buy_ins_cod = $buy_ins_cod;
        }
        function setInsCod($ins_cod){
            $this->ins_cod = $ins_cod;
        }
        function setBuyCod($buy_cod){
            $this->buy_cod = $buy_cod;
        }
        function setInsAmzCod($ins_amz_cod){
            $this->ins_amz_cod = $ins_amz_cod;
        }
        function setInsQtd($ins_qtd){
            $this->ins_qtd = $ins_qtd;
        }

        function getBuyInsCod(){
            return $this->buy_ins_cod;
        }
        function getInsCod(){
            return $this->ins_cod;
        }
        function getBuyCod(){
            return $this->buy_cod;
        }
        function getInsAmzCod(){
            return $this->ins_amz_cod;
        }
        function getInsQtd(){
            return $this->ins_qtd;
        }
        
        function insertBuyIns(){
            $BD = new BD();
            $query = "INSERT INTO BUY_INS(INS_COD,BUY_COD,INS_AMZ_COD,INS_QTD) VALUES (?,?,?,?)";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('iiii',$this->ins_cod,$this->buy_cod,$this->ins_amz_cod,$this->ins_qtd);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function updateBuyIns(){
            $BD = new BD();
            $query = "UPDATE BUY_INS SET INS_COD = ?, BUY_COD = ?, INS_AMZ_COD = ? WHERE BUY_INS_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('iiiI',$this->ins_cod,$this->buy_cod,$this->ins_amz_cod,$this->buy_ins_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function deleteBuyIns(){
            $BD = new BD();
            $query = "DELETE FROM BUY_INS WHERE BUY_INS_COD = ?";
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
        function getBuyIns($listParam){}
    }
?>
