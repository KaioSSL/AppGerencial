<html>
    <head>
        <title>Insumos - Principal</title>
        <link rel="stylesheet" href="../css/view_vendas.css">
        <script src='../js/navBarController.js'></script>
        <script>          
        </script>
        
    </head>
    <body>
        <?php
            include 'navBar.php';
        ?>
        <div class='div_filter' >
            <div class='filter_header' onclick='show_filter_body()' id='filter_header'>
                <spam class='filter_title'>Filtros</spam>
            </div>
            <div class='filter_body' id='filter_body'>
                <form id='form_filter' method='get' action='../php/insumosController.php'>
                    <spam class='filter_label'>Código</spam>
                    <input type='text' id='INS_COD' name='INS_COD' class='filter_input'>
                    <spam class='filter_label'>Data Cadastro Inicio</spam>
                    <input type='date' id='INS_DAT_CAD' name='INS_DAT_CAD' class='filter_input'>
                    <spam class='filter_label'>Data Cadastro Fim</spam>
                    <input type='date' id='INS_DAT_CAD' name='INS_DAT_CAD' class='filter_input'>
                    <spam class='filter_label'>Descrição</spam>
                    <input type='text' id='INS_DES' name='INS_DES' class='filter_input'>
                    <spam class='filter_label'>Cód. Armazem</spam>
                    <input type='text' id='AMZ_COD' name='AMZ_COD' class='filter_input'>
                    <br>
                    <input type ='submit' class='btn' id='pesquisar' name='pesquisar' value='Pesquisar'><input type='button' onclick='clean_filtro' value = 'Limpar' class='btn'>
                </form>
            </div>
        </div>
        <div class='table_data'>
            <div class='table'>
            </div>
        </div>
        <input type='button' id='cadastrar' name='cadastrar' class='btn' value='Cadastrar' onclick="location.href = 'cadastroInsumos.php'">

    </body>

</html>