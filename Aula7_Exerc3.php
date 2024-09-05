<?php

    class Posto
    {
        // Atributos
     
        private $litrosGasolina;
        private $abastecimentoGasolina;

        // Construtor

        function __construct()
        {
            $this->litrosGasolina = 0;
            $this->abastecimentoGasolina = array();
        }

        // Métodos

        function abastecer ($litros)
        {

            if($this->litrosGasolina > $litros)
            {

                return true;
                
            }
            else
            {

                return false;

            }

        }

        function reporEstoque ($litros)
        {

        }

        // GETS & SETS


        /**
         * Get the value of litrosGasolina
         */
        public function getLitrosGasolina()
        {
                return $this->litrosGasolina;
        }

        /**
         * Set the value of litrosGasolina
         */
        public function setLitrosGasolina($litrosGasolina): self
        {
                $this->litrosGasolina = $litrosGasolina;

                return $this;
        }

        /**
         * Get the value of abastecimentoGasolina
         */
        public function getAbastecimentoGasolina()
        {
                return $this->abastecimentoGasolina;
        }

        /**
         * Set the value of abastecimentoGasolina
         */
        public function setAbastecimentoGasolina($abastecimentoGasolina): self
        {
                $this->abastecimentoGasolina = $abastecimentoGasolina;

                return $this;
        }
    }

    $posto = new Posto;
    $posto->__construct();

    $num_de_abastecimentos = 0;
    $opcao;

    do
    {
        print("╔══════════════════════════════════════════════╗ \n");
        print("║           O que você quer fazer:             ║ \n");
        print("╠══════════════════════════════════════════════╣ \n");
        print("║              Escolha uma opção:              ║ \n");
        print("║                                              ║ \n");
        print("║                 1- Abastecer                 ║ \n");
        print("║                                              ║ \n");
        print("║               2- Repor Estoque               ║ \n");
        print("║                                              ║ \n");
        print("║           3- Listar Abastecimentos           ║ \n");
        print("║                                              ║ \n");
        print("║                0- Sair/Voltar                ║ \n");
        print("╚══════════════════════════════════════════════╝ \n");
        $opcao = readline("\n\n");

        switch ($opcao) 
        {

            case 1:

                if($posto->abastecer(readline("Quantos Litros você quer abastecer? ")) == true)
                {

                    $this->litrosGasolina = $this->litrosGasolina - $litros;
                    array_push($this->abastecimentoGasolina, ("- Abastecimento" . $num_de_abastecimentos +1 . ": " . $litros . " Litros."));
                    $num_de_abastecimentos++;
                    
                }
                else
                {

                    print("Está faltando Gasolina no posto, desculpe-me! \n\n");

                }
                
            break;

            case 2:
                # Repõe estoque.
            break;

            case 3:
                # code...
            break;

            case 0:
                
            break;
            
            default:
                print("O valor que você informou não existe! \n\n");
            break;

        }
    }while(true)

    



?>
