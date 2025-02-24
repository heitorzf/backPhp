<?php
$conectar = mysql_connect("localhost" , "root" ."");
$banco = mysql_select_db("escola");
// conexao do banc
    
    if (isset($_POST['inserir'])) {           
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $coordenador = $_POST['coordenador'];
        //comando sql do banco de dados
        $sql = "insert into curso (codigo , nome , coordenador) values ('$codigo' , '$nome' , '$coordenador');";
        //mandar executar o comando sql
        $resultado = mysql_query($sql);
        if ($resultado == TRUE) {
            echo "Dados gravados com sucesso!!!";
        }
        else {
            echo "Erro ao gravar os dados!";
        }

    }
?>