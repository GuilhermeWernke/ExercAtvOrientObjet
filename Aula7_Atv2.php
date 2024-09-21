<?php

    class Carta 
    {

        // Atributos
        private $numero;
        private $nome;
        private $naipe;

        // Construtor
        public function __construct($numero, $nome, $naipe) 
        {
            $this->numero = $numero;
            $this->nome = $nome;
            $this->naipe = $naipe;
        }

        // __toString
        public function __toString() 
        {
            return "{$this->nome} Naipe: {$this->naipe} Número: {$this->numero}";
        }

        // GETS & SETS

        /**
         * Get the value of numero
         */
        public function getNumero()
        {
                return $this->numero;
        }

        /**
         * Set the value of numero
         */
        public function setNumero($numero): self
        {
                $this->numero = $numero;

                return $this;
        }

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
         * Get the value of naipe
         */
        public function getNaipe()
        {
                return $this->naipe;
        }

        /**
         * Set the value of naipe
         */
        public function setNaipe($naipe): self
        {
                $this->naipe = $naipe;

                return $this;
        }
    }




    function criarBaralho() 
    {

        $i = 0;
        $baralho = [];
        $nomes = 
        [

            "  paus " => array("ás", "2 ", "3 ", "4 ", "5 ", "6 ", "7 ", "8 ", "9 ", "10", "j ", "q ", "k ",),
            " copas " => array("ás", "2 ", "3 ", "4 ", "5 ", "6 ", "7 ", "8 ", "9 ", "10", "j ", "q ", "k ",),
            "espadas" => array("ás", "2 ", "3 ", "4 ", "5 ", "6 ", "7 ", "8 ", "9 ", "10", "j ", "q ", "k ",),
            "  ouro " => array("ás", "2 ", "3 ", "4 ", "5 ", "6 ", "7 ", "8 ", "9 ", "10", "j ", "q ", "k ",),
    
        ];
    
        
        foreach ($nomes as $naipe => $cartas) 
        {
            
            foreach ($cartas as $indice => $nome) 
            {

                $baralho[] = new Carta($i + 1, $nome, $naipe); 
                $i++;

            }

        }

        return $baralho;

    }





    function exibirBaralho($baralho) 
    {

        foreach ($baralho as $carta) 
        {

            print($carta . "\n");
            sleep(5);
            system('clear');

        }

    }





    function jogarAdivinhacao() 
    {

        $baralho = criarBaralho(); 
        $cartaSorteada = $baralho[array_rand($baralho)]; 

        $tentativas = 0;
        $pontuacao = 100; 
        $maxPontuacao = 100;

        print("Bem-vindo ao jogo de adivinhação de cartas!\n");
        print("Você deve adivinhar qual carta foi sorteada!\n");
        sleep(5);
        system('clear');

        while (true) 
        {

            
            print("\nCartas disponíveis:\n");
            exibirBaralho($baralho);

            $escolha = readline("Escolha uma carta (o indice que varia de 1-52) ou digite 0 para desistir: ");
            sleep(5);
            system('clear');
            
            if ($escolha == 0) 
            {

                print("Arregão, a carta era: " . $cartaSorteada . "\n");
                sleep(5);
                system('clear');
                break;

            }

            $escolha = $escolha - 1;

            if ($escolha >= 0 and $escolha < count($baralho)) 
            {
                $tentativas++;

                if ($baralho[$escolha] == $cartaSorteada) 
                {

                    system('clear');
                    print("Parabéns! Você adivinhou a carta correta: " . $cartaSorteada . "\n");
                    print("Tentativas: $tentativas\n");
                    print("Sua pontuação é: " . $pontuacao . " pontos\n");
                    sleep(5);
                    break;

                }
                
                else if ($escolha > $cartaSorteada)
                {

                    print("Carta incorreta! A Carta Sorteada tem um indice menor! Tente novamente.\n");
                    system('clear');
                    sleep(5);
                    $pontuacao -= 10; 

                }

                else if ($escolha < $cartaSorteada)
                {

                    print("Carta incorreta! A Carta Sorteada tem um indice maior! Tente novamente.\n");
                    $pontuacao -= 10; 
                    sleep(5);
                    system('clear');

                }

                else
                {

                    print("Você leu o enunciado? o indice tem que ser de 1-52 animal! Tente novamente.\n");
                    sleep(5);
                    system('clear');

                }
                
                if ($pontuacao <= 0) 
                {
                    
                    print("Você atingiu a pontuação mínima. A carta sorteada era: " . $cartaSorteada . "\n");
                    sleep(5);
                    system('clear');
                    break;

                }
            }

            else 
            {

                print("Escolha inválida! Tente novamente.\n");
                sleep(5);
                system('clear');

            }
        }        
    }

    // Iniciar o jogo
    jogarAdivinhacao();

?>
