<?php
    
    require_once('/modelo/Prato.php');
    require_once('/modelo/Pedido.php');
    
    function cadastro($pratos, $numPrato)
    {
        
        
        foreach ($pratos as $p)
        {
            if($p->getNum() == $numPrato)
            {
                $pedido = new Pedido;
                
                $pedido->setNomeCliente(readline("Qual o nome do Cliente? "));
                $pedido->setNomeGarcom(readline("Qual o nome do Garcom que atendeu este Cliente? "));
                $pedido->setPrato($p);
                
                return $pedido;
            }
        }
        
        print("Pedido não encontrado! \n");
        return null;
    }
    
    $prato = 
    [
        new Prato("1", "Camarão à Milanesa", "110,00"),
        new Prato("2", "Pizza Margherita", "80,00"),
        new Prato("3", "Macarrão à Carbonara", "60,00"),
        new Prato("4", "Bife à Parmegiana", "75,00"),
        new Prato("5", "Risoto ao Funghi", "70,00"),
    ];
    
    $opcao = 0;
    
    while ($opcao < 10) 
    {
        
        print("╔══════╣Bona Comida╠══════╗\n");
        print("║       1 Cadastrar       ║\n");
        print("║        2 Cancelar       ║\n");
        print("║         3 Listar        ║\n");
        print("║    4 Total de Vendas    ║\n");
        print("║          0 Sair         ║\n");
        print("╚═════════════════════════╝\n");
        $opcao = readline("");
        
        switch ($opcao)
        {
            
            case 1:
                
                $numPrato = readline("Qual o prato que você deseja?");
                
                array_push($pedidos, cadastro($pratos, $numPrato));
                
            break;
            
            case 2:
                
                if(count($pedidos) > 0)
                {
                    
                    $excluir = readline("Qual pedido você deseja excluir? ");
                    
                    if($excluir <= count($pedidos))
                    {
                        
                        array_splice($pedidos, $excluir,1);
                        print("Item Removido com sucesso");
                        
                    }
                    else
                    {
                        
                        print("Número Inválido");
                        
                    }
                    
                }
                
            break;
            
            case 3:
                
                if(count($pedidos) > 0) 
                {
                    foreach($pedidos as $i => $pedido)
                    {
                        print("O cliente " . $pedido->getNameCliente() . " foi atendido pelo garçom " . $pedido->getnomeGarcom() . ", pediu o prato " . $pedido->getPrato()->getNome() . " no valor de RS$" . $pedido->getPrato()->getValor() . "\n");
                    }
                } 
                else 
                {
                    print("Nenhum pedido cadastrado.\n");
                }
                
            break;
            
            case 4:
                
                
                
            break;
            
            case 0:
                
            return false;
            
        }
    }
    
    // ═ ╔ ╦ ╗ ╚ ╩ ╝ ╠  ╬ ╣ ║
    
?>