<?php
    class BD{
        // As variaveis para conexão com o banco de dados
        private $host = "localhost";
        private $user = "root";
        private $db = "SocialProject";
        private $senha = "1234";
        //As variaveis que iremos utilizar na manipulação da conexão com o banco de dados
        private $link;
        
        function BD(){
            $this->connect();
        }
        
        function connect(){
            //Função que realiza a conexão com o servidor do banco
            $this->link = mysqli_connect($this->host,$this->user,$this->senha);
            if(!$this->link){
                // Caso ocorra algum erro ao tentar se conectar ao servidor, ele emite erro.
                print "Ocorreu um Erro na conexão MySQL:";
                print "<b>".mysqli_error($this->link)."</b>";
                die();
            }elseif(!mysqli_select_db($this->link,$this->db)){
                // Seleciona o banco após a conexão
                // Caso ocorra um erro, exibe uma mensagem com o erro
                print "Ocorreu um Erro em selecionar o Banco:";
                print "<b>".mysqli_error($this->link)."</b>";
                die();   
            }
        }
        
        function disconnect(){
            return mysqli_close($this->link);
        }
        
        //Função responsável por executar uma query e retornar os resultados
        function query($_query){
            $this->connect();
            if($_resultado = mysqli_query($this->link,$_query)){
                $this->disconnect();
                return $_resultado;
            }else{
                // Caso ocorra um erro, exibe uma mensagem com o Erro
                print "Ocorreu um erro ao executar a Query MySQL: <b>$_query</b>";
                print "<br /><br />";
                print "Erro no MySQL: <b>".mysqli_error($this->link)."</b>";
                die();
                $this->disconnect();
            }
        }
        
        //Função responsável por preparar um statement
        function prepare_statement($_query){
            $this->connect();
            if($_resultado = mysqli_prepare($this->link,$_query)){
                return $_resultado;
            }else{
                // Caso ocorra um erro, exibe uma mensagem com o Erro
                print "Ocorreu um erro ao preparar o Statement>";
                print "<br /><br />";
                print "Erro no MySQL: <b>".mysqli_error($this->link)."</b>";
                die();  
                $this->disconnect();
            }
        }
        
        
        //Função responsável por retornar o ultimo registro da coluna
        function lastId($table,$column){
            $lastId = mysqli_fetch_array($this->query("SELECT max($column) as LastId FROM $table"));
            return $lastId['LastId'] +1 ;
            
        }
       
        //Função responsaável por criar um select
        /*function createSelect($selectName,$query,$column){
            $consulta = $this->query($query);
            echo "<select name=$boxname>";
            while($_linha = mysqli_fetch_array($consulta)){
                echo "<option value=$_linha[0]>$_linha[$column]</option>";
            }
            echo "</select>";
        }*/
    }
?>