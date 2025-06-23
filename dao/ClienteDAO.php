<?php
require_once '../model/Cliente.php';
require_once '../config/conexao.php';

class ClienteDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function emailExiste(string $email): bool {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM clientes WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    }

    public function inserir(Cliente $cliente): bool {
        $stmt = $this->pdo->prepare("INSERT INTO clientes (nome, email, telefone, senha) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $cliente->getNome(),
            $cliente->getEmail(),
            $cliente->getTelefone(),
            $cliente->getSenha()
        ]);
    }

    public function buscarPorEmail(string $email): ?Cliente {
        $stmt = $this->pdo->prepare("SELECT * FROM clientes WHERE email = ?");
        $stmt->execute([$email]);
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dados) {
            return new Cliente(
                $dados['id_cliente'],
                $dados['nome'],
                $dados['email'],
                $dados['telefone'],
                $dados['senha']
            );
        }

        return null;
    }
}
