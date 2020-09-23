<?php
    include "BD.php";
    class CMN_AMZ{
        private $amz_cod;
        private $amz_des;
        private $amz_end;
        private $amz_dat_cad;
        private $amz_status;

        function setAmzCod($amz_cod){
            $this->amz_cod = $amz_cod;
        }
        function setAmzDes($amz_des){
            $this->amz_des = $amz_des;
        }
        function setAmzEnd($amz_end){
            $this->amz_end = $amz_end;
        }
        function setAmzDatCad($amz_dat_cad){
            $this->amz_dat_cad = $amz_dat_cad;
        }
        function setAmzStatus($amz_status){
            $this->amz_status = $amz_status;
        }

        function getAmzCod(){
            return $this->amz_cod;
        }
        function getAmzDes(){
            return $this->amz_des;
        }
        function getAmzEnd(){
            return $this->amz_end;
        }
        function getAmzDatCad(){
            return $this->amz_dat_cad;
        }
        function getAmzStatus(){
            return $this->amz_status;
        }
        function insertAmz(){
            $BD = new BD();
            $query = "INSERT INTO CMN_AMZ(AMZ_DES,AMZ_END,AMZ_DAT_CAD,AMZ_STATUS) VALUES(?,?,CURRENT_DATE,?)";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('ssi',$this->amz_des,$this->amz_end,$this->amz_status);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
            
        }
        function updateAmz(){
            $BD = new BD();
            $query = "UPDATE CMN_AMZ SET AMZ_DES = ?, AMZ_END = ?, AMZ_STATUS = ? WHERE AMZ_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('ssii',$this->amz_des,$this->amz_end,$this->amz_status,$this->amz_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function deleteAmz(){
            $BD = new BD();
            $query = "DELETE FROM CMN_AMZ WHERE AMZ_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('i',$this->amz_cod);
            if($stmt->execute()){
                $BD->disconnect();
                return true;
            }else{
                $BD->disconnect();
                return false;
            }
        }
        function getAmz(){
            $BD = new BD();
            $query = "SELECT CMN_AMZ.* FROM CMN_AMZ";
            $stmt = $BD->prepare_statement($query);
            if($stmt->execute()){
                return $stmt->get_result();
            }else{
                return false;
            }            
        }

        function buildAmz(){
            $BD = new BD();
            $query = "SELECT * FROM CMN_AMZ WHERE AMZ_COD = ?";
            $stmt = $BD->prepare_statement($query);
            $stmt->bind_param('i',$this->amz_cod);
            if($stmt->execute()){
                $rs = mysqli_fetch_array($stmt->get_result());
                $this->setAmzDatCad($rs['AMZ_DAT_CAD']);
                $this->setAmzDes($rs['AMZ_DES']);
                $this->setAmzEnd($rs['AMZ_END']);
                $this->setAmzStatus($rs['AMZ_STATUS']);
                return true;
            }else{
                return false;
            }
        }

        function build_amz_select(){
            $BD = new BD();
            $query = "SELECT * FROM CMN_AMZ";
            $stmt = $BD->prepare_statement($query);
            $stmt->execute();
            $rs = $stmt->get_result();
            $select='';
            $select.='<select id="AMZ_SELECT" name="AMZ_SELECT" class="filter_input">';
            while($result = mysqli_fetch_array($rs)){
                $select.='<option value='.$result['AMZ_COD'].'>'.$result['AMZ_DES'].'</option>';
            }
            $select.='</select>';
            echo $select;
        }
    }

?>