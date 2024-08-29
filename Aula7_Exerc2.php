<?php

        $opcao = 0;

        class Pessoa
        {

                // Atribtos

                private $nome;
                private $sobrenome;
                private $idade;

                // Construtor

                function __construct($n="", $s="", $i="")
                {

                        $this->nome = $n;
                        $this->sobrenome = $s;
                        $this->idade = $i;
                        
                }


                // Métodos

                function __toString()
                {
                        
                        return("Nome: " . $this->nome . " | Sobrenome: " . $this->sobrenome . " | Idade: : " . $this->idade . "\n\n");

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
                 * Get the value of sobenome
                 */
                public function getSobrenome()
                {
                        return $this->sobrenome;
                }

                /**
                 * Set the value of sobenome
                 */
                public function setSobrenome($sobrenome): self
                {
                        $this->sobrenome = $sobrenome;

                        return $this;
                }

                /**
                 * Get the value of idade
                 */
                public function getIdade()
                {
                        return $this->idade;
                }

                /**
                 * Set the value of idade
                 */
                public function setIdade($idade): self
                {
                        $this->idade = $idade;

                        return $this;
                }
        }

        function cadastrar()
        {

                $pessoas = new Pessoa;
                $pessoas->setNome(readline("Informe o Nome: \n"));
                $pessoas->setSobrenome(readline("Informe o Sobrenome: \n"));
                $pessoas->setIdade(readline("Informe a Idade: \n"));

        }

        function listar()
        {



        }

        print("|    Escolha:    |");
        print("| 1 - Cadastrar: |");
        print("|  2 - Listar:   |");
        print("|   3 - Parar:   |");
        $opcao = readline("Escolha: \n\n");

        do
        {
                switch ($opcao) 
                {
                        case 1:
                                cadastrar(array_push($pessoas, new Pessoa));
                        break;
                        
                        case 2:
                                if(count($pessoas) > 0)
                                {

                                        listar();

                                }
                                else
                                {
                                        print("Não á pessoas cadastradas! \n\n");
                                }
                        break;

                        case 3:
                                return false;
                        break;

                        default:
                                print("Opção Inválida! \n\n");
                        break;

                }
        }while(true)

?>
