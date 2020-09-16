<?php
    include "BD.php";
    class FIN_SELL{
        private $sell_cod;
        private $sell_tot_vlr;
        private $sell_dat;
        private $sell_dat_cad;
        private $pes_cod_cli;

        function setSellCod($sell_cod){
            $this->sell_cod = $sell_cod;
        }
        function setSellTotVlr($sell_tot_vlr){
            $this->sell_tot_vlr = $sell_tot_vlr;
        }
        function setSellDat($sell_dat){
            $this->sell_dat = $sell_dat;
        }
        function setSellDatCad($sell_dat_cad){
            $this->sell_dat_cad = $sell_dat_cad;
        }
        function setPesCodCli($pes_cod_cli){
            $this->pes_cod_cli = $pes_cod_cli;
        }

        function getSellCod(){
            return $this->sell_cod;
        }
        function getSellTotVlr(){
            return $this->sell_tot_vlr;
        }
        function getSellDat(){
            return $this->sell_dat;
        }
        function getSellDatCad(){
            return $this->sell_dat_cad;
        }
        function getPesCodCli(){
            return $this->pes_cod_cli;
        }

        function insertSell(){
            $BD = new BD();
            $query = "INSERT INTO FIN_SELL(SELL_TOT_VLR,SELL_DAT,SELL_DAT_CAD,PES_COD_CLI) VALUES(?,?,CURDATE(),?)";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('dsi',$this->sell_tot_vlr,$this->sell_dat,$this->pes_cod_cli);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function updateSell(){
            $BD = new BD();
            $query = "UPDATE FIN_SELL SET SELL_TOT_VLR = ?, SELL_DAT = ?, PES_COD_CLI = ? WHERE SELL_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('dsii',$this->sell_tot_vlr,$this->sell_dat,$this->pes_cod_cli,$this->sell_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function deleteSell(){
            $BD = new BD();
            $query = "DELETE FROM FIN_SELL WHERE SELL_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('i',$this->sell_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function getSell(){}

    }

?>