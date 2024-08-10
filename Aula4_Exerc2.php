<?php

    $num = 0;
    $contagem = 0;

    for($i = 1; $i <= 100; $i++) 
    {
        $num += $i;
        $contagem = $i;
        print $contagem . "\n";
    }
    print $num;

?>
