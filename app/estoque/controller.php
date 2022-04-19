<?php
include "../../models/Conexao.php";
include "../../models/Produto.php"; 



//LISTA TODOS OS PRODUTOS

{$conn = Conexao::conectar() ;
    $estoque = $conn->query("SELECT * FROM produtos")->fetchAll(PDO::FETCH_OBJ) ; 
}
 

//LISTA OS PRODUTOS RETIRADOS ORDENADO POR NOME NA PAGINA RETIRADAS.PHP
{$retiradas = $conn->query('SELECT produtosretiradas.idprodutos, sum(produtosretiradas.quantidaderetirada) as totalretiradas, produtos.nomeprodutos 
                          FROM produtosretiradas, produtos 
                          WHERE produtosretiradas.idprodutos = produtos.idprodutos 
                          GROUP BY produtos.idprodutos
                          ORDER BY produtos.nomeprodutos')->fetchAll(PDO::FETCH_OBJ);
}



//CADASTRA NOVO PRODUTO

if(isset($_POST['quantidadeproduto'])){
    $newname = '' ; 
    
        $extensao = strtolower     (substr($_FILES['imagem']['name'], -4)     );
        $newname = md5(time()); 
        $diretorio = "imagens/" ; 
        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$newname.$extensao);
        

       
        
        
        


    $c1 = new Produto   ;
    $c1->novoProduto($_POST['nomeproduto'], $_POST['quantidadeproduto']); 
    
  //  $db = Conexao::conectar() ; 
    $conn->prepare('INSERT INTO produtos (nomeprodutos, quantidadeprodutos, nomeimagem) 
                    VALUES (?, ?, ?)')
        ->execute([$c1->getNomeprodutos(), $c1->getQuantidadeprodutos(), $newname.$extensao]); 

        header('Location: index.php') ; 

}


//BUSCA O ITEM SELECIONADO NA PAGINA ANTERIOR E PREPARA ELE
if(isset($_GET['selecionado'])){
    
   // $pdo = Conexao::conectar() ;
    $stmt =  $conn->prepare("SELECT * FROM produtos WHERE idprodutos = ? ");
    $stmt->execute([$_GET['selecionado']]) ; 
    $retProd = $stmt->fetch(PDO::FETCH_OBJ) ;




}



//COM BASE NA AÇÃO ACIMA . ADICIONAR QUANTIDADE AO ITEM SELECIONADO, GET ADICIONAR OU REMOVER 
if(isset($_GET['adicionar'])){
   // $pdo = Conexao::conectar() ; 
    $add = $conn->prepare("UPDATE produtos SET quantidadeprodutos = (quantidadeprodutos + ?) WHERE idprodutos = ? ") ;
    $add->execute([$_GET['quantidade'], $_GET['idproduto']]); 

         if(isset($_GET['quantidade'])){
              //  $retPDO = Conexao::conectar();
                $addRetirada = $conn->prepare('INSERT INTO produtosadicionados (idprodutos, quantidadeprodutos) VALUES (?, ?)');
                $addRetirada->execute([$_GET['idproduto'], $_GET['quantidade'] ]); }

                    if($add)
                    header('Location: index.php') ; 

}

//REMOVE QUANTIDADE AO ITEM SELECIONADO
if(isset($_GET['remover'])){
   // $pdo = Conexao::conectar() ; 
    $add = $conn->prepare("UPDATE produtos SET quantidadeprodutos = (quantidadeprodutos - ?) WHERE idprodutos = ? ") ;
    $add->execute([$_GET['quantidade'], $_GET['idproduto']]); 

            if(isset($_GET['quantidade'])){
               // $retPDO = Conexao::conectar();
                $addRetirada = $conn->prepare('INSERT INTO produtosretiradas (idprodutos, quantidaderetirada) VALUES (?, ?)');
                $addRetirada->execute([$_GET['idproduto'], $_GET['quantidade'] ]); }
            
                    if($addRetirada)
                        header('Location: index.php') ; 

}
