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
                <h1>AeroStore</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="../router/routerHome.php">Início</a></li>
                    <li><a href="../router/routerDrone.php">Produtos</a></li>
                </ul>
            </nav>
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
        <div class="container">
            <div class="footer-columns">
                <div class="footer-column">
                    <h3>AeroStore</h3>
                    <p>A maior loja especializada em drones do Brasil. Oferecemos produtos de alta qualidade para entusiastas e profissionais.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Links Rápidos</h3>
                    <ul>
                        <li><a href="#">Sobre Nós</a></li>
                        <li><a href="#">Política de Privacidade</a></li>
                        <li><a href="#">Termos e Condições</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Categorias</h3>
                    <ul>
                        <li><a href="#">Drones Profissionais</a></li>
                        <li><a href="#">Drones para Iniciantes</a></li>
                        <li><a href="#">Drones de Corrida</a></li>
                        <li><a href="#">Acessórios</a></li>
                        <li><a href="#">Peças de Reposição</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contato</h3>
                    <ul class="contact-info">
                        <li><i class="fas fa-map-marker-alt"></i> Av. Paulista, 1000 - São Paulo, SP</li>
                        <li><i class="fas fa-phone"></i> (11) 5555-1234</li>
                        <li><i class="fas fa-envelope"></i> contato@aerostore.com.br</li>
                    </ul>
                    <div class="newsletter">
                        <h4>Assine nossa newsletter</h4>
                        <form>
                            <input type="email" placeholder="Seu e-mail">
                            <button type="submit">Assinar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 AeroStore- Todos os direitos reservados</p>
            </div>
        </div>
    </footer>
</body>

</html>