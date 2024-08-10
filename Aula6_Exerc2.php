<?php
    class Calculadora {

        // Atributos
        private $numA;
        private $numB;

        // Construtor

        public function __construct($numA, $numB) 
        {
            $this->numA = $numA;
            $this->numB = $numB;
        }

        public function soma() 
        {
            return $this->numA + $this->numB;
        }

        public function subtracao() 
        {
            return $this->numA - $this->numB;
        }

        public function multiplicacao()
        {
            return $this->numA * $this->numB;
        }

        public function divisao() 
        {
            return intdiv($this->numA, $this->numB);
        }

        public function resto()
        {
            return $this->numA % $this->numB;
        }

        // GETS & SETS

        /**
         * Get the value of numA
         */
        public function getNumA()
        {
            return $this->numA;
        }

        /**
         * Set the value of numA
         */
        public function setNumA($numA): self
        {
            $this->numA = $numA;

            return $this;
        }

        /**
         * Get the value of numB
         */
        public function getNumB()
        {
            return $this->numB;
        }

        /**
         * Set the value of numB
         */
        public function setNumB($numB): self
        {
            $this->numB = $numB;

            return $this;
        }
    }

    $numA = readline("Digite o primeiro número (numA): ");
    $numB = readline("Digite o segundo número (numB): ");

    $calc = new Calculadora($numA, $numB);

    print( "Soma: " . $calc->soma() . "\n");
    print( "Subtração: " . $calc->subtracao() . "\n");
    print( "Multiplicação: " . $calc->multiplicacao() . "\n");
    print( "Divisão: " . $calc->divisao() . "\n");
    print( "Resto: " . $calc->resto() . "\n");
?>
