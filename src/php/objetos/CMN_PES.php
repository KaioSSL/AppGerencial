<?php
    include "BD.php";
    class CMN_PES{
        private $pes_cod;
        private $pes_cpf;
        private $pes_nome;
        private $pes_tel;
        private $pes_ema;
        private $pes_dat_cad;
        private $pes_end;

        function setPesCod($pes_cod){
            $this->pes_cod = $pes_cod;
        }
        function setPesCpf($pes_cpf){
            $this->pes_cpf = $pes_cpf;
        }
        function setPesNome($pes_nome){
            $this->pes_nome = $pes_nome;
        }
        function setPesTel($pes_tel){
            $this->pes_tel = $pes_tel;
        }
        function setPesEma($pes_ema){
            $this->pes_ema = $pes_ema;
        }
        function setPesDatCad($pes_dat_cad){
            $this->pes_dat_cad = $pes_dat_cad;
        }
        function setPesEnd($pes_end){
            $this->pes_end = $pes_end;
        }

        function getPesCod(){
            return $this->pes_cod;
        }
        function getPesCpf(){
            return $this->pes_cpf;
        }
        function getPesNome(){
            return $this->pes_nome;
        }
        function getPesTel(){
            return $this->pes_tel;
        }
        function getPesEma(){
            return $this->pes_ema;
        }
        function getPesDatCad(){
            return $this->pes_dat_cad;
        }
        function getPesEnd(){
            return $this->pes_end;
        }
        function insertPes(){
            $BD = new BD();
            $query = "INSERT INTO CMN_PES(PES_CPF,PES_NOME,PES_TEL,PES_EMA,PES_DAT_CAD,PES_END) VALUES (?,?,?,?,CURDATE(),?)";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('sssss',$this->pes_cpf,$this->pes_nome,$this->pes_tel,$this->pes_ema,$this->pes_end);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function updatePes(){
            $BD = new BD();
            $query = "UPDATE CMN_PES SET PES_CPF = ?, PES_NOME = ?, PES_TEL = ?, PES_EMA = ?, PES_END = ? WHERE PES_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('sssssi',$this->pes_cpf,$this->pes_nome,$this->pes_tel,$this->pes_ema,$this->pes_end,$this->pes_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function deletePes(){
            $BD = new BD();
            $query = "DELETE FROM CMN_PES WHERE PES_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('i',$this->pes_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function getPes(){
            $BD = new BD();
            $query = "SELECT CMN_PES.* FROM CMN_PES";
            $stmt = $BD->prepare_statement($query);
            if($stmt->execute()){
                return mysqli_fetch_array($stmt->get_result());
            }else{
                return false;
            }            
        }
        

    }

?>