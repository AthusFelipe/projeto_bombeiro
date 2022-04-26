<?php
include "controller.php";


$iddesloc = $_GET['iddeslocamento'] ;


$desloc = $conn->query("SELECT * FROM viaturasdeslocamento WHERE iddeslocamento  = $iddesloc ")->fetch(PDO::FETCH_OBJ);


echo '<pre>'; print_r($desloc); echo '<pre>' ; //SNIPPET DEBUG

$nomevtr = $conn->query("SELECT nomeviatura FROM viaturascadastro WHERE idviaturas = $desloc->idviatura")->fetch(PDO::FETCH_OBJ);



if(isset($_POST['horafinal']))
{
    $conn->prepare('UPDATE viaturasdeslocamento SET
     codfuncmotorista = ?, kminicial = ?, kmfinal = ?, horainicial = ?, horafinal = ?, destino = ? WHERE iddeslocamento = ?')
->execute([$_POST['motorista'], $_POST['kminicial'], $_POST['kmfinal'], $_POST['horainicial'], $_POST['horafinal'], $_POST['destino'],$_GET['iddeslocamento']]) ; 

header('location: ./deslocamento.php');

}

include "layout/header.html";




echo date('d/m/Y H:i', strtotime($desloc->horafinal));
?>



<!DOCTYPE html>


<?= $nomevtr->nomeviatura ?>
<form method='post'>
    motorista <input name='motorista' type='text' value='<?=$desloc->codfuncmotorista ;?>'>
    km inicial <input name='kminicial' type='number' value='<?=$desloc->kminicial ;?>'>
    km final <input name='kmfinal' type='number' value='<?=$desloc->kmfinal?>'>
    hora inicial <input name='horainicial' type='datetime-local' value='<?= date('d/m/Y H:i', strtotime($desloc->horainicial))?>' >
    hora final <input  name='horafinal' type='datetime-local' value='<?=date('d/m/Y H:i', strtotime($desloc->horafinal))?>'>
    destino <input  name='destino' type='text' value='<?= $desloc->destino ?>'>

    <input type='submit' value='SALVAR'>
</form>

</html>