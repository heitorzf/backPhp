<?php
$conectar = mysql_connect("localhost" , "root" , "");
$banco = mysql_select_db("escola");

    if (isset($_POST['inserir']));{

        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $codcurso = $_POST['codcurso'];
        $sql = "insert into curso (codigo , nome , telefone , codcurso) values ('$codigo' , '$nome' , '$telefone' , '$codcurso');";
        $resultado = mysql_query($sql);
        if ($resultado == TRUE) {
            echo "Dados gravados com sucesso";
            
        }
        else {
            echo "erro ao gravar os dados!";
        }
        
    }
    if (isset($_POST['alterar'])){
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $sql = "update aluno set nome = '$nome' , telefone='$telefone' where codigo = '$codigo';";
        $resultado = mysql_query($sql);
        if ($resultado == TRUE){
            echo "Alterou com sucesso";
        }
        else{
            echo "Nao foi possivel alterar os dados";

        }
    }






?>