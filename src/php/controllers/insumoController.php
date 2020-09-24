<?php
    include('../objetos/COM_INS.php');
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
            /*header('location:../controllers/ins_amz_controller.php?insert=1&INS_COD='.$ins->get_ins_last_id().'&AMZ_COD='.$_REQUEST['AMZ_SELECT']);*/
            echo "<script>window.location.href = '../../html/insumos.php';
            alert('Cadastro Realizado com Sucesso');</script>";  
        }else{
            echo "<script>window.location.href = '../../html/insumos.php';
            alert('ERRO ao tentar Cadastrar Insumo');</script>";
        };

    }elseif(isset($_REQUEST['update'])){
        $ins = new COM_INS();
        $ins->setInsVlrMedida($_REQUEST['INS_VLR_MEDIDA']);
        $ins->setInsDes($_REQUEST['INS_DES']);
        $ins->setInsPeso($_REQUEST['INS_PESO']);
        $ins->setInsMedida($_REQUEST['INS_MEDIDA']);
        $ins->setInsCod($_REQUEST['INS_COD_H']);

        if($ins->updateIns()){
            echo "<script>window.location.href = '../../html/insumos.php';
            alert('Alteração Realizada com Sucesso');</script>";       
        }else{
            echo "<script>window.location.href = '../../html/insumos.php';
            alert('ERRO ao tentar Alterar Insumo');</script>";
        }
    }elseif(isset($_REQUEST['delete'])){
        //FUNÇÃO PARA DELETE

    }elseif(isset($_REQUEST['selectFiltro'])){
        $table = '';
        $ins = new COM_INS();
        $ins_data = $ins->getIns();   
        if($ins_data!=false){        
            $table.='<table id="ins_table" name="ins_table" class="data_table">';
            $table.='<thead>';
            $table.='<tr>';
            $table.='<th>Código</th>';
            $table.='<th>Descrição</th>';
            $table.='<th>Peso</th>';
            $table.='<th>Dta. Cadastro</th>';
            $table.='<th>Medida</th>';
            $table.='<th>Vlr. Medida</th>';
            $table.='</tr>';
            $table.='</thead>';
            while($row = mysqli_fetch_array($ins_data)){
                $dat_cad = date('d/m/Y',strtotime($row['INS_DAT_CAD']));
                $table.='<tr onclick=perfil_ins('.$row['INS_COD'].')>';
                $table.='<td>'.$row['INS_COD'].'</td>';
                $table.='<td>'.$row['INS_DES'].'</td>';
                $table.='<td>'.$row['INS_PESO'].'</td>';
                $table.='<td>'.$dat_cad.'</td>';
                $table.='<td>'.$row['INS_MEDIDA'].'</td>';
                $table.='<td>'.$row['INS_VLR_MEDIDA'].'</td>';
                $table.='</tr>';
            }
            $table.= '</table>';
            echo $table;
        }else{
        }
    }

?>
