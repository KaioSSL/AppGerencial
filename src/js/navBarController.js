function set_active(id_menu){
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

function show_filter_body(){
    if(document.getElementById('filter_body').style.display == "none"){
        document.getElementById('filter_body').style.display = "block";
        document.getElementById('filter_header').style.backgroundColor = 'rgb(242,244,244)';
    }else{
        document.getElementById('filter_body').style.display = "none";
        document.getElementById('filter_header').style.backgroundColor = 'white';
    }
    ;
} 
function get_table_data(filtros,url){
    var defaultURL = '../php/controllers/'+url+'?selectFiltro=1&'+filtros;
    AjaxRequest();
    Ajax.onreadystatechange = set_table_data;
    Ajax.open('POST', defaultURL,true);	
    Ajax.send(null);
}

function set_table_data() {
if (Ajax.readyState == 4) {
    if (Ajax.status == 200) {
        document.getElementById('table_data').innerHTML = Ajax.responseText;
        }			
    }
}

function AjaxRequest() {
    Ajax = false;
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
        Ajax = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE
        try {
            Ajax = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                Ajax = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
        }
    }		
}
