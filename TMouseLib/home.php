<?php
$conectar = mysqli_connect('localhost', 'root', '');
$banco = mysqli_select_db($conectar, "livraria");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Livraria - Página Principal</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }
        
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            width: 220px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            background-color: white;
            transition: transform 0.3s;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        
        .product-info h3 {
            margin: 0 0 5px 0;
            font-size: 16px;
            color: #333;
        }
        
        .product-info p {
            margin: 0 0 5px 0;
            font-size: 14px;
            color: #666;
        }
        
        .product-price {
            font-weight: bold;
            color: #4caf50;
            font-size: 18px;
            margin: 10px 0;
        }
        
        .buy-button {
            background-color: #6c63ff;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-weight: 600;
            transition: background-color 0.3s;
        }
        
        .buy-button:hover {
            background-color: #5a52d5;
        }
        
        .filters {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
        }
        
        .filters select {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        
        .filters label {
            font-weight: 600;
            margin-right: 5px;
        }
        
        .search-button {
            background-color: #ff9800;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s;
        }
        
        .search-button:hover {
            background-color: #f57c00;
        }
        
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        
        .header img {
            margin-right: 20px;
        }
        
        .header h1 {
            flex-grow: 1;
            text-align: center;
            color: #3a3f51;
        }
        
        .no-results {
            text-align: center;
            padding: 40px;
            color: #666;
            background-color: #f9f9f9;
            border-radius: 8px;
            margin-top: 20px;
        }
        
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Banner Styles */
        .banner {
            width: 100%;
            height: 200px;
            margin: 20px 0;
            position: relative;
            overflow: hidden;
            background: #f5f5f5;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .banner-track {
            display: flex;
            animation: scroll 30s linear infinite;
            width: fit-content;
        }

        .banner-track:hover {
            animation-play-state: paused;
        }

        .banner-item {
            flex: 0 0 200px;
            height: 200px;
            padding: 10px;
            box-sizing: border-box;
        }

        .banner-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .banner-item img:hover {
            transform: scale(1.05);
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        .banner::before,
        .banner::after {
            content: '';
            position: absolute;
            top: 0;
            width: 100px;
            height: 100%;
            z-index: 2;
        }

        .banner::before {
            left: 0;
            background: linear-gradient(to right, #f5f5f5, transparent);
        }

        .banner::after {
            right: 0;
            background: linear-gradient(to left, #f5f5f5, transparent);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="logo.png" width="150" height="100" alt="Logo Livraria">
            <h1>Tiny Mouse Lib</h1>
            <a href="login.php"><img src="login.jpg" width="80" height="40" alt="Login"></a>
        </div>

        <div class="banner">
            <div class="banner-track">
                <div class="banner-item">
                    <img src="capas/livro1.jpg" alt="Livro 1">
                </div>
                <div class="banner-item">
                    <img src="capas/livro2.jpg" alt="Livro 2">
                </div>
                <div class="banner-item">
                    <img src="capas/livro3.jpg" alt="Livro 3">
                </div>
                <div class="banner-item">
                    <img src="capas/livro4.jpg" alt="Livro 4">
                </div>
                <div class="banner-item">
                    <img src="capas/livro5.jpg" alt="Livro 5">
                </div>
                <div class="banner-item">
                    <img src="capas/livro6.jpg" alt="Livro 6">
                </div>
                <div class="banner-item">
                    <img src="capas/livro7.jpg" alt="Livro 7">
                </div>
                <div class="banner-item">
                    <img src="capas/livro8.jpg" alt="Livro 8">
                </div>
                <div class="banner-item">
                    <img src="capas/livro9.jpg" alt="Livro 9">
                </div>
                <div class="banner-item">
                    <img src="capas/livro10.jpg" alt="Livro 10">
                </div>
                <!-- Duplicando as imagens para criar um loop contínuo -->
                <div class="banner-item">
                    <img src="capas/livro1.jpg" alt="Livro 1">
                </div>
                <div class="banner-item">
                    <img src="capas/livro2.jpg" alt="Livro 2">
                </div>
                <div class="banner-item">
                    <img src="capas/livro3.jpg" alt="Livro 3">
                </div>
                <div class="banner-item">
                    <img src="capas/livro4.jpg" alt="Livro 4">
                </div>
                <div class="banner-item">
                    <img src="capas/livro5.jpg" alt="Livro 5">
                </div>
                <div class="banner-item">
                    <img src="capas/livro6.jpg" alt="Livro 6">
                </div>
                <div class="banner-item">
                    <img src="capas/livro7.jpg" alt="Livro 7">
                </div>
                <div class="banner-item">
                    <img src="capas/livro8.jpg" alt="Livro 8">
                </div>
                <div class="banner-item">
                    <img src="capas/livro9.jpg" alt="Livro 9">
                </div>
                <div class="banner-item">
                    <img src="capas/livro10.jpg" alt="Livro 10">
                </div>
            </div>
        </div>
        
        <form name="formulario_pesquisa" method="post" action="">
            <div class="filters">
                
                <div>
                    <label for="autor">Autor:</label>
                    <select name="autor" id="autor">
                        <option value="" selected="selected">Selecione...</option>
                        <?php
                        $query = mysqli_query($conectar, "SELECT codigo, nome FROM autor");
                        while($autores = mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo $autores['codigo']?>">
                            <?php echo $autores['nome'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                
                
                <div>
                    <label for="categoria">Categoria:</label>
                    <select name="categoria" id="categoria">
                        <option value="" selected="selected">Selecione...</option>
                        <?php
                        $query = mysqli_query($conectar, "SELECT codigo, nome FROM categoria");
                        while($categorias = mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo $categorias['codigo']?>">
                            <?php echo $categorias['nome'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                
                
                <div>
                    <label for="editora">Editora:</label>
                    <select name="editora" id="editora">
                        <option value="" selected="selected">Selecione...</option>
                        <?php
                        $query = mysqli_query($conectar, "SELECT codigo, nome FROM editora");
                        while($editoras = mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo $editoras['codigo']?>">
                            <?php echo $editoras['nome'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                
                <input type="submit" name="pesquisar" value="Pesquisar" class="search-button">
            </div>
        </form>

        <div class="results">
            <?php
            if (isset($_POST['pesquisar'])) {
                
                $autor = (empty($_POST['autor'])) ? 'null' : $_POST['autor'];
                $categoria = (empty($_POST['categoria'])) ? 'null' : $_POST['categoria'];
                $editora = (empty($_POST['editora'])) ? 'null' : $_POST['editora'];
                
                $sql_base = "SELECT l.*, a.nome as autor_nome, c.nome as categoria_nome, e.nome as editora_nome 
                         FROM livro l
                         LEFT JOIN autor a ON l.codautor = a.codigo
                         LEFT JOIN categoria c ON l.codcategoria = c.codigo
                         LEFT JOIN editora e ON l.codeditora = e.codigo
                         WHERE 1=1";
                
                
                if ($autor != 'null') {
                    $sql_base .= " AND l.codautor = $autor";
                }
                
                if ($categoria != 'null') {
                    $sql_base .= " AND l.codcategoria = $categoria";
                }
                
                if ($editora != 'null') {
                    $sql_base .= " AND l.codeditora = $editora";
                }
                
                $seleciona_livros = mysqli_query($conectar, $sql_base);
                
                
                if (mysqli_num_rows($seleciona_livros) == 0) {
                    echo '<div class="no-results">
                            <h2>Desculpe, não encontramos livros com estes filtros...</h2>
                            <p>Tente ajustar os critérios de pesquisa.</p>
                          </div>';
                } else {
                    echo "<h2>Livros Encontrados:</h2>";
                    
                    echo '<div class="product-grid">';
                    
                    while ($livro = mysqli_fetch_assoc($seleciona_livros)) {
                        echo '<div class="product-card">';
                        
                        
                        if (!empty($livro['fotocapa1'])) {
                            echo '<img src="capas/' . $livro['fotocapa1'] . '" alt="' . $livro['titulo'] . '">';
                        } else {
                            echo '<img src="capas/default.jpg" alt="Sem imagem">';
                        }
                        
                        echo '<div class="product-info">';
                        echo '<h3>' . $livro['titulo'] . '</h3>';
                        echo '<p>Autor: ' . $livro['autor_nome'] . '</p>';
                        echo '<p>Categoria: ' . $livro['categoria_nome'] . '</p>';
                        echo '<p>Editora: ' . $livro['editora_nome'] . '</p>';
                        echo '<p>Ano: ' . $livro['ano'] . '</p>';
                        echo '<div class="product-price">R$ ' . number_format($livro['preco'], 2, ',', '.') . '</div>';
                        echo '<button class="buy-button" onclick="comprarLivro(' . $livro['codigo'] . ')">Comprar</button>';
                        echo '</div></div>';
                    }
                    
                    echo '</div>';
                }
            } else {
                
                $sql_livros = "SELECT l.*, a.nome as autor_nome, c.nome as categoria_nome, e.nome as editora_nome 
                           FROM livro l
                           LEFT JOIN autor a ON l.codautor = a.codigo
                           LEFT JOIN categoria c ON l.codcategoria = c.codigo
                           LEFT JOIN editora e ON l.codeditora = e.codigo
                           LIMIT 12"; 
                
                $seleciona_livros = mysqli_query($conectar, $sql_livros);
                
                if (mysqli_num_rows($seleciona_livros) == 0) {
                    echo '<div class="no-results">
                            <h2>Nenhum livro cadastrado</h2>
                            <p>Adicione livros ao sistema para visualizá-los aqui.</p>
                          </div>';
                } else {
                    echo "<h2>Livros Disponíveis:</h2>";
                    
                    echo '<div class="product-grid">';
                    
                    while ($livro = mysqli_fetch_assoc($seleciona_livros)) {
                        echo '<div class="product-card">';
                        
                        if (!empty($livro['fotocapa1'])) {
                            echo '<img src="capas/' . $livro['fotocapa1'] . '" alt="' . $livro['titulo'] . '">';
                        } else {
                            echo '<img src="capas/default.jpg" alt="Sem imagem">';
                        }
                        
                        echo '<div class="product-info">';
                        echo '<h3>' . $livro['titulo'] . '</h3>';
                        echo '<p>Autor: ' . $livro['autor_nome'] . '</p>';
                        echo '<p>Categoria: ' . $livro['categoria_nome'] . '</p>';
                        echo '<p>Editora: ' . $livro['editora_nome'] . '</p>';
                        echo '<p>Ano: ' . $livro['ano'] . '</p>';
                        echo '<div class="product-price">R$ ' . number_format($livro['preco'], 2, ',', '.') . '</div>';
                        echo '<button class="buy-button" onclick="comprarLivro(' . $livro['codigo'] . ')">Comprar</button>';
                        echo '</div></div>';
                    }
                    
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
    
    <script>
        function comprarLivro(codigo) {
            alert("Função de compra será implementada em breve! Livro código: " + codigo);
        }
    </script>
</body>
</html> 