<html>
    <head>
        <title>Cadastro - Insumo</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/view_vendas.css">
        <script src='../js/navBarController.js'></script>        
    </head>
    <body>
        <?php
            include 'navBar.php';
        ?>
        <div class='div_cadastro'>
            <form action='../php/controllers/insumoController.php' method='get'>
                <spam class='filter_label'>Descrição</spam>
                <input type='text' name='INS_DES' id='INS_DES' class='filter_input' required>
                <spam class='filter_label'>Medida</spam>
                <select id='INS_MEDIDA' name='INS_MEDIDA' class='filter_input'>
                    <option value='0'>Grama</option>
                    <option value='1'>Quilo</option>
                    <option value='2'>Militro</option>
                    <option value='3'>Litro</option>
                </select>
                <spam class='filter_label'>Valor Medida</spam>
                <input type='text' name='INS_VLR_MEDIDA' id='INS_VLR_MEDIDA' class='filter_input' required>
                <spam class='filter_label'>Peso</spam>
                <input type='text' name='INS_PESO' id='INS_PESO' class='filter_input' required>
                <br>
                <input type='submit' id='insert' name='insert' class='btn' value='Cadastrar'>
                <input type='button' id='limpar' name='limpar' class='btn' value='Limpar'>
                <input type='button' id='voltar' name='voltar' class='btn' value='Listagem' onclick="location.href = 'insumos.php'">
            </form>
        </div>
    </body>
</html>