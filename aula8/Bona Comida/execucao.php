<?php
    
    require_once('modelo/Prato.php');
    require_once('modelo/Pedido.php');
    
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
        $opcao = readline("");
        return null;
    }
    
    $pedidos = [];
    
    $prato = 
    [
        new Prato(1, "Camarão à Milanesa", 110),
        new Prato(2, "Pizza Margherita", 80),
        new Prato(3, "Macarrão à Carbonara", 60),
        new Prato(4, "Bife à Parmegiana", 75),
        new Prato(5, "Risoto ao Funghi", 70),
    ];
    
    $caixa = 0;
    
    $opcao = 0;
    
    print("Este código possui a nova metodologia de seu criador GCW! \nAo invés de esperar um tempo determinado para uma nova mensagem aparecer, o que algumas vezes pode parecer muito tempo, outras muito pouco. \nBasta apertar ENTER!");
    $opcao = readline("");
    system("clear");
    
    while (true) 
    {
        
        print("╔══════╣Bona Comida╠══════╗\n");
        print("║       1 Cadastrar       ║\n");
        print("║        2 Cancelar       ║\n");
        print("║         3 Listar        ║\n");
        print("║    4 Total de Vendas    ║\n");
        print("║          0 Sair         ║\n");
        print("╚═════════════════════════╝\n");
        $opcao = readline("");
        system("clear");
        
        switch ($opcao)
        {
            
            case 1:
                
                print("╔══╣Escolha o seu Prato╠══╗\n");
                print("║  1 Camarão à Milanesa   ║\n");
                print("║   2 Pizza Margherita    ║\n");
                print("║  3 Macarrão à Carbonara ║\n");
                print("║   4 Bife à Parmegiana   ║\n");
                print("║   5 Risoto ao Funghi    ║\n");
                print("╚═════════════════════════╝\n");
                $numPrato = readline();
                
                array_push($pedidos, cadastro($prato, $numPrato));
                system("clear");
                
            break;
            
            case 2:
                
                if(count($pedidos) > 0)
                {
                    print("Qual pedido você deseja excluir? \n\n");
                    
                    foreach($pedidos as $i => $p)
                    {
                        print("Pedido de número: " . $i +1 . ", Feito pelo Cliente " . $p->getNomeCliente() . ", e atendido pelo Garçom " . $p->getNomeGarcom() . "\n");
                    }
                    
                    $excluir = readline() -1;
                    
                    if($excluir < count($pedidos))
                    {
                        
                        array_splice($pedidos, $excluir,1);
                        print("Item Removido com sucesso \n");
                        $opcao = readline("");
                        system("clear");
                        
                    }
                    else
                    {
                        
                        print("Número Inválido \n");
                        $opcao = readline("");
                        system("clear");
                        
                    }
                    
                }
                
            break;
            
            case 3:
                
                if(count($pedidos) > 0) 
                {
                    foreach($pedidos as $i => $pedido)
                    {
                        print("O cliente " . $pedido->getNomeCliente() . " foi atendido pelo garçom " . $pedido->getNomeGarcom() . ", pediu o prato " . $pedido->getPrato()->getNome() . " no valor de RS$" . $pedido->getPrato()->getValor() . "\n");
                    }
                    $opcao = readline("");
                    system("clear");
                    
                } 
                else 
                {
                    
                    print("Nenhum pedido cadastrado.\n");
                    $opcao = readline("");
                    system("clear");
                    
                }
                
            break;
            
            case 4:
                
                foreach($pedidos as $i => $pedido)
                {
                    
                    print("O cliente " . $pedido->getNomeCliente() . " foi atendido pelo garçom " . $pedido->getNomeGarcom() . ", pediu o prato " . $pedido->getPrato()->getNome() . " no valor de RS$" . $pedido->getPrato()->getValor() . "\n");
                    $caixa = $caixa + $pedido->getPrato()->getValor();
                }
                
                print("\n O valor atual do Caixa / Total de Vendas é: RS$" . $caixa);
                
                $opcao = readline("");
                system("clear");
                
            break;
            
            case 0:
                
            return false;
            
            default:
                
                print("Valor não encontrado!");
                $opcao = readline("");
                system("clear");
                
            break;
            
        }
    }
    
    // ═ ╔ ╦ ╗ ╚ ╩ ╝ ╠  ╬ ╣ ║
    
?>