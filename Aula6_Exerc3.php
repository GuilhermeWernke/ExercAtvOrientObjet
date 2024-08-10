<?php
    class Veiculo 
    {
        // Atributos
        private int $capacidade;
        private int $passageiros;

        // Construtor
        public function __construct() 
        {
            $this->passageiros = 0;
        }

        // Métodos
        public function definirCapacidade() 
        {
            $this->capacidade = intval(readline("Digite a capacidade do veículo: "));
        }

        public function venderPassagem($quantidade) 
        {
            if ($this->passageiros + $quantidade <= $this->capacidade) 
            {
                $this->passageiros += $quantidade;
                return true;
            } 
            else 
            {
                return false;
            }
        }

        // GETS & SETS
        
        /**
         * Get the value of capacidade
         */
        public function getCapacidade(): int
        {
                return $this->capacidade;
        }

        /**
         * Set the value of capacidade
         */
        public function setCapacidade(int $capacidade): self
        {
                $this->capacidade = $capacidade;

                return $this;
        }

        /**
         * Get the value of passageiros
         */
        public function getPassageiros(): int
        {
                return $this->passageiros;
        }

        /**
         * Set the value of passageiros
         */
        public function setPassageiros(int $passageiros): self
        {
                $this->passageiros = $passageiros;

                return $this;
        }
    }

    $veiculo = new Veiculo();
    $veiculo->definirCapacidade();

    while (true) 
    {
        $quantidade = readline("Quantas passagens deseja comprar? (Digite 0 para encerrar): ");

        if ($quantidade == 0) 
        {
            print("Encerrando a aplicação.\n");
            break;
        }

        if ($veiculo->venderPassagem($quantidade)) 
        {
            print("Passagem vendida com sucesso! Passageiros atuais: " . $veiculo->getPassageiros() . "\n");
        } 
        else 
        {
            print("Não foi possível vender a passagem. Capacidade máxima atingida.\n");
        }
    }
?>
