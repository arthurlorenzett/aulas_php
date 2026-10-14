<?php

class Produto {

    public string $nome;
    public float $preco;

    public function __construct(string $nome, float $preco) {
        $this->nome = $nome;
        $this->preco = $preco;
    }

    public function aplicarDesconto(float $pct): float {
        return $this->preco * (1 - $pct/100);
    }
}

$produtos = [
    new Produto("Camiseta", 59.90),
    new Produto("Calça", 100),
    new Produto("Boné", 15.00, 2)
];

foreach ($produtos as $p){
    echo "Nome: " . $p->nome . " R$ " . number_format($p->preco, 2, ',', '.'). "<br>";
}