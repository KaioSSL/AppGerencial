<html>
    <head>
        <title>Insumos - Principal</title>
        <link rel="stylesheet" href="../css/view_vendas.css">
        <script src='../js/navBarController.js'></script>
        <script>    
            function get_data(){
                var filtros = 'INS_COD='+document.getElementById('INS_COD').value 
                            + '&'+
                            'INS_DAT_CAD_INI=' + document.getElementById('INS_DAT_CAD_INI').value
                            + '&'+
                            'INS_DAT_CAD_FIM=' + document.getElementById('INS_DAT_CAD_FIM').value
                            + '&'+
                            'AMZ_COD=' + document.getElementById('AMZ_COD').value
                            + '&'+
                            'INS_DES=' + document.getElementById('INS_DES').value;
                var url = 'insumoController.php'                            ;
                get_table_data(filtros,url);
            }     
            function perfil_ins(ins_cod){
                location.href = 'ins_perfil.php?INS_COD='+ins_cod;
            } 
        </script>
        
    </head>
    <body onload="get_data()">
        <?php
            include 'navBar.php';
        ?>
        <div class='div_filter' >
            <div class='filter_header' onclick='show_filter_body()' id='filter_header'>
                <spam class='filter_title'>Filtros</spam>
            </div>
            <div class='filter_body' id='filter_body'>
                    <spam class='filter_label'>Código</spam>
                    <input type='text' id='INS_COD' name='INS_COD' class='filter_input'>
                    <spam class='filter_label'>Data Cadastro Inicio</spam>
                    <input type='date' id='INS_DAT_CAD_INI' name='INS_DAT_CAD_INI' class='filter_input'>
                    <spam class='filter_label'>Data Cadastro Fim</spam>
                    <input type='date' id='INS_DAT_CAD_FIM' name='INS_DAT_CAD_FIM' class='filter_input'>
                    <spam class='filter_label'>Descrição</spam>
                    <input type='text' id='INS_DES' name='INS_DES' class='filter_input'>
                    <spam class='filter_label'>Cód. Armazem</spam>
                    <input type='text' id='AMZ_COD' name='AMZ_COD' class='filter_input'>
                    <br>
                    <input type ='button' class='btn' id='pesquisar' name='pesquisar' value='Pesquisar' onclick='get_data()'>
                    <input type='button' onclick='clean_filtro' value = 'Limpar' class='btn'>
            </div>
        </div>
        <div class='table_data'>
            <div class='table' name='table_data' id='table_data'>
            </div>
        </div>
        <input type='button' id='cadastrar' name='cadastrar' class='btn' value='Cadastrar' onclick="location.href = 'cadastroInsumos.php'">

    </body>

</html>