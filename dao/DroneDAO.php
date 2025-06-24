<?php
require_once '../model/Drone.php';
require_once '../config/conexao.php';

class DroneDAO {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function listarTodos(): array {
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
                $linha['estoque'],
                $linha['peso'],
                $linha['imagem'] 
            );
        }

        return $drones;
    }
}
