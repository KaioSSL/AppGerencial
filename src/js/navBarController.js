function set_active($id_menu){
    if($id_menu=1){
        document.getElementById('a_vendas').style.backgroundColor = 'rgb(5,131,171)';
        document.getElementById('a_inicial').style.backgroundColor ='rgb(4,112,146)';
        document.getElementById('a_compras').style.backgroundColor ='rgb(4,112,146)';
        document.getElementById('a_produtos').style.backgroundColor= 'rgb(4,112,146)';
        document.getElementById('a_insumos').style.backgroundColor = 'rgb(4,112,146)';
        document.getElementById('a_armazem').style.backgroundColor = 'rgb(4,112,146)';
        document.getElementById('a_relatorios').style.backgroundColor = 'rgb(4,112,146)';
        alert('gozei');
    }

}
