<?php
$conectar = mysqli_connect('localhost', 'root', '');
$banco = mysqli_select_db($conectar, "livraria");

if (isset($_POST['gravar'])) {
    $codigo = $_POST['codigo'];
    $titulo = $_POST['titulo'];
    $nrpaginas = $_POST['nrpaginas'];
    $ano = $_POST['ano'];
    $codautor = $_POST['codautor'];
    $codcategoria = $_POST['codcategoria'];
    $codeditora = $_POST['codeditora'];
    $resenha = $_POST['resenha'];
    $preco = $_POST['preco'];
    
    
    $diretorio = "capas/";
    if (!file_exists($diretorio)) {
        mkdir($diretorio, 0777, true);
    }
    
    
    $fotocapa1 = '';
    if(isset($_FILES['fotocapa1']) && $_FILES['fotocapa1']['error'] == 0) {
        $extensao1 = strtolower(substr($_FILES['fotocapa1']['name'], -4));
        $novo_nome1 = md5(time().$extensao1);
        move_uploaded_file($_FILES['fotocapa1']['tmp_name'], $diretorio.$novo_nome1);
        $fotocapa1 = $novo_nome1;
    }
    
    
    $fotocapa2 = '';
    if(isset($_FILES['fotocapa2']) && $_FILES['fotocapa2']['error'] == 0) {
        $extensao2 = strtolower(substr($_FILES['fotocapa2']['name'], -4));
        $novo_nome2 = md5(time().$extensao2);
        move_uploaded_file($_FILES['fotocapa2']['tmp_name'], $diretorio.$novo_nome2);
        $fotocapa2 = $novo_nome2;
    }
    
    $sql = "INSERT INTO livro (codigo, titulo, nrpaginas, ano, codautor, codcategoria, codeditora, resenha, preco, fotocapa1, fotocapa2) 
            VALUES ('$codigo', '$titulo', '$nrpaginas', '$ano', '$codautor', '$codcategoria', '$codeditora', '$resenha', '$preco', '$fotocapa1', '$fotocapa2')";
    $resultado = mysqli_query($conectar, $sql);

    if ($resultado) {
        echo "<div class='mensagem sucesso'>Dados gravados com sucesso!</div>";
    } else {
        echo "<div class='mensagem erro'>Erro ao gravar os dados: " . mysqli_error($conectar) . "</div>";
    }
}

if (isset($_POST['excluir'])) {
    $codigo = $_POST['codigo'];
    
    $sql = "DELETE FROM livro WHERE codigo = '$codigo'";
    $resultado = mysqli_query($conectar, $sql);

    if ($resultado) {
        echo "<div class='mensagem sucesso'>Dados apagados com sucesso!</div>";
    } else {
        echo "<div class='mensagem erro'>Falha ao excluir os dados: " . mysqli_error($conectar) . "</div>";
    }
}

if (isset($_POST['alterar'])) {
    $codigo = $_POST['codigo'];
    $titulo = $_POST['titulo'];
    $nrpaginas = $_POST['nrpaginas'];
    $ano = $_POST['ano'];
    $codautor = $_POST['codautor'];
    $codcategoria = $_POST['codcategoria'];
    $codeditora = $_POST['codeditora'];
    $resenha = $_POST['resenha'];
    $preco = $_POST['preco'];
    
    $diretorio = "capas/";
    if (!file_exists($diretorio)) {
        mkdir($diretorio, 0777, true);
    }
    
    $foto_update = "";
    
    
    if(isset($_FILES['fotocapa1']) && $_FILES['fotocapa1']['error'] == 0) {
        $extensao1 = strtolower(substr($_FILES['fotocapa1']['name'], -4));
        $novo_nome1 = md5(time().$extensao1);
        move_uploaded_file($_FILES['fotocapa1']['tmp_name'], $diretorio.$novo_nome1);
        $foto_update .= ", fotocapa1 = '$novo_nome1'";
    }
    
    
    if(isset($_FILES['fotocapa2']) && $_FILES['fotocapa2']['error'] == 0) {
        $extensao2 = strtolower(substr($_FILES['fotocapa2']['name'], -4));
        $novo_nome2 = md5(time().$extensao2);
        move_uploaded_file($_FILES['fotocapa2']['tmp_name'], $diretorio.$novo_nome2);
        $foto_update .= ", fotocapa2 = '$novo_nome2'";
    }
   
    $sql = "UPDATE livro SET titulo = '$titulo', nrpaginas = '$nrpaginas', ano = '$ano', 
            codautor = '$codautor', codcategoria = '$codcategoria', codeditora = '$codeditora', 
            resenha = '$resenha', preco = '$preco'" . $foto_update . " WHERE codigo = '$codigo'";
    $resultado = mysqli_query($conectar, $sql);

    if ($resultado) {
        echo "<div class='mensagem sucesso'>Dados alterados com sucesso!</div>";
    } else {
        echo "<div class='mensagem erro'>Falha ao alterar os dados: " . mysqli_error($conectar) . "</div>";
    }
}

if (isset($_POST['pesquisar'])) {
    $codigo = $_POST['codigo'];
    
    $sql = "SELECT l.*, a.nome as autor_nome, c.nome as categoria_nome, e.nome as editora_nome 
            FROM livro l
            LEFT JOIN autor a ON l.codautor = a.codigo
            LEFT JOIN categoria c ON l.codcategoria = c.codigo
            LEFT JOIN editora e ON l.codeditora = e.codigo
            WHERE l.codigo = '$codigo'";
    $resultado = mysqli_query($conectar, $sql);

    if ($resultado) {
        if (mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);
            echo "<div class='mensagem info'>";
            echo "Código: " . $row['codigo'] . "<br>";
            echo "Título: " . $row['titulo'] . "<br>";
            echo "Número de Páginas: " . $row['nrpaginas'] . "<br>";
            echo "Ano: " . $row['ano'] . "<br>";
            echo "Autor: " . $row['autor_nome'] . " (Código: " . $row['codautor'] . ")<br>";
            echo "Categoria: " . $row['categoria_nome'] . " (Código: " . $row['codcategoria'] . ")<br>";
            echo "Editora: " . $row['editora_nome'] . " (Código: " . $row['codeditora'] . ")<br>";
            echo "Resenha: " . $row['resenha'] . "<br>";
            echo "Preço: R$ " . number_format($row['preco'], 2, ',', '.') . "<br>";
            
            if (!empty($row['fotocapa1'])) {
                echo "Foto Capa 1: <img src='capas/" . $row['fotocapa1'] . "' width='200' height='200'><br>";
            }
            
            if (!empty($row['fotocapa2'])) {
                echo "Foto Capa 2: <img src='capas/" . $row['fotocapa2'] . "' width='200' height='200'><br>";
            }
            
            echo "</div>";
        } else {
            echo "<div class='mensagem erro'>Nenhum livro encontrado com esse código.</div>";
        }
    } else {
        echo "<div class='mensagem erro'>Erro ao pesquisar os dados: " . mysqli_error($conectar) . "</div>";
    }
}

echo "<script>setTimeout(function(){ window.location.href = 'cadastrolivro.html'; }, 3000);</script>";
?> 