<?php
    include_once '../objetos/FIN_BUY.php';
    include_once '../objetos/COM_INS.php';
    if(isset($_REQUEST['insert'])){        
        //Criando Pessoa   
        $buy = new FIN_BUY();
        $buy->setBuyDat($_REQUEST['BUY_DAT']);
        $buy->setPesCodFor($_REQUEST['PES_SELECT']);
        $buy->setBuyTotVlr($_REQUEST['BUY_TOT_VLR']);
        $buy->setAmzCod($_REQUEST['AMZ_COD']);
        if($buy->insertBuy()){
            return true;
        }else{
            return false;
        };
        
    }elseif(isset($_REQUEST['update'])){

    }elseif(isset($_REQUEST['delete'])){
        //FUNÇÃO PARA DELETE

    }elseif(isset($_REQUEST['selectFiltro'])){
        $table = '';
        $buy = new FIN_BUY();
        $buy_data = $buy->getBuy();   
        if($buy_data!=false){        
            $table.='<table id="buy_table" name="buy_table" class="data_table">';
            $table.='<thead>';
            $table.='<tr>';
            $table.='<th>Código</th>';
            $table.='<th>Data Compra</th>';
            $table.='<th>Valor Total</th>';
            $table.='<th>Fornecedor</th>';
            $table.='<th>Armazem</th>';
            $table.='<th>Data Cadastro</th>';
            $table.='</tr>';
            $table.='</thead>';
            while($row = mysqli_fetch_array($buy_data)){
                $dat_cad = date('d/m/Y',strtotime($row['BUY_DAT_CAD']));
                $buy_dat = date('d/m/Y',strtotime($row['BUY_DAT']));
                $table.='<tr onclick=perfil_buy('.$row['BUY_COD'].')>';
                $table.='<td>'.$row['BUY_COD'].'</td>';
                $table.='<td>'.$buy_dat.'</td>';
                $table.='<td>'.$row['BUY_TOT_VLR'].'</td>';
                $table.='<td>'.$row['PES_COD_FOR'].'</td>';
                $table.='<td>'.$row['AMZ_COD'].'</td>';
                $table.='<td>'.$dat_cad.'</td>';
                $table.='</tr>';
            }
            $table.= '</table>';
            echo $table;
        }   
    }elseif(isset($_REQUEST['build_table'])){
            $ins = new COM_INS();
            $ins->setInsCod($_REQUEST['INS_COD']);
            $ins->build_ins();

            $result = '';
            $result .= '<tr>';
            $result .= '<td>'.$ins->getInsCod().'</td>';
            $result .= '<td>'.$ins->getInsDes().'</td>';
            $result .= '<td>'.$_REQUEST['INS_QTD'].'</td>';
            $result .= '</tr>';
            echo $result;
    }elseif(isset($_REQUEST['build_buy_itens'])){
        $buy = new FIN_BUY();
        $buy->setBuyCod($_REQUEST['BUY_COD']);
        $buy_itens =  $buy->get_buy_itens();
        $table_rows = '';
        $table_rows.="<table class='data_table' id='form_table_data' name='form_table_data'>
                        <thead>
                            <tr>
                                <th>Cód</th>
                                <th>Descrição</th>
                                <th>Quantidade</th>
                            </tr>
                        </thead>";
        while($row = mysqli_fetch_array($buy_itens)){
            $table_rows .= '<tr>';
            $table_rows .= '<td>'.$row['INS_COD'].'</td>';
            $table_rows .= '<td>'.$row['INS_DES'].'</td>';
            $table_rows .= '<td>'.$row['INS_QTD'].'</td>';
            $table_rows .= '</tr>';
        }
        $table_rows.= '</table>';
        echo $table_rows;
    }
    


?>
