<?php
session_start();
$conectar = mysqli_connect('localhost', 'root', '');
$banco = mysqli_select_db($conectar, "livraria");

// Inicializa o carrinho se não existir
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Processa atualização de quantidade
if (isset($_POST['update_quantity'])) {
    $codigo = $_POST['codigo'];
    $quantidade = (int)$_POST['quantidade'];
    
    if ($quantidade > 0) {
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['codigo'] == $codigo) {
                $item['quantidade'] = $quantidade;
                break;
            }
        }
    }
    header('Location: carrinho.php');
    exit();
}

// Processa remoção de item
if (isset($_POST['remove_item'])) {
    $codigo = $_POST['codigo'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['codigo'] == $codigo) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindexa o array
    header('Location: carrinho.php');
    exit();
}

// Processa finalização da compra
if (isset($_POST['finalizar_compra'])) {
    $_SESSION['cart'] = array();
    header('Location: carrinho.php');
    exit();
}

// Calcula o total do carrinho
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['preco'] * $item['quantidade'];
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Carrinho - Tiny Mouse Lib</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
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

        .cart-item {
            display: flex;
            align-items: center;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
            background-color: white;
        }

        .cart-item img {
            width: 100px;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 20px;
        }

        .cart-item-info {
            flex-grow: 1;
        }

        .cart-item-info h3 {
            margin: 0 0 10px 0;
            color: #333;
        }

        .cart-item-info p {
            margin: 5px 0;
            color: #666;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 10px 0;
        }

        .quantity-btn {
            background-color: #6c63ff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .quantity-btn:hover {
            background-color: #5a52d5;
        }

        .quantity-input {
            width: 50px;
            text-align: center;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .remove-btn {
            background-color: #ff4444;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 20px;
        }

        .remove-btn:hover {
            background-color: #cc0000;
        }

        .cart-summary {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .cart-total {
            font-size: 24px;
            font-weight: bold;
            color: #4caf50;
            margin: 20px 0;
        }

        .checkout-btn {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            width: 100%;
        }

        .checkout-btn:hover {
            background-color: #45a049;
        }

        .empty-cart {
            text-align: center;
            padding: 40px;
            color: #666;
        }

        .back-to-shop {
            display: inline-block;
            margin-top: 20px;
            color: #6c63ff;
            text-decoration: none;
            font-weight: bold;
        }

        .back-to-shop:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="logo.png" width="150" height="100" alt="Logo Livraria">
            <h1>Carrinho de Compras</h1>
            <a href="home.php" class="back-to-shop">Voltar à Loja</a>
        </div>

        <?php if (empty($_SESSION['cart'])): ?>
            <div class="empty-cart">
                <h2>Seu carrinho está vazio</h2>
                <p>Adicione alguns livros ao seu carrinho para continuar.</p>
                <a href="home.php" class="back-to-shop">Voltar à Loja</a>
            </div>
        <?php else: ?>
            <div id="cart-items">
                <?php foreach ($_SESSION['cart'] as $item): ?>
                    <div class="cart-item">
                        <img src="capas/<?php echo $item['imagem']; ?>" alt="<?php echo htmlspecialchars($item['titulo']); ?>">
                        <div class="cart-item-info">
                            <h3><?php echo htmlspecialchars($item['titulo']); ?></h3>
                            <p>Autor: <?php echo htmlspecialchars($item['autor']); ?></p>
                            <p>Preço: R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></p>
                            <form method="post" action="" class="quantity-controls">
                                <input type="hidden" name="codigo" value="<?php echo $item['codigo']; ?>">
                                <button type="submit" name="update_quantity" class="quantity-btn" 
                                        onclick="this.form.quantidade.value = <?php echo $item['quantidade'] - 1; ?>">-</button>
                                <input type="number" name="quantidade" class="quantity-input" 
                                       value="<?php echo $item['quantidade']; ?>" min="1">
                                <button type="submit" name="update_quantity" class="quantity-btn"
                                        onclick="this.form.quantidade.value = <?php echo $item['quantidade'] + 1; ?>">+</button>
                            </form>
                        </div>
                        <form method="post" action="">
                            <input type="hidden" name="codigo" value="<?php echo $item['codigo']; ?>">
                            <button type="submit" name="remove_item" class="remove-btn">Remover</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="cart-summary">
                <h2>Resumo do Pedido</h2>
                <div class="cart-total">Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></div>
                <form method="post" action="">
                    <button type="submit" name="finalizar_compra" class="checkout-btn">Finalizar Compra</button>
                </form>
            </div>
        <?php endif; ?>
    </div>
</body>
</html> 