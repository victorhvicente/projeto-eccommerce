<?php

class Cliente {
    public function __construct(
        private int $id,
        private string $nome,
        private string $email,
        private string $telefone,
        private string $senha
    ){}

    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getTelefone(): string {
        return $this->telefone;
    }

    public function getSenha(): string {
        return $this->senha;
    }

    // Setters
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }

    public function setSenha(string $senha): void {
        $this->senha = $senha;
    }
}
