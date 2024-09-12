<?php

    class Carta
    {

        // Atributos

        private string $nome;
        private float $numero;


        // GETS & SETS
        
        /**
         * Get the value of nome
         */
        public function getNome(): string
        {
                return $this->nome;
        }

        /**
         * Set the value of nome
         */
        public function setNome(string $nome): self
        {
                $this->nome = $nome;

                return $this;
        }

        /**
         * Get the value of numero
         */
        public function getNumero(): float
        {
                return $this->numero;
        }

        /**
         * Set the value of numero
         */
        public function setNumero(float $numero): self
        {
                $this->numero = $numero;

                return $this;
        }        

    }

    $baralho = 
    [

        "Paus"    => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12",),
        "Copas"   => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12",),
        "Espadas" => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12",),
        "Ouro"    => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12",),

    ];

    do
    {
        system('clear');
        print("╔══════════════════════════════════════════════╗ \n");
        print("║           O que você quer fazer:             ║ \n");
        print("╠══════════════════════════════════════════════╣ \n");
        print("║              Escolha uma opção:              ║ \n");
        print("║                                              ║ \n");
        print("║             1- Adicionar Receita             ║ \n");
        print("║                                              ║ \n");
        print("║             2- Adicionar Despesa             ║ \n");
        print("║                                              ║ \n");
        print("║               3- Listar Receita              ║ \n");
        print("║                                              ║ \n");
        print("║               4- Listar Despesa              ║ \n");
        print("║                                              ║ \n");
        print("║                 5- Sumarizar                 ║ \n");
        print("║                                              ║ \n");
        print("║                0- Sair/Voltar                ║ \n");
        print("╚══════════════════════════════════════════════╝ \n");
        $opcao = readline("\n\n");

        switch ($opcao) 
        {

            case 1:

                $receita = new Receita;

                system('clear');
                $receita->setValor(readline("Informe sua nova receita no padrão (...x.xx): \n\n"));

                system('clear');
                $receita->setDescricao(readline("Informe a descrição de sua nova receita: \n\n"));

                array_push($receitas, $receita);
                
            break;

            case 2:

                $despesa = new Despesa;

                system('clear');
                $despesa->setValor(readline("Informe sua nova despesa no padrão (...x.xx): \n\n"));

                system('clear');
                $despesa->setDescricao(readline("Informe a descrição de sua nova despesa: \n\n"));

                array_push($despesas, $despesa);

            break;

            case 3:

                system('clear');
                print("----------Lista Receita----------\n");
                foreach($receitas as $item)
                {
                    $i = 0;
                    
                    print("A receita de número " . $i +1 . " foi de $" . $item->getValor() . " e foi recebido através de ". $item->getDescricao() . "\n");
                    $i++;

                }

                sleep(4);

            break;

            case 4:
               
                system('clear');
                print("----------Lista Despesa----------\n");
                foreach($despesas as $item)
                {
                    $i = 0;
                    
                    print("A receita de número " . $i +1 . " foi de $" . $item->getValor() . " e foi gasto através de ". $item->getDescricao() . "\n");
                    $i++;

                }

                sleep(4);
                
            break;

            case 5:
            
                system('clear');
                print("----------Saldo----------\n");

                $total_receitas = 0;
                $total_despesas = 0;
                $saldo = 0;

                foreach($receitas as $item)
                {
                                        
                    $total_receitas += $item->getValor();

                }

                foreach($despesas as $item)
                {
                                        
                    $total_despesas += $item->getValor();

                }

                $saldo = $total_receitas - $total_despesas;

                print("Saldo: $" . $saldo . "\n");
                print("Total de receitas: $" . $total_receitas . "\n");
                print("Total de despesas: $" . $total_despesas . "\n");

                sleep(4);
            
            break;

            case 0:

                system('clear');
                return false;
                
            break;
            
            default:

                print("O valor que você informou não existe! \n\n");

            break;

        }
    }while(true)

?>
