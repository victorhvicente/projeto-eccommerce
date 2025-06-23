<?php
require_once '../model/Cliente.php';
require_once '../dao/ClienteDAO.php';
require_once '../config/conexao.php';

class ClienteController {
    private ClienteDAO $clienteDAO;

    public function __construct() {
        global $pdo;
        $this->clienteDAO = new ClienteDAO($pdo);
    }

    public function criarConta(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nomeCompleto'] ?? '';
            $email = $_POST['email'] ?? '';
            $telefone = $_POST['telefone'] ?? '';
            $senha = $_POST['senha'] ?? '';
            $confirmarSenha = $_POST['confirmarSenha'] ?? '';

            // Validações
            if (empty($nome) || empty($email) || empty($telefone) || empty($senha) || empty($confirmarSenha)) {
                echo "Preencha todos os campos.";
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "E-mail inválido.";
                return;
            }

            if ($senha !== $confirmarSenha) {
                echo "As senhas não coincidem.";
                return;
            }

            if ($this->clienteDAO->emailExiste($email)) {
                echo "Este e-mail já está cadastrado.";
                return;
            }

            // Criar objeto Cliente
            $cliente = new Cliente(0, $nome, $email, $telefone, password_hash($senha, PASSWORD_DEFAULT));

            // Salvar com o DAO
            if ($this->clienteDAO->inserir($cliente)) {
                echo "Conta criada com sucesso!";
                // header("Location: login.php");
            } else {
                echo "Erro ao criar conta.";
            }
        }
    }

    public function login(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $identificador = $_POST['identificador'] ?? '';
            $senha = $_POST['senha'] ?? '';

            if (empty($identificador) || empty($senha)) {
                echo "Preencha todos os campos.";
                return;
            }

            // Buscar o cliente por e-mail (ou CPF/CNPJ se for o caso futuramente)
            $cliente = $this->clienteDAO->buscarPorEmail($identificador);

            if (!$cliente) {
                echo "Usuário não encontrado.";
                return;
            }

            // Verifica a senha
            if (password_verify($senha, $cliente->getSenha())) {
                // Inicia a sessão e armazena dados do cliente
                session_start();
                $_SESSION['cliente_id'] = $cliente->getId();
                $_SESSION['cliente_nome'] = $cliente->getNome();

                // Redireciona para página principal
                header("Location: ../view/index-home.php");
                exit;

            } else {
                echo "Senha incorreta.";
            }
        }
    }
}
