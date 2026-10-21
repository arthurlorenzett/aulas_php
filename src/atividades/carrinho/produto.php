<?php
abstract class Produto {
  public function __construct(protected string $nome, protected float $preco) {}

  abstract public function frete():float;
  public function getPreco():float { return $this->preco; }
  public function total():float { return $this->preco + $this->frete(); }
  public function descricao():string{
    return "{$this->nome}: R$ {$this->preco}";
  }
}

class ProdutoFisico extends Produto {
    public function __construct(string $nome, float $preco, private float $pesoKg){
      parent::__construct($nome, $preco);
    }

    public function frete():float {
      return $this->pesoKg * 5;
    }
}

class ProdutoDigital extends Produto {
    public function __construct(string $nome, float $preco, private string $link){
      parent::__construct($nome, $preco);
    }
  
    public function descricao():string{
    return parent::descricao() . " (download) ";
  }

    public function frete():float {
      return 0;
    }
}

class ProdutoComDesconto extends ProdutoFisico {
    public function __construct(string $nome, float $preco, float $pesoKg, private float $desconto){
      parent::__construct($nome, $preco, $pesoKg);
    }

    public function total():float {
      return parent::total() * (1 - $this->desconto / 100);
    }
}
