<?php
    include_once '../objetos/BUY_INS.php';
    include_once '../objetos/INS_AMZ.php';
    include_once '../objetos/FIN_BUY.php';
    if(isset($_REQUEST['insert'])){        

        //VERIFICA SE O ESTOQUE JÁ EXISTE
        $ins_amz = new INS_AMZ();
        $ins_amz->setAmzCod($_REQUEST['AMZ_COD']);
        $ins_amz->setInsCod($_REQUEST['INS_COD']);
        $ins_amz->setInsQtdDisp($_REQUEST['INS_QTD']);
        if($ins_amz->exists_ins_amz()){
            $ins_amz->buInsAmz();
        }else{
            $ins_amz->insertInsAmz();
        }
        $ins_amz_cod = $ins_amz->get_ins_amz_cod();


        //Criando Histórico de Compra   
        $buy = new BUY_INS();
        $buy->setInsAmzCod($ins_amz_cod);
        $buy->setInsCod($_REQUEST['INS_COD']);
        $buy->setInsQtd($_REQUEST['INS_QTD']);
        
        $fin = new FIN_BUY();
        $buy->setBuyCod($fin->get_last_id());
        if($buy->insertBuyIns()){
            return true;
        }else{
            return false;
        }
    }elseif(isset($_REQUEST['update'])){

    }elseif(isset($_REQUEST['delete'])){
        //FUNÇÃO PARA DELETE

    }elseif(isset($_REQUEST['selectFiltro'])){
        /*$table = '';
        $pes = new CMN_PES();
        $pes_data = $pes->getPes();   
        if($pes_data!=false){        
            $table.='<table id="pes_table" name="pes_table" class="data_table">';
            $table.='<thead>';
            $table.='<tr>';
            $table.='<th>Código</th>';
            $table.='<th>Nome</th>';
            $table.='<th>CPF</th>';
            $table.='<th>Telefone</th>';
            $table.='<th>Email</th>';
            $table.='<th>Endereço</th>';
            $table.='<th>Data Cadastro</th>';
            $table.='</tr>';
            $table.='</thead>';
            while($row = mysqli_fetch_array($pes_data)){
                $dat_cad = date('d/m/Y',strtotime($row['PES_DAT_CAD']));
                $table.='<tr onclick=perfil_pes('.$row['PES_COD'].')>';
                $table.='<td>'.$row['PES_COD'].'</td>';
                $table.='<td>'.$row['PES_NOME'].'</td>';
                $table.='<td>'.$row['PES_CPF'].'</td>';
                $table.='<td>'.$row['PES_TEL'].'</td>';
                $table.='<td>'.$row['PES_EMA'].'</td>';
                $table.='<td>'.$row['PES_END'].'</td>';
                $table.='<td>'.$dat_cad.'</td>';
                $table.='</tr>';
            }
            $table.= '</table>';
            echo $table;*/
        }elseif(isset($_REQUEST['build_table'])){
           /* $ins = new COM_INS();
            $ins->setInsCod($_REQUEST['INS_COD']);
            $ins->build_ins();
            $n_ins_medida = $_REQUEST['INS_MEDIDA'];

            $result = '';
            $result .= '<tr>';
            $result .= '<td>'.$ins->getInsCod().'</td>';
            $result .= '<td>'.$ins->getInsDes().'</td>';
            $result .= '<td>'.$_REQUEST['INS_QTD'].'</td>';
            if($n_ins_medida==0){
                $result .= '<td>Grama</td>';
            }elseif($n_ins_medida==1){
                $result .= '<td>Quilo</td>';
            }elseif($n_ins_medida==2){
                $result .= '<td>Mililitro</td>';
            }else{
                $result .= '<td>Litro</td>';
            }
            $result .= '</tr>';*/
            echo $result;
        }else{
            echo 'cru';
        }
    

?>

