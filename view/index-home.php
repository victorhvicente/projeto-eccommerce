<?php
    session_start();
    $clienteLogado = isset($_SESSION['cliente_id']);
?>
<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DroneStore - A Maior Loja de Drones do Brasil</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/home.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>AeroStore</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="#" class="active">Início</a></li>
                    <li><a href="../router/routerDrone.php">Produtos</a></li>
                </ul>
            </nav>
            <div class="icons">
                <a href="#"><i class="fas fa-user"></i></a>
                <a href="#" class="cart-icon"><i class="fas fa-shopping-cart"></i><span class="cart-count">0</span></a>
            </div>
        </div>
    </header>

    <!-- Hero Carousel -->
    <section class="hero-carousel">
        <div class="carousel-container">
            <div class="carousel-track">
                <!-- Slide 1 -->
                <div class="carousel-slide active">
                    <div class="slide-image" style="background-image: url('https://placeholder.pics/svg/1600x600/DEDEDE/555555/Drone%20Profissional');">
                        <div class="container">
                            <div class="slide-content">
                                <h2>Drones Profissionais</h2>
                                <p>Descubra nossa linha premium de drones para fotografia e filmagem profissional</p>
                                <div class="slide-buttons">
                                    <a href="../router/routerDrone.php?tipo=profissional" class="btn btn-primary">Ver Produtos</a>
                                    <a href="#" class="btn btn-secondary">Saiba Mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 2 -->
                <div class="carousel-slide">
                    <div class="slide-image" style="background-image: url('https://placeholder.pics/svg/1600x600/DEDEDE/555555/Drone%20Racing');">
                        <div class="container">
                            <div class="slide-content">
                                <h2>Drones de Corrida</h2>
                                <p>Velocidade e adrenalina com nossos drones de alta performance para competições</p>
                                <div class="slide-buttons">
                                    <a href="../router/routerDrone.php?tipo=corrida" class="btn btn-primary">Ver Produtos</a>
                                    <a href="#" class="btn btn-secondary">Saiba Mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 3 -->
                <div class="carousel-slide">
                    <div class="slide-image" style="background-image: url('https://placeholder.pics/svg/1600x600/DEDEDE/555555/Drone%20Iniciante');">
                        <div class="container">
                            <div class="slide-content">
                                <h2>Mini Drones</h2>
                                <p>Comece sua jornada no mundo dos drones com modelos fáceis de pilotar</p>
                                <div class="slide-buttons">
                                    <a href="../router/routerDrone.php?tipo=mini" class="btn btn-primary">Ver Produtos</a>
                                    <a href="#" class="btn btn-secondary">Saiba Mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Carousel Controls -->
            <button class="carousel-control prev"><i class="fas fa-chevron-left"></i></button>
            <button class="carousel-control next"><i class="fas fa-chevron-right"></i></button>
            
            <!-- Carousel Indicators -->
            <div class="carousel-indicators">
                <button class="indicator active" data-slide="0"></button>
                <button class="indicator" data-slide="1"></button>
                <button class="indicator" data-slide="2"></button>
            </div>
        </div>
    </section>

    <!-- Category Banners -->
    <section class="category-banners">
        <div class="container">
            <div class="banner-grid">
                <div class="category-banner">
                    <img src="../assets/img/pro-drone-fpx8-2025.png" alt="Drones Profissionais">
                    <div class="banner-content">
                        <h3>Drones Profissionais</h3>
                        <a href="../router/routerDrone.php?tipo=profissional" class="banner-link">Ver Coleção</a>
                    </div>
                </div>
                <div class="category-banner">
                    <img src="../assets/img/mini-drone-pfx1.jpg" alt="Mini Drones">
                    <div class="banner-content">
                        <h3>Mini Drones</h3>
                        <a href="../router/routerDrone.php?tipo=mini" class="banner-link">Ver Coleção</a>
                    </div>
                </div>
                <div class="category-banner">
                    <img src="../assets/img/corrida-pro-tbrz2024.png" alt="Drones de Corrida">
                    <div class="banner-content">
                        <h3>Drones de Corrida</h3>
                        <a href="../router/routerDrone.php?tipo=corrida" class="banner-link">Ver Coleção</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="featured-products">
        <div class="container">
            <div class="section-header">
                <h2>Produtos em Destaque</h2>
                <a href="produtos.html" class="view-all">Ver Todos <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="products-slider">
                <div class="products-track">
                    
                    <!-- Product 5 -->
                    <?php foreach ($destaques as $drone): ?>
                        <div class="product-card">
                            <div class="product-image">
                                <a href="#">
                                    <img src="../assets/img/<?= htmlspecialchars($drone->getImagem()) ?>" alt="<?= htmlspecialchars($drone->getNome()) ?>">
                                </a>
                                <div class="product-tag">Destaque</div>
                                <div class="product-actions">
                                    <button class="quick-view" title="Visualização Rápida"><i class="fas fa-eye"></i></button>
                                    <button class="add-to-wishlist" title="Adicionar aos Favoritos"><i class="far fa-heart"></i></button>
                                    <button class="compare" title="Comparar"><i class="fas fa-exchange-alt"></i></button>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-category"><?= ucfirst($drone->getTipo()) ?></div>
                                <h3><a href="#"><?= htmlspecialchars($drone->getNome()) ?></a></h3>
                                <div class="product-price">
                                    <span class="old-price">R$ <?= number_format($drone->getPrecoAntigo(), 2, ',', '.') ?></span>
                                    <span class="current-price">R$ <?= number_format($drone->getPreco(), 2, ',', '.') ?></span>
                                </div>
                                <button class="add-to-cart-btn">Adicionar ao Carrinho</button>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                
                <!-- Products Slider Controls -->
                <button class="products-control prev"><i class="fas fa-chevron-left"></i></button>
                <button class="products-control next"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </section>

    <!-- Best Sellers -->
    <section class="best-sellers">
        <div class="container">
            <div class="section-header">
                <h2>Mais Vendidos</h2>
                <a href="../router/routerDrone.php" class="view-all">Ver Todos <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="products-grid">
                <?php foreach ($maisVendidos as $drone): ?>
                    <div class="product-card">
                        <div class="product-image">
                            <a href="#">
                                <img src="../assets/img/<?= htmlspecialchars($drone->getImagem()) ?>" alt="<?= htmlspecialchars($drone->getNome()) ?>">
                            </a>
                            <div class="product-tag"><?= $drone->getPrecoAntigo() ? 'Promoção' : 'Bestseller' ?></div>
                            <div class="product-actions">
                                <button class="quick-view"><i class="fas fa-eye"></i></button>
                                <button class="add-to-wishlist"><i class="far fa-heart"></i></button>
                                <button class="compare"><i class="fas fa-exchange-alt"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-category"><?= ucfirst($drone->getTipo()) ?></div>
                            <h3><a href="#"><?= htmlspecialchars($drone->getNome()) ?></a></h3>
                            <div class="product-price">
                                <?php if ($drone->getPrecoAntigo()): ?>
                                    <span class="old-price">R$ <?= number_format($drone->getPrecoAntigo(), 2, ',', '.') ?></span>
                                <?php endif; ?>
                                <span class="current-price">R$ <?= number_format($drone->getPreco(), 2, ',', '.') ?></span>
                            </div>
                            <button class="add-to-cart-btn">Adicionar ao Carrinho</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="features">
        <div class="container">
            <div class="features-grid">
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Frete Grátis</h3>
                        <p>Para compras acima de R$ 499,00</p>
                    </div>
                </div>
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Compra Segura</h3>
                        <p>Seus dados protegidos</p>
                    </div>
                </div>
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Troca Garantida</h3>
                        <p>7 dias para devolução</p>
                    </div>
                </div>
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Suporte Técnico</h3>
                        <p>Especialistas à disposição</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <h2>O Que Nossos Clientes Dizem</h2>
            </div>
            <div class="testimonials-slider">
                <div class="testimonials-track">
                    <!-- Testimonial 1 -->
                    <div class="testimonial">
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <p>Comprei meu primeiro drone na DroneStore e fiquei impressionado com a qualidade do produto e o atendimento. Recomendo a todos os entusiastas!</p>
                            <div class="testimonial-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="testimonial-author">
                            <img src="../assets/img/Carlos-Silva.jpg" alt="Cliente">
                            <div class="author-info">
                                <h4>Carlos Silva</h4>
                                <p>Fotógrafo</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="testimonial">
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <p>Excelente variedade de produtos e preços competitivos. O suporte técnico me ajudou a escolher o drone perfeito para minhas necessidades.</p>
                            <div class="testimonial-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                        <div class="testimonial-author">
                            <img src="../assets/img/Ana-Oliveira.jpg" alt="Cliente">
                            <div class="author-info">
                                <h4>Ana Oliveira</h4>
                                <p>Videomaker</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 3 -->
                    <div class="testimonial">
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <p>Entrega rápida e produto exatamente como descrito. Já é a terceira vez que compro na DroneStore e sempre saio satisfeito.</p>
                            <div class="testimonial-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="testimonial-author">
                            <img src="../assets/img/Marcelo-Santos.jpg" alt="Cliente">
                            <div class="author-info">
                                <h4>Marcelo Santos</h4>
                                <p>Engenheiro</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonials Slider Controls -->
                <button class="testimonials-control prev"><i class="fas fa-chevron-left"></i></button>
                <button class="testimonials-control next"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </section>

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

    <script src="/js/home.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const botoesComprar = document.querySelectorAll('.add-to-cart-btn');
        const contadorCarrinho = document.querySelector('.cart-count');
        let totalCarrinho = 0;

        const clienteLogado = <?= json_encode($clienteLogado) ?>;

        botoesComprar.forEach(botao => {
            botao.addEventListener('click', function () {
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
