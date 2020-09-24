<?php
    include('../objetos/CMN_PES.php');
    if(isset($_REQUEST['insert'])){        
        //Criando Pessoa   
        $pes = new CMN_PES();
        $pes->setPesCpf($_REQUEST['PES_CPF']);
        $pes->setPesEma($_REQUEST['PES_EMA']);
        $pes->setPesEnd($_REQUEST['PES_END']);
        $pes->setPesNome($_REQUEST['PES_NOME']);
        $pes->setPesTel($_REQUEST['PES_TEL']);

        if($pes->insertPes()){
            echo "<script>window.location.href = '../../html/pessoas.php';
            alert('Cadastro Realizado com Sucesso');</script>";  
        }else{
            echo "<script>window.location.href = '../../html/pessoas.php';
            alert('ERRO ao tentar Cadastrar Insumo');</script>";
        };

    }elseif(isset($_REQUEST['update'])){
        $pes = new CMN_PES();
        $pes->setPesCpf($_REQUEST['PES_CPF']);
        $pes->setPesEma($_REQUEST['PES_EMA']);
        $pes->setPesEnd($_REQUEST['PES_END']);
        $pes->setPesNome($_REQUEST['PES_NOME']);
        $pes->setPesTel($_REQUEST['PES_TEL']);
        $pes->setPesCod($_REQUEST['PES_COD_H']);
        if($pes->updatePes()){
            echo "<script>window.location.href = '../../html/pessoas.php';
            alert('Alteração Realizada com Sucesso');</script>";       
        }else{
            echo "<script>window.location.href = '../../html/pessoas.php';
            alert('ERRO ao tentar Alterar Pessoa');</script>";
        }
    }elseif(isset($_REQUEST['delete'])){
        //FUNÇÃO PARA DELETE

    }elseif(isset($_REQUEST['selectFiltro'])){
        $table = '';
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
            echo $table;
        }else{
        }
    }

?>
