<?php
    include('../objetos/COM_INS.php');
    require('../objetos/INS_AMZ.php');
    if(isset($_REQUEST['insert'])){
        //FUNÇÃO PARA CADASTRO DE INSUMOS
        //echo "<script>alert('teste');</script>";
        
        //Criando Insumo
        $ins = new COM_INS();
        $ins->setInsDes($_REQUEST['INS_DES']);
        $ins->setInsMedida($_REQUEST['INS_MEDIDA']);
        $ins->setInsPeso($_REQUEST['INS_PESO']);
        $ins->setInsVlrMedida($_REQUEST['INS_VLR_MEDIDA']);
        if($ins->insertIns()){
            //Criando Tabela Ligação entre Insumo e Armazem (Estoque)
            $ins_amz = new INS_AMZ();
            $ins_amz->setInsCod($ins->get_ins_last_id());
            $ins_amz->setAmzCod($_REQUEST['AMZ_SELECT']);
            $ins_amz->setInsQtdDisp(0);
            if($ins_amz->insertInsAmz()){
                echo "<script>window.location.href = '../../html/insumos.php';
                alert('Cadastro Realizado com Sucesso');</script>";                
            }
        }else{
            echo "<script>window.location.href = '../../html/insumos.php';
            alert('ERRO ao tentar Cadastrar Insumo');</script>";
        };

    }elseif(isset($_REQUEST['update'])){
        /*$amz = new CMN_AMZ();
        $amz->setAmzCod($_REQUEST['AMZ_COD_H']);
        $amz->setAmzDes($_REQUEST['AMZ_DES']);
        $amz->setAmzEnd($_REQUEST['AMZ_END']);
        $amz->setAmzStatus($_REQUEST['AMZ_STATUS']);
        if($amz->updateAmz()){
            echo "<script>window.location.href = '../../html/armazem.php';
            alert('Alteração Realizada com Sucesso');</script>";       
        }else{
            echo "<script>window.location.href = '../../html/armazem.php';
            alert('ERRO ao tentar Alterar Armazem');</script>";
        }*/
    }elseif(isset($_REQUEST['delete'])){
        //FUNÇÃO PARA DELETE

    }elseif(isset($_REQUEST['selectFiltro'])){
        /*$table = '';
        $amz = new CMN_AMZ();
        $amz_data = $amz->getAmz();   
        if($amz_data!=false){        
            $table.='<table id="amz_table" name="amz_table" class="data_table">';
            $table.='<thead>';
            $table.='<tr>';
            $table.='<th>Código</th>';
            $table.='<th>Descrição</th>';
            $table.='<th>Endereço</th>';
            $table.='<th>Dta. Cadastro</th>';
            $table.='<th>Status</th>';
            $table.='</tr>';
            $table.='</thead>';
            while($row = mysqli_fetch_array($amz_data)){
                $dat_cad = date('d/m/Y',strtotime($row['AMZ_DAT_CAD']));
                $table.='<tr onclick=perfilAmz('.$row['AMZ_COD'].')>';
                $table.='<td>'.$row['AMZ_COD'].'</td>';
                $table.='<td>'.$row['AMZ_DES'].'</td>';
                $table.='<td>'.$row['AMZ_END'].'</td>';
                $table.='<td>'.$dat_cad.'</td>';
                if($row['AMZ_STATUS']==1){
                    $table.='<td>Ativo</td>';
                }else{
                    $table.='<td>Inativo</td>';
                }
                $table.='</tr>';
            }
            $table.= '</table>';
            echo $table;
        }else{
        }*/
    }

?>
