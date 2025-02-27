<?php
$conectar = mysql_connect("localhost" , "root" ,"");
$banco = mysql_select_db("escola");
// conexao do banc
    
    if (isset($_POST['inserir'])) {           
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $coordenador = $_POST['coordenador'];
        //comando sql do banco de dados
        $sql = "insert into curso (codigo , nome , codcoordenador) values ('$codigo' , '$nome' , '$coordenador');";
        //mandar executar o comando sql
        $resultado = mysql_query($sql);
        if ($resultado == TRUE) {
            echo "Dados gravados com sucesso!!!";
        }
        else {
            echo "Erro ao gravar os dados!";
        }
    

    }
    if (isset($_POST['alterar'])){
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $coordenador = $_POST['coordenador'];
        $sql = "update curso set nome = '$nome' where codigo = '$codigo';";
        $resultado = mysql_query($sql);
        if ($resultado == TRUE){
            echo "Dados alterados com sucesso";
        }
        else {
            echo "Erro ao alterar dados.";
        }
    }
    if (isset($_POST['excluir'])){
        $codigo = $_POST['codigo'];
        $sql = "delete from curso where codigo = '$codigo';";
        $resultado = mysql_query($sql);
        if($resultado == TRUE){
            echo "Dados excluidos com sucesso";
        }
        else {
            echo "Erro ao excluir dados.";
        } 

    }
    if (isset($_POST['pesquisar'])){
            $sql = "select * from curso;";
            $resultado = mysql_query($sql);
            if (mysql_num_rows($resultado) == 0){
                echo "erro ao pesquisar dados";

            }
            else{
                echo "<b>"."Pesquisa por curso:"."</b><b>";
                while ($dados = mysql_fetch_array($resultado)){
                    echo "Codigo : ".$dados['codigo']."<br>".
                    "Nome: ".$dados['nome']."<br>".
                    "codigo do Coordenador: ".$dados['codcoordenador']."<br>";
                }
            }


    }
?>