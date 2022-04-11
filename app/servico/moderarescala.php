<?php


include "../../models/Servicos.php";
include "../../models/Conexao.php";
include "../../models/Escalas.php";




$conn = Conexao::conectar();

$buscardatadoservico = $conn->prepare('SELECT descricaoservicos, dataservicos, horaservicos FROM servicos WHERE idservicos = ?');
$buscardatadoservico->execute([$_GET['idservico']]);
$dadosServico = $buscardatadoservico->fetch(PDO::FETCH_OBJ);

echo "DADOS DO SERVIÇO<br>
DATA DO SERVICO: $dadosServico->dataservicos <br>
DESCRICAO DO SERVICO: $dadosServico->descricaoservicos <br>
HORA INICIAL DO SERVICO: $dadosServico->horaservicos <hr>";

//CADASTRAR MILITAR NO SERVICO 
if (isset($_POST['idmilitar'])) {
    $servescala = new Escala($_GET['idservico'], $_POST['idmilitar']);
    $conn->prepare('INSERT INTO servicosescala ( idservicos, idmilitar1) VALUES (?, ?) ')
        ->execute([$servescala->getIdservicos(), $servescala->getIdmilitar()]);
}



//LISTA VOLUNTARIOS
$l1 = $conn->prepare("SELECT * FROM servicosvoluntario, servicos, usuarios 
                    WHERE servicosvoluntario.idservicos = servicos.idservicos 
                    AND servicosvoluntario.idmilitar = usuarios.codfunc 
                    AND servicosvoluntario.idservicos = ? ");
$l1->execute([$_GET['idservico']]);

$listaVoluntarios = $l1->fetchAll(PDO::FETCH_OBJ);



echo "
<table>
<tr>
  <th>Voluntários</th>
  
</tr>";

$voluntarios = '';
foreach ($listaVoluntarios as $voluntario) {
    $voluntarios .= "<tr>
    <td>$voluntario->nomeusuario</td>
    <td>$voluntario->idmilitar</td>
    <td><form method='post' action=''>
    <input type='hidden' name='idmilitar' value='$voluntario->idmilitar'>
    <input type='submit' value='Escalar'> </form>
    </td>
    </tr>";
}

echo $voluntarios;
echo "
</table> ";


//REMOVER ESCALADO
if (isset($_POST['removermilitar'])) {
    $conn->prepare('DELETE FROM servicosescala WHERE iservicosescala = ?')->execute([$_POST['removermilitar']]);
}



// LISTA ESCALADOS 
$buscaescalados = $conn->prepare('SELECT * FROM servicosescala, usuarios WHERE servicosescala.idservicos = ? AND servicosescala.idmilitar1 = usuarios.codfunc ');
$buscaescalados->execute([$_GET['idservico']]);
$listaEscalados = $buscaescalados->fetchAll(PDO::FETCH_OBJ);



$escalados = '';
foreach ($listaEscalados as $escalado) {
    $escalados .= "<tr>
    <td>$escalado->nomeusuario</td>
    <td>$escalado->idmilitar1</td>
    <td><form method='post' action=''>
    <input type='hidden' name='removermilitar' value='$escalado->iservicosescala'>
    <input type='submit' value='Remover'> </form>
    </td>
    </tr>";
}


echo "
<table>
<tr>

  <th>Escalados</th>
</tr>";


echo $escalados;
echo "
</table> ";
