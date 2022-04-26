<?php

$conn = Conexao::conectar();




$servico = new Servico ; 
$servico->pesquisaServico($_GET['idservico']);


//CADASTRAR MILITAR NO SERVICO 
if (isset($_POST['idmilitar'])) {
    $escalarMilitar = new Escala ; 
    $escalarMilitar->criarEscala($_GET['idservico'], $_POST['idmilitar']);
    $escalarMilitar->escalaMilitar();
}

//REMOVER ESCALADO
if (isset($_POST['removermilitar'])) {
    $removeMilitar = new Escala ; 
    $removeMilitar->removeMilitar($_POST['removermilitar']);
}



//LISTA VOLUNTARIOS
$l1 = $conn->prepare("SELECT * FROM servicosvoluntario, servicos, usuarios 
                    WHERE servicosvoluntario.idservicos = servicos.idservicos 
                    AND servicosvoluntario.idmilitar = usuarios.codfunc 
                    AND servicosvoluntario.idservicos = ? ");
$l1->execute([$_GET['idservico']]);

$listaVoluntarios = $l1->fetchAll(PDO::FETCH_OBJ);

$voluntarios = '';
foreach ($listaVoluntarios as $voluntario) {
    $totalServicosMes = $conn->query("SELECT  count(servicos.idservicos) as totalservicosmes 
                                   FROM servicosescala, servicos
                                   WHERE servicos.idservicos = servicosescala.idservicos and servicosescala.idmilitar1 = $voluntario->idmilitar 
                                   AND month(servicos.dataservicos) = month(curdate()) ; ")->fetch(); 




    $voluntarios .= "<tr><td>
    <b>$voluntario->nomeguerra</b> ({$totalServicosMes['totalservicosmes']})</td><td></td><td>
    <form method='post' action=''>
    <input type='hidden' name='idmilitar' value='$voluntario->idmilitar'>
    <input type='submit' class='btn  btn-sm btnescalar' value='Escalar'> </form></td>
    
    </tr>";
}




// LISTA ESCALADOS 
$buscaescalados = $conn->prepare('SELECT * FROM servicosescala, usuarios WHERE servicosescala.idservicos = ? AND servicosescala.idmilitar1 = usuarios.codfunc ');
$buscaescalados->execute([$_GET['idservico']]);
$listaEscalados = $buscaescalados->fetchAll(PDO::FETCH_OBJ);

$escalados = '';
foreach ($listaEscalados as $escalado) {
    $escalados .= "<tr>
    $escalado->nomeguerra
    <form method='post' action=''>
    <input type='hidden' name='removermilitar' value='$escalado->iservicosescala'>
    <input type='submit' class='btn  btn-sm' value='Remover'> </form>
    
    </tr><br>";
    if ($escalados == '') {
        $escalados = '<tr><td>Não há militar escalado</td></tr>';
    }
}
