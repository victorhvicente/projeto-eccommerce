<?php
require_once '../controller/DroneController.php';
session_start();
$clienteLogado = isset($_SESSION['cliente_id']);
$tipoSelecionado = $_GET['tipo'] ?? 'todos';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="../assets/css/sessao-produtos.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                    <li><a href="../router/routerDrone.php"  class="active">Produtos</a></li>
                </ul>
            </nav>
            <div class="icons">
                <a href="#"><i class="fas fa-user"></i></a>
                <a href="#" class="cart-icon"><i class="fas fa-shopping-cart"></i><span class="cart-count">0</span></a>
            </div>
        </div>
    </header>

    <main>
        <section class="conteudo-principal">

            <input type="text" class="busca" placeholder="Busque na AeroStore">

            <div class="filtro">
                <div class="ordenar-exibir">
                    <div class="filtro-opcao">
                        <label for="tipo">Tipo:</label>
                        <select name="tipo" id="filtro-tipo">
                            <option value="todos">Todos</option>
                            <option value="profissional">Profissionais</option>
                            <option value="mini">Mini Drones</option>
                            <option value="corrida">Drones de Corrida</option>
                        </select>
                    </div>
                </div>

                <p><span id="contador-produtos">0</span> <strong>Produtos</strong></p>
            </div>

            <section class="produtos">
                <?php foreach ($drones as $drone): ?>
                    <div class="card" data-tipo="<?= strtolower($drone->getTipo()) ?>">
                        <img src="../assets/img/<?= htmlspecialchars($drone->getImagem()) ?>" alt="<?= htmlspecialchars($drone->getNome()) ?>">
                        <p class="descricao-produto"><?= htmlspecialchars($drone->getNome()) ?></p>
                        <p class="descricao-produto"><?= htmlspecialchars($drone->getDescricao()) ?></p>
                        <div class="preco">
                            <p>R$ <?= number_format($drone->getPreco(), 2, ',', '.') ?></p>
                            <p class="forma-pagamento">À vista no PIX</p>
                            <p class="forma-pagamento">Ou até <strong>10x de R$ <?= number_format($drone->getPreco() / 10, 2, ',', '.') ?></strong></p>
                            <button>COMPRAR</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>

            <!-- <div class="navegacao">
                <div class="botoes-navegacao">
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                            <path fill-rule="evenodd" d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                        </svg>
                    Anterior</a>
                    <a href="">1</a>
                    <a href="">2</a>
                    <a href="">3</a>
                    <p>...</p>
                    <a href="">(último número)</a>
                    <a href="">
                    Próximo
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                            <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div> -->
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-columns">
                <div class="footer-column">
                    <h3>DroneStore</h3>
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
                        <li><i class="fas fa-envelope"></i> contato@dronestore.com.br</li>
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
                <p>&copy; 2023 DroneStore - Todos os direitos reservados</p>
            </div>
        </div>
    </footer>

    <script>
        const tipoInicial = '<?= strtolower($tipoSelecionado) ?>';
    </script>
    <script src="../assets/js/sessao-produtos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const botoesComprar = document.querySelectorAll('.card button');
            const contadorCarrinho = document.querySelector('.cart-count');
            let totalCarrinho = 0;

            const clienteLogado = <?= json_encode($clienteLogado) ?>;

            botoesComprar.forEach(botao => {
                botao.addEventListener('click', function() {
                    if (!clienteLogado) {
                        alert('Faça login para adicionar produtos ao carrinho!');
                        return;
                    }

                    alert('Produto adicionado ao carrinho!');
                    totalCarrinho++;
                    contadorCarrinho.textContent = totalCarrinho;
                });
            });
        });
    </script>

</body>

</html>