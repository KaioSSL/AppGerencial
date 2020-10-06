<?php
    include('../objetos/COM_INS.php');
    include('../objetos/User.php');
    if(isset($_REQUEST['insert'])){

        $user = new User();
        $user->setLogin($_REQUEST['LOGIN']);
        $user->setPassword($_REQUEST['PASSWORD']);
        $user->setRole($_REQUEST['ROLE']);
        if($user->insertUser()){
            echo "<script>window.location.href = '../../html/users.php';
            alert('Cadastro Realizado com Sucesso');</script>";  
        }else{
            echo "<script>window.location.href = '../../html/users.php';
            alert('ERRO ao tentar Cadastrar Insumo');</script>";
        };

    }elseif(isset($_REQUEST['update'])){

        $user = new User();
        $user->setUserCod($_REQUEST['USER_COD_H']);
        $user->setLogin($_REQUEST['LOGIN']);
        $user->setPassword($_REQUEST['PASSWORD']);
        $user->setRole($_REQUEST['ROLE']);

        if($user->updateUser()){
            echo "<script>window.location.href = '../../html/users.php';
            alert('Alteração Realizada com Sucesso');</script>";       
        }else{
            echo "<script>window.location.href = '../../html/users.php';
            alert('ERRO ao tentar Alterar Insumo');</script>";
        }
    }elseif(isset($_REQUEST['delete'])){
        $user = new User();
        $user->setUserCod($_REQUEST['USER_COD']);
        if($user->deleteUser()){
            echo "<script>window.location.href = '../../html/users.php';
            alert('Deletado com Sucesso');</script>";  
        }else{
            echo "<script>window.location.href = '../../html/users.php';
            alert('ERRO AO DELETAR');</script>";  

        }

    }elseif(isset($_REQUEST['selectFiltro'])){
        $table = '';
        $user = new User();
        $user_data = $user->user_data();   
        if($user_data!=false){        
            $table.='<table id="user_table" name="user_table" class="data_table">';
            $table.='<thead>';
            $table.='<tr>';
            $table.='<th>Código</th>';
            $table.='<th>Login</th>';
            $table.='<th>Senha</th>';
            $table.='<th>Último Login</th>';
            $table.='<th>Permissão</th>';
            $table.='</tr>';
            $table.='</thead>';
            while($row = mysqli_fetch_array($user_data)){
                $dat_cad = date('d/m/Y',strtotime($row['LAST_LOGIN']));
                $table.='<tr onclick=perfil_user('.$row['USER_COD'].')>';
                $table.='<td>'.$row['USER_COD'].'</td>';
                $table.='<td>'.$row['LOGIN'].'</td>';
                $table.='<td>'.$row['PASSWORD'].'</td>';
                $table.='<td>'.$dat_cad.'</td>';
                if($row['ROLE']==1){
                    $table.='<td>Administrador</td>';    
                }else{
                    $table.='<td>Usuário</td>'; 
                }
                $table.='</tr>';
            }
            $table.= '</table>';
            echo $table;
        }else{
        }
    }

?>
