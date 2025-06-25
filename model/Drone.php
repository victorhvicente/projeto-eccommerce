<?php

class Drone {
    public function __construct(
        private int $id,
        private string $nome,
        private string $modelo,
        private string $tipo,
        private string $marca,
        private string $descricao,
        private float $preco,
        private float $precoAntigo,
        private int $estoque,
        private float $peso,
        private string $imagem,
        private int $numeroVendas
    ){}

    public function getId(): int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getModelo(): string {
        return $this->modelo;
    }

    public function getTipo(): string {
        return $this->tipo;
    }

    public function getMarca(): string {
        return $this->marca;
    }

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function getPreco(): float {
        return $this->preco;
    }

    public function getPrecoAntigo(): float {
        return $this->precoAntigo;
    }

    public function getEstoque(): int {
        return $this->estoque;
    }

    public function getPeso(): float {
        return $this->peso;
    }

    public function getImagem(): string {
        return $this->imagem;
    }

    public function getNumeroVendas(): int {
        return $this->numeroVendas;
    }
}
