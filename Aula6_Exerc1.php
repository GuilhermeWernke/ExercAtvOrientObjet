<?php
    class Carro 
    {
        // Atributos

        private $modelo;
        private $marca;
        private $anoFabricacao;
        private $velocidade_max;

        // Construtor

        public function __construct($modelo, $marca, $ano_fabricacao, $velocidade_max) 
        {
            $this->modelo = $modelo;
            $this->marca = $marca;
            $this->anoFabricacao = $ano_fabricacao;
            $this->velocidade_max = $velocidade_max;
        }

        // GETS & SETS

            /**
             * Get the value of modelo
             */
            public function getModelo()
            {
                    return $this->modelo;
            }

            /**
             * Set the value of modelo
             */
            public function setModelo($modelo): self
            {
                    $this->modelo = $modelo;

                    return $this;
            }

            /**
             * Get the value of marca
             */
            public function getMarca()
            {
                    return $this->marca;
            }

            /**
             * Set the value of marca
             */
            public function setMarca($marca): self
            {
                    $this->marca = $marca;

                    return $this;
            }

            /**
             * Get the value of anoFabricacao
             */
            public function getAnoFabricacao()
            {
                    return $this->anoFabricacao;
            }

            /**
             * Set the value of anoFabricacao
             */
            public function setAnoFabricacao($anoFabricacao): self
            {
                    $this->anoFabricacao = $anoFabricacao;

                    return $this;
            }

            /**
             * Get the value of velocidade_max
             */
            public function getVelocidadeMax()
            {
                    return $this->velocidade_max;
            }

            /**
             * Set the value of velocidade_max
             */
            public function setVelocidadeMax($velocidade_max): self
            {
                    $this->velocidade_max = $velocidade_max;

                    return $this;
            }
    }

    $carros = [];

    for ($i = 1; $i <= 3; $i++) 
    {
        $modelo = readline("Digite o modelo do carro " . $i . ": ");
        $marca = readline("Digite a marca do carro " . $i . ": ");
        $anoFabricacao = readline("Digite o ano de fabricação do carro " . $i . ": ");
        $velocidade_max = readline("Digite a velocidade máxima do carro " . $i . " (km/h): \n");
        $carros[] = new Carro($modelo, $marca, $anoFabricacao, $velocidade_max);
    }

    $carro_mais_rapido = $carros[0];
    $carro_mais_lento = $carros[0];

    foreach ($carros as $carro) 
    {
        if ($carro->getVelocidadeMax() > $carro_mais_rapido->getVelocidadeMax()) 
        {
            $carro_mais_rapido = $carro;
        }
        if ($carro->getVelocidadeMax() < $carro_mais_lento->getVelocidadeMax()) 
        {
            $carro_mais_lento = $carro;
        }
    }

    print("\nO carro mais rápido é: " . $carro_mais_rapido->getModelo() . "-" . $carro_mais_rapido->getMarca() . ", fabricado em " . $carro_mais_rapido->getAnoFabricacao() .  ", com velocidade máxima de " . $carro_mais_rapido->getVelocidadeMax() . " km/h.\n");

    print("\nO carro mais lento é: " . $carro_mais_lento->getModelo() . "-" . $carro_mais_lento->getMarca() . ", fabricado em " . $carro_mais_lento->getAnoFabricacao() . ", com velocidade máxima de " . $carro_mais_lento->getVelocidadeMax() . " km/h.\n");
?>
