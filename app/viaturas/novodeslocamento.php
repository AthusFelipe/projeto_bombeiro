<?php




include "controller.php"; 
 
$_SESSION['codfunc'] = 1 ;


$querySelectViaturas = $conn->query("SELECT * FROM viaturascadastro")->fetchAll(PDO::FETCH_OBJ);
$selectViaturas = '' ; 
foreach($querySelectViaturas as $vtr){
    $selectViaturas .= " <option value='".$vtr->idviaturas."'>".$vtr->nomeviatura."</option>" ; 
}

$querySelectMotoras = $conn->query("SELECT * FROM usuarios ORDER BY nomeguerra")->fetchAll(PDO::FETCH_OBJ);

$selectMotoras = '';
foreach ($querySelectMotoras as $motora){
    $selectMotoras .= "<option value='$motora->codfunc'>$motora->cargo $motora->nomeguerra </option>";
}




if(isset($_POST['idviatura'])){
    $deslocamento = new Deslocamento;
    $deslocamento->novoDeslocamento($_POST['idviatura'], $_POST['kminicial'], $_POST['motorista'], $_SESSION['codfunc'], $_POST['destino']);
    header('location: deslocamento.php') ; 

}
include "layout/header.html";

?>


<!DOCTYPE html>
<style>
    .formulario{
        border-style: solid;
        border-width: 5px;
        align-items: center;
        text-align: center;
        border-color:  #bf0000;
        padding: 5px;
    }

.cabecalho{
    margin: 10% 0 0 ;
    text-align: center;
    background-color:#bf0000;
    font-weight: bold;
    color: white;
}
</style>


<div class='container'>
<p class='cabecalho'>NOVO DESLOCAMENTO</p>
    <div class='formulario'>
        
<form method='post' >
<input list='idviatura'>
<datalist id='idviatura'>
    <?= $selectViaturas ?>
</datalist><br><br>
Km inicial:<input type='number' name='kminicial'><br><br>
Destino: <input type='text' name='destino'><br><br>
<select name='motorista'>
<option value=''>Selecione o Motorista</option>
<?= $selectMotoras ?>
</select>
</select>
<br><br>
<input class='btn btn-success' type='submit' value='NOVO DESLOCAMENTO'><BR>
</div>
</div>