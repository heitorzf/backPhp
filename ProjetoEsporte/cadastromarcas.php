<?php
$conectar = mysql_connect('localhost', 'root', '');
$banco = mysql_select_db("loja");

if (isset($_POST['gravar'])) {
    $nome = $_POST['nome'];

    $sql = "INSERT INTO marca (nome) VALUES ('$nome')";
    $resultado = mysql_query($sql);

    if ($resultado) {
        echo "Dados gravados com sucesso";
    } else {
        echo "Erro ao gravar os dados.";
    }
}

if (isset($_POST['excluir'])) {
    $codigo = $_POST['codigo'];
    $sql = "DELETE FROM marca WHERE codigo = '$codigo'";
    $resultado = mysql_query($sql);

    if ($resultado) {
        echo "Dados apagados com sucesso.";
    } else {
        echo "Falha ao excluir os dados.";
    }
}

if (isset($_POST['alterar'])) {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];

    $sql = "UPDATE marca SET nome = '$nome' WHERE codigo = '$codigo'";
    $resultado = mysql_query($sql);

    if ($resultado) {
        echo "Dados alterados com sucesso.";
    } else {
        echo "Falha ao alterar os dados.";
    }
}

if (isset($_POST['pesquisar'])) {
    $codigo = $_POST['codigo'];

    $sql = "SELECT * FROM marca WHERE codigo = '$codigo'";
    $resultado = mysql_query($sql);

    if ($resultado) {
        if (mysql_num_rows($resultado) > 0) {
            $row = mysql_fetch_assoc($resultado);
            echo "Código: " . $row['codigo'] . "<br>";
            echo "Nome: " . $row['nome'] . "<br>";
        } else {
            echo "Nenhuma marca encontrada com esse código.";
        }
    } else {
        echo "Erro ao pesquisar os dados.";
    }
}
?>
