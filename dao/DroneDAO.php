<?php
require_once '../model/Drone.php';
require_once '../config/conexao.php';

class DroneDAO
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function listarTodos(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM drones");
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $drones = [];
        foreach ($dados as $linha) {
            $drones[] = new Drone(
                $linha['id_drone'],
                $linha['nome'],
                $linha['modelo'],
                $linha['tipo'],
                $linha['marca'],
                $linha['descricao'],
                $linha['preco'],
                $linha['preco_antigo'],
                $linha['estoque'],
                $linha['peso'],
                $linha['imagem'],
                $linha['numero_vendas']
            );
        }
        return $drones;
    }

    public function listarMaisVendidos($limite)
    {
        $sql = "SELECT * FROM drones ORDER BY numero_vendas DESC LIMIT :limite";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
        $stmt->execute();

        $maisVendidos = [];
        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $maisVendidos[] = new Drone(
                $linha['id_drone'],
                $linha['nome'],
                $linha['modelo'],
                $linha['tipo'],
                $linha['marca'],
                $linha['descricao'],
                $linha['preco'],
                $linha['preco_antigo'],
                $linha['estoque'],
                $linha['peso'],
                $linha['imagem'],
                $linha['numero_vendas']
            );
        }
        return $maisVendidos;
    }

    public function listarDestaques()
    {
        $sql = "SELECT * FROM drones WHERE destaque = :destaque";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':destaque', 'sim', PDO::PARAM_STR);
        $stmt->execute();

        $destaques = [];
        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $destaques[] = new Drone(
                $linha['id_drone'],
                $linha['nome'],
                $linha['modelo'],
                $linha['tipo'],
                $linha['marca'],
                $linha['descricao'],
                $linha['preco'],
                $linha['preco_antigo'],
                $linha['estoque'],
                $linha['peso'],
                $linha['imagem'],
                $linha['numero_vendas']
            );
        }
        return $destaques;
    }
}
