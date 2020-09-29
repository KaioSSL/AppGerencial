<?php
    include "../php/objetos/BD.php";
?>
<html>
    <head>
        <title>Cadastro - Compra</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/view_vendas.css">
        <script src='../js/navBarController.js'></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script> 
        <script>
            function add_ins(){
                var ins_cod = document.getElementById('INS_SELECT').value;
                var amz_cod = document.getElementById('AMZ_SELECT').value;
                var ins_qtd = document.getElementById('INS_QTD').value;
                var action = '../php/controllers/comprasController.php?build_table=1&INS_COD='+ins_cod+'&INS_QTD='+ins_qtd;
                AjaxRequest();
                Ajax.onreadystatechange = function(){
                    if (this.readyState == 4 && this.status == 200) {
                        var table = document.getElementById('form_table_data');
                        var linha = table.insertRow(-1);
                        linha.innerHTML = Ajax.responseText;
                    };
                }
                Ajax.open('GET', action,true);	
                Ajax.send(null);
                closeModal();
                var ins_qtd = document.getElementById('INS_QTD').value ='';
            }
            function insert_buy(){
                var table = document.getElementById('form_table_data');
                if(table.rows.length>1){
                    var buy_dat = document.getElementById('BUY_DAT').value;
                    var for_cod = document.getElementById('PES_SELECT').value;
                    var amz_cod = document.getElementById('AMZ_SELECT').value;
                    var tot_vlr = document.getElementById('BUY_TOT_VLR').value;
                    //var action_buy_ins = '../php/controllers/comprasController.php?insert=1&BUY_DAT='+buy_dat+'&PES_SELECT='+for_cod+'&BUY_TOT_VLR='+tot_vlr+'&AMZ_COD='+amz_cod;
                    $.ajax({
                        type: "POST",
                        url: '../php/controllers/comprasController.php',
                        data: 'insert=1&BUY_DAT='+buy_dat+'&PES_SELECT='+for_cod+'&BUY_TOT_VLR='+tot_vlr+'&AMZ_COD='+amz_cod,
                        success: insert_buy_ins
                    });
                    alert("Cadastro realizado com sucesso.");
                    location.href = 'compras.php';
                    return false;
                }else{
                    alert('Informe algum Insumo');
                }
            }
            function insert_buy_ins(){
                var table = document.getElementById('form_table_data');
                for (var linha = 1, tamanhoTable = table.rows.length; linha < tamanhoTable;linha++) {
                    var amz_cod = document.getElementById('AMZ_SELECT').value;
                    var ins_cod = table.rows[linha].cells[0].innerHTML;
                    var ins_qtd = table.rows[linha].cells[2].innerHTML;
                    $.ajax({
                        type: "POST",
                        url: '../php/controllers/buy_ins_controller.php',
                        data: 'insert=1&AMZ_COD='+amz_cod+'&INS_COD='+ins_cod+'&INS_QTD='+ins_qtd
                    });
                    //alert('insert=1&AMZ_COD='+amz_cod+'&INS_COD='+ins_cod+'&INS_QTD='+ins_qtd);
                }      
            }

                
            
               
            function delete_ins(){
                alert('teste');
            }
            function openModal(){
                document.getElementById('modal').style.display='block';
            }
            function closeModal(){
                document.getElementById('modal').style.display='none';
            }

        </script>     
    </head>
    <body>
        <?php
            include 'navBar.php';
        ?>
        <div class='div_cadastro'>
                <spam class='filter_label'>Data Compra</spam>
                <input type='date' name='BUY_DAT' id='BUY_DAT' class='filter_input' required>
                <spam class='filter_label'>Fornecedor</spam>
                <?php
                    $bd = new BD();
                    $query = "SELECT * FROM CMN_PES";
                    $selectName = "PES_SELECT";
                    $columnId = "PES_COD";
                    $columnDes = "PES_NOME";
                    $bd->build_select($selectName,$query,$columnId,$columnDes); 
                ?>
                <spam class='filter_label'>Armazem</spam>
                <?php
                    $query = "SELECT * FROM CMN_AMZ";
                    $selectName = "AMZ_SELECT";
                    $columnId = "AMZ_COD";
                    $columnDes = "AMZ_DES";
                    $bd->build_select($selectName,$query,$columnId,$columnDes);
                ?>
                <spam class='filter_label'>Valor Total</spam>
                <input type='text' name='BUY_TOT_VLR' id='BUY_TOT_VLR' class='filter_input' required>
                <br>
                <div class='sub_form' name='sub_form' id='sub_form'>
                    <div class='form_table_title' id='form_table_title' name='form_table_title'>
                        <spam class='filter_title'>Insumos</spam>
                        <spam class='icon_action' onclick='openModal()'><img src="../img/plus24.png"></spam>
                        <spam class='icon_action' onclick='delete_ins()'><img src="../img/delete24.png"></spam>
                    </div>   
                    <div class='form_table' id='form_table' name='form'>
                        <table class='data_table' id='form_table_data' name='form_table_data'>
                            <thead>
                                <tr>
                                    <th>Cód</th>
                                    <th>Descrição</th>
                                    <th>Quantidade</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class='modal' id='modal' name='modal'>
                        <div class='div_subcadastro' name='div_subcadastro' id='div_subcadastro'>
                            <spam class='filter_label'>Insumo: </spam>
                            <?php 
                                $query = "SELECT * FROM COM_INS";
                                $selectName = "INS_SELECT";
                                $columnId = "INS_COD";
                                $columnDes = "INS_DES";
                                $bd->build_select($selectName,$query,$columnId,$columnDes);
                            ?><br>   
                            <spam class='filter_label'>Armazem: </spam>
                            <?php 
                                $query = "SELECT * FROM CMN_AMZ";
                                $selectName = "AMZ_SELECT";
                                $columnId = "AMZ_COD";
                                $columnDes = "AMZ_DES";
                                $bd->build_select($selectName,$query,$columnId,$columnDes);
                            ?><br>
                            <spam class='filter_label'>Quantidade: </spam>
                            <input type="text" name='INS_QTD' id='INS_QTD' class='filter_input'>
                            <br>
                            <input type='button' id='ins_add' name='ins_add' class='btn' value='Adicionar' onclick='add_ins()'>
                            <input type='button' id='cancelar' name='cancelar' class='btn' value='Cancelar' onclick='closeModal()'>

                        </div>
                    </div>
                </div>
                <input type='submit' id='insert' name='insert' class='btn' value='Cadastrar' onclick='insert_buy()'>
                <input type='button' id='limpar' name='limpar' class='btn' value='Limpar'>
                <input type='button' id='voltar' name='voltar' class='btn' value='Listagem' onclick="location.href = 'compras.php'">
        </div>
    </body>
</html>
