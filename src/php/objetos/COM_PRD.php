<?php
    include "BD.php";
    class COM_PRD{
        private $prd_cod;
        private $prd_vlr_venda;
        private $prd_vlr_custo;
        private $prd_peso;
        private $prd_dat_cad;
        private $prd_des;

        function setPrdCod($prd_cod){
            $this->prd_cod = $prd_cod;
        }
        function setPrdVlrVenda($prd_vlr_venda){
            $this->prd_vlr_venda = $prd_vlr_venda;
        }
        function setPrdVlrCusto($prd_vlr_custo){
            $this->prd_vlr_custo = $prd_vlr_custo;
        }
        function setPrdPeso($prd_peso){
            $this->prd_peso = $prd_peso;
        }
        function setPrdDatCad($prd_dat_cad){
            $this->prd_dat_cad = $prd_dat_cad;
        }
        function setPrdDes($prd_des){
            $this->prd_des = $prd_des;
        }

        function getPrdCod(){
            return $this->prd_cod;
        }
        function getPrdVlrVenda(){
            return $this->prd_vlr_venda;
        }
        function getPrdVlrCusto(){
            return $this->prd_vlr_custo;
        }
        function getPrdPeso(){
            return $this->prd_peso;
        }
        function getPrdDatCad(){
            return $this->prd_dat_cad;
        }
        function getPrdDes(){
            return $this->prd_des;
        }

        function insertPrd(){
            $BD = new BD();
            $query = "INSERT INTO COM_PRD(PRD_VLR_VENDA,PRD_VLR_CUSTO,PRD_PESO,PRD_DAT_CAD,PRD_DES) VALUES(?,?,?,CURDATE(),?)";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('ddds',$this->prd_vlr_venda,$this->prd_vlr_custo,$this->prd_peso,$this->prd_des);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function updatePrd(){
            $BD = new BD();
            $query = "UPDATE COM_PRD SET PRD_VLR_VENDA = ?, PRD_VLR_CUSTO =?,PRD_PESO = ?, PRD_DES = ? WHERE PRD_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('dddsi',$this->prd_vlr_venda,$this->prd_vlr_custo,$this->prd_peso,$this->prd_des,$this->prd_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function deletePrd(){
            $BD = new BD();
            $query = "DELETE FROM COM_PRD WHERE PRD_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('i',$this->prd_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function getPrd(){}


    }
?>