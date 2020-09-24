<html>
    <head>
        <title>Armazens - Principal</title>
        <link rel="stylesheet" href="../css/view_vendas.css">
        <script src='../js/navBarController.js'></script>
        <script>     
        function get_data(){
                var filtros = 'AMZ_COD='+document.getElementById('AMZ_COD').value 
                            + '&'+
                            'AMZ_DAT_CAD_INI=' + document.getElementById('AMZ_DAT_CAD_INI').value
                            + '&'+
                            'AMZ_DAT_CAD_FIM=' + document.getElementById('AMZ_DAT_CAD_FIM').value
                            + '&'+
                            'AMZ_DES=' + document.getElementById('AMZ_DES').value;
                var url = 'armazemController.php';
                get_table_data(filtros,url);  
            };
        function perfilAmz(cod){
            location.href = 'armazemPerfil.php?'+'AMZ_COD='+cod
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
                <input type='text' id='AMZ_COD' name='AMZ_COD' class='filter_input'>
                <spam class='filter_label'>Data Cadastro Inicio</spam>
                <input type='date' id='AMZ_DAT_CAD_INI' name='AMZ_DAT_CAD_INI' class='filter_input'>
                <spam class='filter_label'>Data Cadastro Fim</spam>
                <input type='date' id='AMZ_DAT_CAD_FIM' name='AMZ_DAT_CAD_FIM' class='filter_input'>
                <spam class='filter_label'>Descrição</spam>
                <input type='text' id='AMZ_DES' name='AMZ_DES' class='filter_input'>
                <br>
                <input type ='button' class='btn' id='pesquisar' name='pesquisar' value='Pesquisar' onclick='get_data()'>
                <input type='button' onclick='clean_filtro' value = 'Limpar' class='btn'>

            </div>
        </div>
        <div class='table_data'>
            <div class='table' id='table_data' name='table_data'>
            </div>
        </div>
            <input type='button' id='cadastrar' name='cadastrar' class='btn' value='Cadastrar' onclick="location.href = 'cadastroArmazem.php'">
    </body>

</html>