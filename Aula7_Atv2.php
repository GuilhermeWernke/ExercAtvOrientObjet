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

            if($this->numero < 10)
            {
                return ("║          Índice:  "  . $this->numero . "           Nome: ". $this->nome . "           Naipe: " . $this->naipe . "           ║");
            }
            else if ($this->numero >= 10)
            {
                return ("║          Índice: "  . $this->numero . "           Nome: ". $this->nome . "           Naipe: " . $this->naipe . "           ║");
            }

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

            "  paus " => array("Ás", "2 ", "3 ", "4 ", "5 ", "6 ", "7 ", "8 ", "9 ", "10", "J ", "Q ", "K ",),
            " copas " => array("Ás", "2 ", "3 ", "4 ", "5 ", "6 ", "7 ", "8 ", "9 ", "10", "J ", "Q ", "K ",),
            "espadas" => array("Ás", "2 ", "3 ", "4 ", "5 ", "6 ", "7 ", "8 ", "9 ", "10", "J ", "Q ", "K ",),
            "  ouro " => array("Ás", "2 ", "3 ", "4 ", "5 ", "6 ", "7 ", "8 ", "9 ", "10", "J ", "Q ", "K ",),
    
        ];
    
        
        foreach ($nomes as $naipe => $cartas) 
        {
            
            foreach ($cartas as $nome) 
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

        }

    }





    function jogarAdivinhacao() 
    {

        $baralho = criarBaralho(); 
        $cartaSorteada = $baralho[array_rand($baralho)]; 

        $tentativas = 0;
        $pontuacao = 100; 

        system('clear');
        print("Bem-vindo ao jogo de adivinhação de cartas!\n");
        print("Você deve adivinhar qual carta foi sorteada!\n");
        sleep(5);
        system('clear');

        while (true) 
        {

            print("╔═══════════════════════════════════════════════════════════════════════════╗\n");
            print("║                           Cartas disponíveis:                             ║\n");
            print("╠═══════════════════════════════════════════════════════════════════════════╣\n");
            exibirBaralho($baralho);
            print("╠═══════════════════════════════════════════════════════════════════════════╣\n");
            print("║ Escolha uma carta (o indice que varia de 1-52) ou digite 0 para desistir: ║\n");
            print("╚═══════════════════════════════════════════════════════════════════════════╝\n");
            print($cartaSorteada . "\n");

            $escolha = readline();
            
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
                    print("╔═══════════════════════════════════════════════════════════════════════════╗\n");
                    print("║                 Parabéns! Você adivinhou a carta correta:                 ║\n");
                    print($cartaSorteada . "\n");
                    print("║                               Tentativas: $tentativas                               ║\n");
                    print("║                         Sua pontuação é: $pontuacao pontos                        ║\n");
                    print("╚═══════════════════════════════════════════════════════════════════════════╝\n");
                    sleep(5);
                    system('clear');
                    break;

                }
                
                else if ($escolha > $cartaSorteada->getNumero())
                {

                    print("Carta incorreta! A Carta Sorteada tem um índice menor! Tente novamente.\n");
                    sleep(5);
                    system('clear');
                    $pontuacao -= 10; 

                }

                else if ($escolha < $cartaSorteada->getNumero())
                {

                    print("Carta incorreta! A Carta Sorteada tem um índice maior! Tente novamente.\n");
                    $pontuacao -= 10; 
                    sleep(5);
                    system('clear');

                }
                
                if ($pontuacao <= 0) 
                {
                    
                    print(" Você atingiu a pontuação mínima. A carta sorteada era: " . $cartaSorteada . "\n");
                    print("╔═══════════════════════════════════════════════════════════════════════════╗\n");
                    print("║          Você atingiu a pontuação mínima. A carta sorteada era:           ║\n");
                    print($cartaSorteada . "\n");
                    print("╚═══════════════════════════════════════════════════════════════════════════╝\n");
                    sleep(5);
                    system('clear');
                    break;

                }
            }

            else
            {

                print("Você leu o enunciado? o indice tem que ser de 1-52 animal! Tente novamente.\n");
                sleep(5);
                system('clear');

            }
        }        
    }

    jogarAdivinhacao();

?>
