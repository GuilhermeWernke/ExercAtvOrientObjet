<?php

    class Carta
    {

        // Atributos

        private string $nome; // nome da carta ex "Ás Copas"
        private int $numero; // indice


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
        public function getNumero(): int
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





    $baralho_nome = 
    [

        "paus"    => array("ás", "2", "3", "4", "5", "6", "7", "8", "9", "10", "j", "q", "k",),
        "copas"   => array("ás", "2", "3", "4", "5", "6", "7", "8", "9", "10", "j", "q", "k",),
        "espadas" => array("ás", "2", "3", "4", "5", "6", "7", "8", "9", "10", "j", "q", "k",),
        "ouro"    => array("ás", "2", "3", "4", "5", "6", "7", "8", "9", "10", "j", "q", "k",),

    ];

    $naipes = array_keys($baralho_nome); //se lembra que eu queria uma função que pegasse o nome do 'indice' de um array associativo? estáfuncção faz isso e retorna numa variavel de formato array, em que a primeira posição é o nome do primeiro associativo, o segundo o segundo nome e assim vai...

    $baralho_indice = [];




    
    $i = 0;

    foreach ($baralho_nome as $indice1 => $naipe) 
    {

        foreach ($naipe as $indice2 => $nome) 
        {

            $carta = new Carta();

            $carta->setNumero($i + 1);
            switch ($i) 
            {
                case $i < 13:
                  
                    $carta->setNome($nome . " " . $naipes[0]);

                break;

                case $i >= 13 and $i < 26:

                    $carta->setNome($nome . " " . $naipes[1]);

                break;

                case $i >=28 and $i < 39:

                    $carta->setNome($nome . " " . $naipes[2]);

                break;

                case $i >=39:

                    $carta->setNome($nome . " " . $naipes[3]);

                break;
            }
            
            array_push($baralho_indice, $carta);

            $i++;

        }

    }

    foreach ($baralho_indice as $carta) 
    {
        print("Número: " . $carta->getNumero() . " - Nome: " . $carta->getNome() . "\n");
    }

    sleep(1000);


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
