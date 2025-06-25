<?php
require_once '../model/Cliente.php';
require_once '../dao/ClienteDAO.php';
require_once '../config/conexao.php';

class ClienteController
{
    private ClienteDAO $clienteDAO;

    public function __construct()
    {
        global $pdo;
        $this->clienteDAO = new ClienteDAO($pdo);
    }

    public function criarConta(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();

            $nome = $_POST['nomeCompleto'] ?? '';
            $email = $_POST['email'] ?? '';
            $telefone = $_POST['telefone'] ?? '';
            $senha = $_POST['senha'] ?? '';
            $confirmarSenha = $_POST['confirmarSenha'] ?? '';

            // Validações
            if (empty($nome) || empty($email) || empty($telefone) || empty($senha) || empty($confirmarSenha)) {
                $_SESSION['mensagem'] = ['tipo' => 'erro', 'texto' => 'Preencha todos os campos.'];
                header("Location: ../view/cadastro.php");
                exit;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['mensagem'] = ['tipo' => 'erro', 'texto' => 'E-mail inválido.'];
                header("Location: ../view/cadastro.php");
                exit;
            }

            if ($senha !== $confirmarSenha) {
                $_SESSION['mensagem'] = ['tipo' => 'erro', 'texto' => 'As senhas não coincidem.'];
                header("Location: ../view/cadastro.php");
                exit;
            }

            if ($this->clienteDAO->emailExiste($email)) {
                $_SESSION['mensagem'] = ['tipo' => 'erro', 'texto' => 'Este e-mail já está cadastrado.'];
                header("Location: ../view/cadastro.php");
                exit;
            }

            // Criar objeto Cliente
            $cliente = new Cliente(0, $nome, $email, $telefone, password_hash($senha, PASSWORD_DEFAULT));

            // Salvar com o DAO
            if ($this->clienteDAO->inserir($cliente)) {
                $_SESSION['mensagem'] = ['tipo' => 'sucesso', 'texto' => 'Conta criada com sucesso!'];
                header("Location: ../view/login.php");
                exit;
            } else {
                $_SESSION['mensagem'] = ['tipo' => 'erro', 'texto' => 'Erro ao criar conta.'];
                header("Location: ../view/cadastro.php");
                exit;
            }
        }
    }

    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();

            $identificador = $_POST['identificador'] ?? '';
            $senha = $_POST['senha'] ?? '';

            if (empty($identificador) || empty($senha)) {
                $_SESSION['mensagem'] = ['tipo' => 'erro', 'texto' => 'Preencha todos os campos.'];
                header("Location: ../view/login.php");
                exit;
            }

            // Buscar o cliente por e-mail
            $cliente = $this->clienteDAO->buscarPorEmail($identificador);

            if (!$cliente) {
                $_SESSION['mensagem'] = ['tipo' => 'erro', 'texto' => 'Usuário não encontrado.'];
                header("Location: ../view/login.php");
                exit;
            }

            if (password_verify($senha, $cliente->getSenha())) {
                $_SESSION['cliente_id'] = $cliente->getId();
                $_SESSION['cliente_nome'] = $cliente->getNome();
                header("Location: ../view/index-home.php");
                exit;
            } else {
                $_SESSION['mensagem'] = ['tipo' => 'erro', 'texto' => 'Senha incorreta.'];
                header("Location: ../view/login.php");
                exit;
            }
        }
    }
}
