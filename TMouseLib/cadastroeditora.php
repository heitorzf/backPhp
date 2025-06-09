<?php
$conectar = mysqli_connect('localhost', 'root', '');
$banco = mysqli_select_db($conectar, "livraria");

if (isset($_POST['gravar'])) {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    
    $sql = "INSERT INTO editora (codigo, nome) VALUES ('$codigo', '$nome')";
    $resultado = mysqli_query($conectar, $sql);

    if ($resultado) {
        echo "<div class='mensagem sucesso'>Dados gravados com sucesso!</div>";
    } else {
        echo "<div class='mensagem erro'>Erro ao gravar os dados: " . mysqli_error($conectar) . "</div>";
    }
}

if (isset($_POST['excluir'])) {
    $codigo = $_POST['codigo'];
    
    $sql = "DELETE FROM editora WHERE codigo = '$codigo'";
    $resultado = mysqli_query($conectar, $sql);

    if ($resultado) {
        echo "<div class='mensagem sucesso'>Dados apagados com sucesso!</div>";
    } else {
        echo "<div class='mensagem erro'>Falha ao excluir os dados: " . mysqli_error($conectar) . "</div>";
    }
}

if (isset($_POST['alterar'])) {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
   
    $sql = "UPDATE editora SET nome = '$nome' WHERE codigo = '$codigo'";
    $resultado = mysqli_query($conectar, $sql);

    if ($resultado) {
        echo "<div class='mensagem sucesso'>Dados alterados com sucesso!</div>";
    } else {
        echo "<div class='mensagem erro'>Falha ao alterar os dados: " . mysqli_error($conectar) . "</div>";
    }
}

if (isset($_POST['pesquisar'])) {
    $codigo = $_POST['codigo'];
    
    $sql = "SELECT * FROM editora WHERE codigo = '$codigo'";
    $resultado = mysqli_query($conectar, $sql);

    if ($resultado) {
        if (mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);
            echo "<div class='mensagem info'>";
            echo "Código: " . $row['codigo'] . "<br>";
            echo "Nome: " . $row['nome'] . "<br>";
            echo "</div>";
        } else {
            echo "<div class='mensagem erro'>Nenhuma editora encontrada com esse código.</div>";
        }
    } else {
        echo "<div class='mensagem erro'>Erro ao pesquisar os dados: " . mysqli_error($conectar) . "</div>";
    }
}

echo "<script>setTimeout(function(){ window.location.href = 'cadastroeditora.html'; }, 3000);</script>";
?> 