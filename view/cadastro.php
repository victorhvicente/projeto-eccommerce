<?php
session_start();
?>
<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/cadastro.css">
    <style>
        .mensagem {
            padding: 15px;
            margin: 10px auto;
            width: 90%;
            max-width: 600px;
            border-radius: 5px;
            font-weight: 500;
            text-align: center;
        }
        .mensagem.sucesso {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .mensagem.erro {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>DroneStore</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index-home.html">Início</a></li>
                    <li><a href="sessao-produtos.html">Produtos</a></li>
                </ul>
            </nav>
            <div class="icons">
                <a href="#"><i class="fas fa-search"></i></a>
                <a href="#"><i class="fas fa-user"></i></a>
                <a href="#" class="cart-icon"><i class="fas fa-shopping-cart"></i><span class="cart-count">0</span></a>
            </div>
        </div>
    </header>

    <main>
        <section class="formulario">
            <h1>CRIAR CONTA</h1>
            <p>Preencha os campos abaixo para criar sua conta</p>

            <!-- MENSAGEM DE SUCESSO OU ERRO -->
            <?php if (isset($_SESSION['mensagem'])): ?>
                <div class="mensagem <?= $_SESSION['mensagem']['tipo'] === 'sucesso' ? 'sucesso' : 'erro' ?>">
                    <?= $_SESSION['mensagem']['texto'] ?>
                </div>
                <?php unset($_SESSION['mensagem']); ?>
            <?php endif; ?>

            <form action="../router/routerCliente.php" method="post">
                <label for="nomeCompleto">Nome completo</label>
                <input type="text" name="nomeCompleto">

                <label for="email">E-mail</label>
                <input type="text" name="email">

                <label for="telefone">Telefone</label>
                <input type="text" name="telefone">

                <label for="senha">Senha</label>
                <input type="password" name="senha">

                <label for="confirmarSenha">Confirmar senha</label>
                <input type="password" name="confirmarSenha">

                <button type="submit">CADASTRAR</button>
            </form>
        </section>
    </main>
   
    <footer>
        <!-- Rodapé permanece igual -->
    </footer>
</body>
</html>
