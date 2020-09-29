<?php
    include_once "BD.php";
    class FIN_BUY{
        private $buy_cod;
        private $buy_dat;
        private $buy_tot_vlr;
        private $buy_dat_cad;
        private $pes_cod_for;
        private $amz_cod;


        function setBuyCod($buy_cod){
            $this->buy_cod = $buy_cod;
        }
        function setBuyDat($buy_dat){
            $this->buy_dat = $buy_dat;
        }
        function setBuyTotVlr($buy_tot_vlr){
            $this->buy_tot_vlr = $buy_tot_vlr;
        }
        function setBuyDatCad($buy_dat_cad){
            $this->buy_dat_cad = $buy_dat_cad;
        }
        function setPesCodFor($pes_cod_for){
            $this->pes_cod_for = $pes_cod_for;
        }
        function setAmzCod($amz_cod){
            $this->amz_cod = $amz_cod;
        }

        function getBuyCod(){
            return $this->buy_cod;
        }        
        function getBuyDat(){
            return $this->buy_dat;
        }
        function getBuyTotVlr(){
            return $this->buy_tot_vlr;
        }
        function getBuyDatCad(){
            return $this->buy_dat_cad;
        }
        function getPesCodFor(){
            return $this->pes_cod_for;
        }
        function getAmzCod(){
            return $this->amz_cod;
        }

        function insertBuy(){
            $BD = new BD();
            $query = "INSERT INTO FIN_BUY(BUY_DAT,BUY_TOT_VLR,BUY_DAT_CAD,PES_COD_FOR,AMZ_COD) VALUES(?,?,CURRENT_DATE,?,?)";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('sdii',$this->buy_dat,$this->buy_tot_vlr,$this->pes_cod_for,$this->amz_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        
        function updateBuy(){
            $BD = new BD();
            $query = "UPDATE FIN_BUY SET BUY_DAT = ?, BUY_TOT_VLR = ? WHERE BUY_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('sdi',$this->buy_dat,$this->buy_tot_vlr,$this->buy_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function deleteBuy(){
            $BD = new BD();
            $query = "DELETE FROM FIN_BUY WHERE BUY_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('i',$this->buy_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function getBuy(){
            $BD = new BD();
            /*$query = "  SELECT FIN_BUY.*
                        FROM FIN_BUY,
                            BUY_INS,
                            INS_AMZ
                        WHERE FIN_BUY.BUY_COD = BUY_INS.BUY_COD
                            --
                            AND BUY_INS.INS_AMZ_COD = INS_AMZ.INS_AMZ_COD
                            --FILTROS
                            AND (FIN_BUY.BUY_COD = ?
                            OR ? IS NULL)
                            AND (FIN_BUY.BUY_DAT=>?
                            OR ? IS NULL)
                            AND (FIN_BUY.BUY_DAT<=?
                            OR ? IS NULL)
                            AND (FIN_BUY.FOR_COD = ?
                            OR ? IS NULL)
                            AND (BUY_INS.INS_COD = ?
                            OR ? IS NULL)
                            AND (INS_AMZ.AMZ_COD = ?
                            OR ? IS NULL)";*/
            $query ='SELECT * FROM	FIN_BUY';
            $stmt = $BD->prepare_statement($query);
            
            //$stmt->bind_param('issiii',$listParams[0],$listParams[1],$listParams[1],$listParams[2],$listParams[3],$listParams[4]);
            if($stmt->execute()){
                return $stmt->get_result();
            }else{
                return false;
            }
        }
        function get_last_id(){
            $BD = new BD();
            $query = "SELECT MAX(BUY_COD) FROM FIN_BUY";
            $stmt = $BD->prepare_statement($query);
            if($stmt->execute()){
                $rs = mysqli_fetch_array($stmt->get_result());
                return $rs[0];
            }else{
                return false;
            }
        }

        function build_buy(){
            $BD = new BD();
            $query = "SELECT * FROM FIN_BUY WHERE BUY_COD = ? ";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('i',$this->buy_cod);
            if($stmt->execute()){
                $rs = mysqli_fetch_array($stmt->get_result());
                $this->setBuyDat($rs['BUY_DAT']);
                $this->setBuyDatCad($rs['BUY_DAT_CAD']);
                $this->setBuyTotVlr($rs['BUY_TOT_VLR']);
                $this->setPesCodFor($rs['PES_COD_FOR']);
                $this->setAmzCod($rs['AMZ_COD']);
                return true;
            }
        }

        function get_buy_itens(){
            $BD = new BD();
            $query = "SELECT * FROM BUY_INS,COM_INS WHERE BUY_COD = ? AND BUY_INS.INS_COD = COM_INS.INS_COD ";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('i',$this->buy_cod);
            if($stmt->execute()){
                return $stmt->get_result();
            }else{
                false;
            }
        }
    }


?>