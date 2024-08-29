<?php

    class Escola
    {

        // Atributos

        private $nome;
        private $endereco;
        private $quant_alunos;

        // Construtor

        function __construct($n="", $e="", $q="")
        {

            $this->nome = $n;
            $this->endereco = $e;
            $this->quant_alunos = $q;
            
        }

        // Métodos

        function __toString()
        {
           
            return("Esta Escola tem o nome de: " . $this->nome . ", ele está localizada no endereço: " . $this->endereco . " e tem " . $this->quant_alunos . " alunos. \n\n");

        }

        // GETS & SETS

        /**
         * Get the value of nome
         */
        public function getNome()
        {
                return $this->nome;
        }

        /**
         * Set the value of nome
         */
        public function setNome($nome): self
        {
                $this->nome = $nome;

                return $this;
        }

        /**
         * Get the value of endereco
         */
        public function getEndereco()
        {
                return $this->endereco;
        }

        /**
         * Set the value of endereco
         */
        public function setEndereco($endereco): self
        {
                $this->endereco = $endereco;

                return $this;
        }

        /**
         * Get the value of quant_alunos
         */
        public function getQuantAlunos()
        {
                return $this->quant_alunos;
        }

        /**
         * Set the value of quant_alunos
         */
        public function setQuantAlunos($quant_alunos): self
        {
                $this->quant_alunos = $quant_alunos;

                return $this;
        }
    }

    $escolas = [];

    for($i=0; $i < 4; $i++) 
    { 
        
        array_push($escolas, new Escola(readline("Qual o nome da Escola? \n"), readline("Qual o endereço da Escola? \n"), readline("Qual a quantidade de alunos da Escola? \n")));
        print("\n");

    }

    foreach($escolas as $unidade)
    {
        print($unidade);
    }

    $qual_foi = $escolas[0];

    for($i=0; $i < 4; $i++)
    {
        if ($qual_foi->getQuantAlunos() < $escolas[$i]->getQuantAlunos()) 
        {
            $qual_foi = $escolas[$i];
        } 
    }

    print("A escola com mais alunos foi a " . $qual_foi->getNome() . ", que está localizada no endereço " . $qual_foi->getEndereco() . ", com seus incriveis " . $qual_foi->getNome() . " alunos! \n");
    

?>
