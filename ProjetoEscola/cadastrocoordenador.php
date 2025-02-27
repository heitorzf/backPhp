<?php
    $conectar = mysql_connect("localhost" , "root" , "");
    $banco = mysql_select_db("escola");
    if (isset($_POST['inserir'])) {
        $codigo = $_POST['codcoordenador'];
        $nome = $_POST['nome'];
        $sql = "insert into coordenador (codigo , nome) values ('$codigo' , '$nome');";
        $resultado = mysql_query($sql);
        if ($resultado == TRUE) {
            echo "Dados gravados com sucesso!!!";
        }
        else {
            echo "erro ao gravar os dados!";
        }
    }
    if (isset($_POST['alterar'])){
        $codigo = $_POST['codcoordenador'];
        $nome = $_POST['nome'];
        $sql = "update coordenador set nome = '$nome' where codigo = '$codigo';";
        $resultado = mysql_query($sql);
        if ($resultado == TRUE) {
            echo "Dados alter com sucesso!!!";
        }
        else {
            echo "erro ao gravar os dados!";
        }
    
    }
    if (isset($_POST['excluir'])){
        $codigo = $_POST['codcoordenador'];
        $nome = $_POST['nome'];
        $sql = "delete from coordenador where codigo = '$codigo';";
        $resultado = mysql_query($sql);
        if ($resultado == TRUE) {
            echo "Dados apagar com sucesso!!!";
        }
        else {
            echo "erro ao apagar os dados!" . mysql_error();
        }
    }   
    if (isset($_POST['pesquisar'])){
        
        $sql = "select * from coordenador;";
        $resultado = mysql_query($sql);
        if (mysql_num_rows($resultado) == 0) {
            echo "erro ao pesquisar dados" . mysql_error();
            
            }
        else {
            echo "<b>"."Pesquisa por coordenador:"."</b><b>";
            while ($dados = mysql_fetch_array($resultado))
            {
                echo "Cdigo : ".$dados['codigo']."<br>".
                "Nome   :".$dados['nome']."<br></br>";
            }
        }
    }   
    
?>