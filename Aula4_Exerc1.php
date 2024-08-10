<?php

    $contagem = 0; 
    $opcao = 0;

    while(is_integer($opcao) and !($opcao >= 1 and $opcao <=3))
    {
        print"Você quer ocódigo em 1-WHLIE, 2-DO-WHILE, ou 3-FOR \n";
        $opcao = readline();

        if(is_integer($opcao) and  ! ($opcao >= 1 and $opcao <=3))
        {
            print"Valor errado";
        }
    }


    if($opcao == 1)
    {
        while($contagem != 10)
        {

            $contagem++;
            print $contagem . "\n";

        }
    }
    elseif($opcao == 2)
    {
        do
        {

            $contagem++;
            print $contagem . "\n";

        }while($contagem != 10);
    }
    elseif($opcao == 3)
    {
        for($i = 1; $i != 11; $i++)
        {

            print $i . "\n";

        }
    }
?>
