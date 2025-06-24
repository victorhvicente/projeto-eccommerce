-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/06/2025 às 22:06
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `aerostore`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `email`, `telefone`, `senha`) VALUES
(1, 'teste', 'teste@hotmail.com', '(18) 99999-9999', '$2y$10$tI1E0sy6UBk2lmEa8numEe4QIu81wt4laGiMHluloHN/lQkjNdJXS'),
(2, 'José Silva', 'jose@hotmail.com', '(18)99999-9999', '$2y$10$UXvtH5kKbm5yMeKbnp0VLucTqYH2WNkq.jiXaR1hPCNi37XCZNCzG'),
(3, 'Lucas Oliveira', 'lucas@hotmail.com', '(18) 99999-9999', '$2y$10$8VrUybXrc/vrUv8BGLZtYevofN9fH/SuWgFvuObhwxB8z4Mil635G');

-- --------------------------------------------------------

--
-- Estrutura para tabela `drones`
--

CREATE TABLE `drones` (
  `id_drone` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `peso` float DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `drones`
--

INSERT INTO `drones` (`id_drone`, `nome`, `preco`, `modelo`, `tipo`, `marca`, `descricao`, `estoque`, `peso`, `imagem`) VALUES
(1, 'Falcon Pro X8', 12999, 'FPX8-2025', 'Profissional', 'SkyWorks', 'Drone profissional com 4K HDR, sensores térmicos e alcance de 8km', 10, 2.5, 'pro-drone-fpx8-2025.png'),
(2, 'Orion Max 2.0', 9999, 'ORMX2', 'Profissional', 'AeroView', 'Ideal para topografia e agricultura de precisão', 7, 2.1, 'pro-drone-ormx2.jpg'),
(3, 'TitanVision Ultra', 14990, 'TVU500', 'Profissional', 'VisionFly', 'Drone com câmera 8K e 6 rotores para maior estabilidade', 5, 3.2, 'pro-drone-tvu500.jpg'),
(4, 'Mini Swift 200', 799, 'MSW200', 'Mini', 'AirNova', 'Drone compacto com câmera HD e estabilização automática', 25, 0.5, 'mini-drone-pfx1.jpg'),
(5, 'PocketFly X1', 599, 'PFX1', 'Mini', 'MicroDrone', 'Mini drone dobrável com autonomia de 15 minutos', 30, 0.4, 'mini-drone-msw200.jpg'),
(6, 'NanoAir Lite', 699, 'NAL-1', 'Mini', 'SkyZone', 'Leve, fácil de pilotar e ideal para iniciantes', 20, 0.35, 'mini-drone-nal-1.jpg'),
(7, 'ThunderBolt Racer Z', 1799, 'TBRZ2024', 'Corrida', 'SpeedAir', 'Drone de corrida com motor brushless e controle de precisão', 15, 0.8, 'corrida-pro-tbrz2024.png'),
(8, 'Velocity FireStorm', 2499, 'VFS-9', 'Corrida', 'RacePro', 'Velocidade máxima de 130 km/h com baixo peso e resposta instantânea', 10, 0.75, 'corrida-drone-vfs-9.png'),
(9, 'Vortex X-Surge', 1990, 'VXSG-2K25', 'Corrida', 'HyperJet', 'Drone de corrida projetado para pistas fechadas e manobras agressivas', 12, 0.85, 'vxsg-2k25.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_pedidos`
--

CREATE TABLE `itens_pedidos` (
  `id_item_pedido` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco_unitario` float DEFAULT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_drone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id_pagamento` int(11) NOT NULL,
  `metodo` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_pagamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `drones`
--
ALTER TABLE `drones`
  ADD PRIMARY KEY (`id_drone`);

--
-- Índices de tabela `itens_pedidos`
--
ALTER TABLE `itens_pedidos`
  ADD PRIMARY KEY (`id_item_pedido`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_drone` (`id_drone`);

--
-- Índices de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id_pagamento`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_pagamento` (`id_pagamento`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `drones`
--
ALTER TABLE `drones`
  MODIFY `id_drone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `itens_pedidos`
--
ALTER TABLE `itens_pedidos`
  MODIFY `id_item_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `itens_pedidos`
--
ALTER TABLE `itens_pedidos`
  ADD CONSTRAINT `itens_pedidos_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`),
  ADD CONSTRAINT `itens_pedidos_ibfk_2` FOREIGN KEY (`id_drone`) REFERENCES `drones` (`id_drone`);

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_pagamento`) REFERENCES `pagamentos` (`id_pagamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
