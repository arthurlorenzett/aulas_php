<?php

interface Pagavel {
    public function pagar(float $valor) : bool;
}

class Pix implements Pagavel {

    public function pagar(float $valor) : bool {
        echo "Pix de R$ $valor";
        return true;
    }
}

class Cartao implements Pagavel {

    public function pagar(float $valor) : bool {
        echo "Cartão de R$ $valor";
        return true;
    }
}

class Boleto implements Pagavel {

    public function pagar(float $valor) : bool {
        echo "Código de barras do boleto: 13454849421346";
        return true;
    }
}
