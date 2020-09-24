<html>
    <head>
        <title>Pessoas - Principal</title>
        <link rel="stylesheet" href="../css/view_vendas.css">
        <script src='../js/navBarController.js'></script>
        <script>    
            function get_data(){
                var filtros = 'PES_COD='+document.getElementById('PES_COD').value 
                            + '&'+
                            'PES_DAT_CAD_INI=' + document.getElementById('PES_DAT_CAD_INI').value
                            + '&'+
                            'PES_DAT_CAD_FIM=' + document.getElementById('PES_DAT_CAD_FIM').value
                            + '&'+
                            'PES_NOME=' + document.getElementById('PES_NOME').value
                            + '&'+
                            'PES_END=' + document.getElementById('PES_END').value
                            + '&'+
                            'PES_CPF=' + document.getElementById('PES_CPF').value;
                var url = 'pessoaController.php';
                get_table_data(filtros,url);
            }     
            function perfil_pes(pes_cod){
                location.href = 'pes_perfil.php?PES_COD='+pes_cod;
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
                    <input type='text' id='PES_COD' name='PES_COD' class='filter_input'>
                    <spam class='filter_label'>Data Cadastro Inicio</spam>
                    <input type='date' id='PES_DAT_CAD_INI' name='PES_DAT_CAD_INI' class='filter_input'>
                    <spam class='filter_label'>Data Cadastro Fim</spam>
                    <input type='date' id='PES_DAT_CAD_FIM' name='PES_DAT_CAD_FIM' class='filter_input'>
                    <spam class='filter_label'>Nome</spam>
                    <input type='text' id='PES_NOME' name='PES_NOME' class='filter_input'>
                    <spam class='filter_label'>Endereço</spam>
                    <input type='text' id='PES_END' name='PES_END' class='filter_input'>
                    <spam class='filter_label'>CPF</spam>
                    <input type='text' id='PES_CPF' name='PES_CPF' class='filter_input'>
                    <br>
                    <input type ='button' class='btn' id='pesquisar' name='pesquisar' value='Pesquisar' onclick='get_data()'>
                    <input type='button' onclick='clean_filtro' value = 'Limpar' class='btn'>
            </div>
        </div>
        <div class='table_data'>
            <div class='table' name='table_data' id='table_data'>
            </div>
        </div>
        <input type='button' id='cadastrar' name='cadastrar' class='btn' value='Cadastrar' onclick="location.href = 'cadastroPessoas.php'">

    </body>

</html>